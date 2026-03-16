<?php declare(strict_types=1);

namespace Rat\eBaySDK\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateMarketplaceDeletionTokenCommand extends Command
{
    /**
     *
     * @var string
     */
    protected $signature = 'ebay:marketplace-token
        {--l|length=64 : Token length (32-80)}
        {--write : Write token to your .env file}
    ';

    /**
     *
     * @var string
     */
    protected $description = 'Generate a verification token for the eBay Marketplace Account Deletion endpoint.';

    /**
     *
     * @return int
     */
    public function handle(): int
    {
        $length = (int) $this->option('length');

        if ($length < 32 || $length > 80) {
            $this->error('The token length must be between 32 and 80 characters.');
            return self::FAILURE;
        }

        $token = Str::random($length);

        if ($this->option('write')) {
            return $this->writeToEnv($token);
        } else {
            $this->line($token);
            return self::SUCCESS;
        }
    }

    /**
     *
     * @param string $token
     * @return int
     */
    protected function writeToEnv(string $token): int
    {
        $envPath = base_path('.env');
        if (!is_file($envPath)) {
            $this->error('.env file not found.');
            return self::FAILURE;
        }

        $key = 'EBAY_MARKETPLACE_DELETION_VERIFICATION_TOKEN';

        $content = file_get_contents($envPath);
        if ($content === false) {
            $this->error('Unable to read .env file.');
            return self::FAILURE;
        }

        $line = $key . '=' . $token;

        if (preg_match('/^' . preg_quote($key, '/') . '=.*/m', $content)) {
            $content = preg_replace(
                '/^' . preg_quote($key, '/') . '=.*/m',
                $line,
                $content
            );
            $this->info('Updated existing token in .env');
        } else {
            $content .= PHP_EOL . $line . PHP_EOL;
            $this->info('Added token to .env');
        }

        file_put_contents($envPath, $content);
        $this->line($line);
        return self::SUCCESS;
    }
}
