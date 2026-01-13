<?php declare(strict_types=1);

namespace Rat\eBaySDK\Contracts;

use Rat\eBaySDK\Enums\SiteCode;

interface TraditionalAPIRequest extends BaseAPIRequest
{
    /**
     *
     * @return string
     */
    public function callName(): string;

    /**
     *
     * @return string
     */
    public function tagName(): string;

    /**
     *
     * @param string $value
     * @return static
     */
    public function setCompatibilityLevel(string $value): static;

    /**
     *
     * @return string
     */
    public function compatibilityLevel(): string;

    /**
     *
     * @param string $value
     * @return static
     */
    public function setErrorLanguage(string $value): static;

    /**
     *
     * @return string
     */
    public function errorLanguage(): string;

    /**
     *
     * @param string $value
     * @return static
     */
    public function setErrorHandling(string $value): static;

    /**
     *
     * @return string
     */
    public function errorHandling(): string;

    /**
     *
     * @param int $value
     * @return static
     */
    public function setSiteId(int|SiteCode $value): static;

    /**
     *
     * @return int
     */
    public function siteId(): int;

    /**
     *
     * @param string $value
     * @return static
     */
    public function setWarningLevel(string $value): static;

    /**
     *
     * @return string
     */
    public function warningLevel(): string;
}
