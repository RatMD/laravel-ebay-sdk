<?php declare(strict_types=1);

namespace Rat\eBaySDK\Contracts;

use Rat\eBaySDK\Enums\HTTPMethod;

interface BaseAPIRequest {
    /**
     * The base environment URL.
     * @param string $environment
     * @return ?string
     */
    public function base(string $environment): ?string;

    /**
     * The HTTP method used for the request.
     * @return HTTPMethod
     */
    public function method(): HTTPMethod;

    /**
     * The API endpoint path (without base URL).
     * @return string
     */
    public function path(): string;

    /**
     * The Path parameters used to replace placeholders in the path.
     * @return array<string, mixed>
     */
    public function params(): array;

    /**
     * The Query parameters appended to the URL.
     * @return array<string, mixed>
     */
    public function query(): array;

    /**
     * Additional request headers (as needed for some APIs).
     * @return array
     */
    public function headers(): array;

    /**
     * The Request body payload (for non-GET requests), either an array or an
     * string / Stream is expected.
     * @return mixed
     */
    public function body(): mixed;

    /**
     * Whether the request requires a client-credentials or a user access token.
     * @return bool
     */
    public function requiresCredentialsToken(): bool;

    /**
     * Validates the request data, should throw an ValidationException.
     * @return void
     */
    public function validate(): void;
}
