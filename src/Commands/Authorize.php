<?php declare(strict_types=1);

namespace Rat\eBaySDK\Commands;

use Illuminate\Console\Command;
use Rat\eBaySDK\Authentication\OAuthAuthentication;

class Authorize extends Command
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
        {--e|environment= : Custom eBay API environment}
        {--a|auth-scopes=* : Custom list of OAuth authorization scopes}
        {--c|cred-scopes=* : Custom list of credential scopes}
        {--all-auth-scopes : Use all available OAuth authorization scopes}
        {--all-cred-scopes : Use all available credential scopes}
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
            file_put_contents(
                storage_path('.ebay.key'),
                json_encode($response, \JSON_PRETTY_PRINT) . PHP_EOL
            );

            $this->table(
                ['Key', 'Value'],
                collect($response)->map(function ($value, $key) {
                    if ($key == 'access_token' || $key == 'refresh_token') {
                        $value = substr($value, 0, 6) . '...' . substr($value, -4);
                    }
                    return [$key, $value];
                })->toArray()
            );
            $this->warn('Refresh token written to storage/.ebay.key (do not commit this file).');
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
        $authScopes = $this->option('auth-scopes');
        if ($this->option('all-auth-scopes') === true) {
            $authScopes = [
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
        }

        $credScopes = $this->option('cred-scopes');
        if ($this->option('all-cred-scopes') === true) {
            $credScopes = [
                'https://api.ebay.com/oauth/api_scope',
                'https://api.ebay.com/oauth/api_scope/commerce.feedback.readonly',
            ];
        }

        return new OAuthAuthentication(
            clientId: $this->option('client-id'),
            clientSecret: $this->option('client-secret'),
            redirectUri: $this->option('redirect-uri'),
            environment: $this->option('environment'),
            authorizationScopes: $authScopes,
            credentialScopes: $credScopes,
        );
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
}
