<?php declare(strict_types=1);

namespace Rat\eBaySDK\Contracts;

interface Authentication
{
    /**
     *
     * @return static
     */
    public function setRefreshToken(string $token): self;

    /**
     *
     * @return string
     */
    public function getRefreshToken(): ?string;

    /**
     *
     * @return string
     */
    public function getAccessToken(): string;

    /**
     *
     * @return string
     */
    public function getClientCredentialsToken(): string;

    /**
     *
     * @return string
     */
    public function buildAuthorizationUrl(
        string $environment,
        string $clientId,
        string $redirectUri,
        array $scopes,
        array $options = []
    ): string;

    /**
     *
     * @return string
     */
    public function getAuthorizationUrl(?string $state = null): string;

    /**
     *
     * @return array
     */
    public function exchangeAuthorizationCode(string $code, ?string $state = null): array;
}
