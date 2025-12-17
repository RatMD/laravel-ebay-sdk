<?php declare(strict_types=1);

namespace Rat\eBaySDK\Concerns;

use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Enums\SiteCode;

trait CommonTraditions
{
    /**
     *
     * @var null|string
     */
    protected ?string $compatibilityLevel = null;

    /**
     *
     * @var null|string
     */
    protected ?string $errorLanguage = null;

    /**
     *
     * @var null|string
     */
    protected ?string $errorHandling = null;

    /**
     *
     * @var null|int
     */
    protected ?int $siteId = null;

    /**
     *
     * @var null|string
     */
    protected ?string $warningLevel = null;

    /**
     * @inheritdoc
     */
    public function callName(): string
    {
        return class_basename($this);
    }

    /**
     * @inheritdoc
     */
    public function tagName(): string
    {
        return class_basename($this) . 'Request';
    }

    /**
     * @inheritdoc
     */
    public function setCompatibilityLevel(string $value): static
    {
        $this->compatibilityLevel = $value;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function compatibilityLevel(): string
    {
        return $this->compatibilityLevel ?? config('ebay-sdk.traditional.compatibility_level');
    }

    /**
     * @inheritdoc
     */
    public function setErrorLanguage(string $value): static
    {
        $this->errorLanguage = $value;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function errorLanguage(): string
    {
        return $this->errorLanguage ?? config('ebay-sdk.traditional.error_language');
    }

    /**
     * @inheritdoc
     */
    public function setErrorHandling(string $value): static
    {
        $this->errorHandling = $value;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function errorHandling(): string
    {
        return $this->errorHandling ?? config('ebay-sdk.traditional.error_handling');
    }

    /**
     * @inheritdoc
     */
    public function setSiteId(int|SiteCode $value): static
    {
        $this->siteId = (int) $value;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function sideId(): int
    {
        return $this->siteId ?? config('ebay-sdk.traditional.site_id');
    }

    /**
     * @inheritdoc
     */
    public function setWarningLevel(string $value): static
    {
        $this->warningLevel = $value;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function warningLevel(): string
    {
        return $this->warningLevel ?? config('ebay-sdk.traditional.warning_level');
    }

    /**
     * @inheritdoc
     */
    public function method(): HTTPMethod
    {
        return HTTPMethod::POST;
    }

    /**
     * @inheritdoc
     */
    public function path(): string
    {
        return '/ws/api.dll';
    }

    /**
     * @inheritdoc
     */
    public function params(): array
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function query(): array
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function headers(): array
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function requiresCredentialsToken(): bool
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function validate(): void
    {
    }
}
