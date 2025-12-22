<?php declare(strict_types=1);

namespace Rat\eBaySDK\Commands;

use App\Models\eBayOffer;
use Illuminate\Console\Command;
use Rat\eBaySDK\Authentication\OAuthAuthentication;

class Authorize extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'ebay:authorize {url?}
        {--client-id : eBay OAuth client ID (defaults to configured value)}
        {--client-secret : eBay OAuth client secret (defaults to configured value)}
        {--redirect-uri : eBay redirect URI / RuName (defaults to configured value)}
        {--auth-scopes : Comma-separated list of OAuth authorization scopes (defaults to configured scopes)}
        {--cred-scopes : Comma-separated list of credential scopes (defaults to configured scopes)}
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
        dd($this->options('client-id'));
        $auth = new OAuthAuthentication(
            $this->option('client-id')
        );
        return Command::SUCCESS;
    }
}
