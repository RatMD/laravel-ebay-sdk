<?php declare(strict_types=1);

namespace Rat\eBaySDK\Commands;

use Illuminate\Console\Command;
use Rat\eBaySDK\Authentication\OAuthAuthentication;
use Rat\eBaySDK\Environment;

class AuthorizeCommand extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'ebay:authorize
        {code? : Authorization code to exchange, leave empty to generate a new URL}
        {--i|client-id= : Custom eBay OAuth client ID}
        {--s|client-secret= : Custom eBay OAuth client secret}
        {--r|redirect-uri= : Custom eBay redirect URI / RuName}
        {--d|dev-id= : Custom eBay dev ID}
        {--e|environment= : Custom eBay API environment}
        {--a|auth-scopes=* : Custom list of OAuth authorization scopes}
        {--c|cred-scopes=* : Custom list of credential scopes}
        {--all-auth-scopes : Use all available OAuth authorization scopes}
        {--all-cred-scopes : Use all available credential scopes}
        {--testing : Used to prepare PEST testing environment}
    ';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'Generate an authorization URL or exchange an authorization code for a refresh token.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        if (($code = $this->argument('code')) !== null) {
            if (($code = $this->getAuthenticationCode($code)) === false) {
                return Command::FAILURE;
            }

            $auth = $this->getAuthentication();
            $response = $auth->exchangeAuthorizationCode($code);
            $refreshToken = $response['refresh_token'] ?? null;
            if (!is_string($refreshToken) || $refreshToken === '') {
                $this->error('No refresh token returned by eBay.');
                return Command::FAILURE;
            }

            if ($this->option('testing') === true) {
                $written = $this->writeTestingRefreshToken($refreshToken);

                if ($written) {
                    $this->info('PEST_EBAY_REFRESH_TOKEN has been written to .env.testing');
                } else {
                    $this->warn('.env.testing not found. Printing token instead:');
                    $this->line('PEST_EBAY_REFRESH_TOKEN=' . $refreshToken);
                }
            } else {
                file_put_contents(
                    storage_path('.ebay.key'),
                    json_encode($response, \JSON_PRETTY_PRINT | \JSON_UNESCAPED_SLASHES) . PHP_EOL
                );

                $this->warn('Refresh token written to storage/.ebay.key (do not commit this file).');
            }

            $this->table(
                ['Key', 'Value'],
                collect($response)->map(function ($value, $key) {
                    if ($key == 'access_token' || $key == 'refresh_token') {
                        $value = substr($value, 0, 6) . '...' . substr($value, -4);
                    }
                    return [$key, $value];
                })->toArray()
            );
        } else {
            $auth = $this->getAuthentication();
            $this->info($auth->getAuthorizationUrl("console"));
        }
        return Command::SUCCESS;
    }

    /**
     *
     * @return OAuthAuthentication
     */
    protected function getAuthentication(): OAuthAuthentication
    {
        return new OAuthAuthentication(new Environment(
            clientId: $this->resolveValue('client-id', 'EBAY_CLIENT_ID'),
            clientSecret: $this->resolveValue('client-secret', 'EBAY_CLIENT_SECRET'),
            redirectUri: $this->resolveValue('redirect-uri', 'EBAY_REDIRECT_URI'),
            devId: $this->resolveValue('redirect-uri', 'EBAY_REDIRECT_URI'),
            environment: $this->resolveValue('environment', 'EBAY_API_ENVIRONMENT', 'sandbox'),
            authorizationScopes: $this->resolveScopes('authorization'),
            credentialScopes: $this->resolveScopes('credentials'),
        ));
    }

    /**
     *
     * @param string $option
     * @param string $envKey
     * @param mixed|null $default
     * @return mixed
     */
    protected function resolveValue(string $option, string $envKey, mixed $default = null): mixed
    {
        $value = $this->option($option);
        if ($value !== null && $value !== '' && $value !== []) {
            return $value;
        }

        $envValue = env($envKey);
        if ($envValue !== null && $envValue !== '') {
            return $envValue;
        }

        return $default;
    }

    /**
     *
     * @param string $scope
     * @return array
     */
    protected function resolveScopes(string $scope): array
    {
        $scopeOption = $scope == 'authorization' ? 'auth-scopes' : 'cred-scopes';

        $scopes = $this->option($scopeOption);
        if (!empty($scopes)) {
            return array_values(array_filter(
                $scopes,
                fn ($scope) => is_string($scope) && $scope !== ''
            ));
        } else {
            return $this->getDefaultScopes($scope);
        }
    }

    /**
     *
     * @param string $scope
     * @return array
     */
    protected function getDefaultScopes(string $scope): array
    {
        if ($scope == 'authorization') {
            return [
                'https://api.ebay.com/oauth/api_scope',
                'https://api.ebay.com/oauth/api_scope/commerce.feedback',
                'https://api.ebay.com/oauth/api_scope/commerce.identity.readonly',
                'https://api.ebay.com/oauth/api_scope/commerce.notification.subscription',
                'https://api.ebay.com/oauth/api_scope/commerce.vero',
                'https://api.ebay.com/oauth/api_scope/sell.account',
                'https://api.ebay.com/oauth/api_scope/sell.analytics.readonly',
                'https://api.ebay.com/oauth/api_scope/sell.finances',
                'https://api.ebay.com/oauth/api_scope/sell.fulfillment',
                'https://api.ebay.com/oauth/api_scope/sell.inventory',
                'https://api.ebay.com/oauth/api_scope/sell.inventory.mapping',
                'https://api.ebay.com/oauth/api_scope/sell.marketing',
                'https://api.ebay.com/oauth/api_scope/sell.payment.dispute',
                'https://api.ebay.com/oauth/api_scope/sell.reputation',
                'https://api.ebay.com/oauth/api_scope/sell.stores',
            ];
        } else if ($scope == 'credentials') {
            return [
                'https://api.ebay.com/oauth/api_scope',
                'https://api.ebay.com/oauth/api_scope/commerce.feedback.readonly',
            ];
        } else {
            return [];
        }
    }

    /**
     *
     * @param string $code
     * @return string|false
     */
    protected function getAuthenticationCode(string $code): string|false
    {
        if (str_starts_with($code, 'http')) {
            $query = parse_url($code, \PHP_URL_QUERY);
            if (empty($query)) {
                $this->error('Invalid callback URL: missing query string.');
                return false;
            }

            parse_str($query, $params);

            if (empty($code = $params['code'])) {
                $this->error('Invalid callback URL: missing "code" parameter.');
                return false;
            }
        }
        return $code;
    }

    /**
     *
     * @param string $refreshToken
     * @return bool
     */
    protected function writeTestingRefreshToken(string $refreshToken): bool
    {
        $path = base_path('.env.testing');
        if (!file_exists($path)) {
            if ($this->option('testing')) {
                $path = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . '.env.testing';
            }
            if (!file_exists($path)) {
                return false;
            }
        }

        $contents = (string) file_get_contents($path);
        $line = 'PEST_EBAY_REFRESH_TOKEN="' . $refreshToken . '"';

        if (preg_match('/^PEST_EBAY_REFRESH_TOKEN=.*$/m', $contents) === 1) {
            $contents = preg_replace(
                '/^PEST_EBAY_REFRESH_TOKEN=.*$/m',
                $line,
                $contents
            );
        } else {
            $contents = rtrim($contents) . PHP_EOL . PHP_EOL . $line . PHP_EOL;
        }

        file_put_contents($path, $contents);
        return true;
    }
}
