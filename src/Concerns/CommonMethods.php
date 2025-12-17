<?php declare(strict_types=1);

namespace Rat\eBaySDK\Concerns;

trait CommonMethods
{
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
    public function headers(): mixed
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function body(): mixed
    {
        return null;
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
