<?php declare(strict_types=1);

namespace Rat\eBaySDK\Services;

use Illuminate\Contracts\Cache\Repository as CacheRepository;
use Rat\eBaySDK\API\NotificationAPI\PublicKey\GetPublicKey;
use Rat\eBaySDK\Client;
use Rat\eBaySDK\Events\MarketplaceAccountDeletionReceived;

class MarketplaceDeletionService
{
    /**
     *
     * @param Client $client
     * @param CacheRepository $cache
     * @return void
     */
    public function __construct(
        private readonly Client $client,
        private readonly CacheRepository $cache,
    ) {}

    /**
     * Build challenge response.
     * @param string $challengeCode
     * @return string
     */
    public function build(string $challengeCode): string
    {
        $verificationToken = (string) config('ebay-sdk.marketplace_deletion.token');
        if ($verificationToken === '') {
            throw new \RuntimeException('Marketplace deletion verification token is not configured.');
        }

        $endpoint = config('ebay-sdk.marketplace_deletion.endpoint');
        if (empty($endpoint)) {
            $endpoint = route('ebay-sdk.marketplace.deletion', absolute: true);
        }
        if (empty($endpoint)) {
            throw new \RuntimeException('Marketplace deletion endpoint is not configured.');
        }

        $hash = hash_init('sha256');
        hash_update($hash, $challengeCode);
        hash_update($hash, $verificationToken);
        hash_update($hash, $endpoint);
        return hash_final($hash);
    }

    /**
     * Verify notification payload.
     * @param string $payload
     * @param string $signatureHeader
     * @param array $headers
     * @return bool
     */
    public function verify(string $payload, string $signatureHeader, array $headers = []): bool
    {
        if ($signatureHeader === '' || $payload === '') {
            return false;
        }

        $data = json_decode($payload, true);
        if (!is_array($data)) {
            return false;
        }

        $decoded = $this->decodeSignatureHeader($signatureHeader);
        $keyId = $decoded['kid'] ?? null;
        $signature = $decoded['signature'] ?? null;
        if (!is_string($keyId) || empty($keyId) || !is_string($signature) || empty($signature)) {
            return false;
        }

        $publicKey = $this->getPublicKey($keyId);
        if (!$this->verifySignature($data, $signature, $publicKey)) {
            return false;
        }

        event(new MarketplaceAccountDeletionReceived(
            payload: $data,
            headers: $headers,
            raw: $payload
        ));
        return true;
    }

    /**
     *
     * @param string $signatureHeader
     * @return array
     */
    protected function decodeSignatureHeader(string $signatureHeader): array
    {
        $json = base64_decode($signatureHeader, true);
        if ($json === false) {
            return [];
        } else {
            $decoded = json_decode($json, true);
            return is_array($decoded) ? $decoded : [];
        }
    }

    /**
     *
     * @param string $keyId
     * @return string
     */
    protected function getPublicKey(string $keyId): string
    {
        $ttl = (int) config('ebay-sdk.marketplace_deletion.public_key_cache_ttl', 3600);

        return $this->cache->remember('ebay.marketplace_deletion.public_key.' . $keyId, $ttl, function () use ($keyId): string {
            $request = new GetPublicKey(publicKeyId: $keyId);
            $response = $this->client->execute($request);

            $key = $response->content()['key'] ?? null;
            if (empty($key)) {
                throw new \RuntimeException('Unable to retrieve eBay public key.');
            } else {
                return $key;
            }
        });
    }

    /**
     *
     * @param array $message
     * @param string $signature
     * @param string $publicKey
     * @return bool
     */
    protected function verifySignature(array $message, string $signature, string $publicKey): bool
    {
        $pem = $this->normalizePublicKey($publicKey);

        $signatureBytes = base64_decode($signature, true);
        if ($signatureBytes === false) {
            return false;
        }

        $encodedMessage = json_encode($message);
        if ($encodedMessage === false) {
            return false;
        }

        $result = openssl_verify(
            $encodedMessage,
            $signatureBytes,
            $pem,
            OPENSSL_ALGO_SHA1
        );
        return $result === 1;
    }

    /**
     *
     * @param string $publicKey
     * @return string
     */
    protected function normalizePublicKey(string $publicKey): string
    {
        $publicKey = trim($publicKey);

        if (!preg_match('/^-----BEGIN PUBLIC KEY-----(.+)-----END PUBLIC KEY-----$/s', $publicKey, $matches)) {
            return "-----BEGIN PUBLIC KEY-----\n"
                . implode("\n", str_split(preg_replace('/\s+/', '', $publicKey), 64))
                . "\n-----END PUBLIC KEY-----";
        } else {
            $body = preg_replace('/\s+/', '', $matches[1]);
            return "-----BEGIN PUBLIC KEY-----\n"
                . implode("\n", str_split($body, 64))
                . "\n-----END PUBLIC KEY-----";
        }
    }
}
