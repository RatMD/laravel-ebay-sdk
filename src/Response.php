<?php declare(strict_types=1);

namespace Rat\eBaySDK;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;
use Psr\Http\Message\ResponseInterface;

class Response implements Arrayable
{
    /**
     *
     * @param ResponseInterface $response
     * @return Response
     */
    static public function createFromResponse(ResponseInterface $response)
    {
        $body = (string) $response->getBody()->getContents();
        $contentType = $response->getHeaderLine('Content-Type');
        $contentType = $contentType !== '' ? strtolower(trim(explode(';', $contentType, 2)[0])) : null;

        $headers = [];
        foreach ($response->getHeaders() as $key => $values) {
            $headers[Str::lower($key)] = $values;
        }

        return new self(
            statusCode: $response->getStatusCode(),
            headers: $headers,
            contentType: $contentType,
            body: $body,
        );
    }

    /**
     *
     * @param int $statusCode
     * @param array $headers
     * @param null|string $contentType
     * @param string $body
     * @return void
     */
    public function __construct(
        public readonly int $statusCode,
        public readonly array $headers,
        public readonly ?string $contentType,
        public readonly string $body,
    ){ }

    /**
     *
     * @return array<string|int, mixed>
     */
    public function toArray()
    {
        return [
            'status_code'   => $this->statusCode,
            'headers'       => $this->headers,
            'contentType'   => $this->contentType,
            'body'          => $this->body,
        ];
    }

    /**
     *
     * @return ?string
     */
    public function location(): ?string
    {
        return $this->headers['Location'] ?? $this->headers['location'] ?? null;
    }

    /**
     *
     * @return bool
     */
    public function ok(): bool
    {
        return $this->statusCode >= 200 && $this->statusCode <= 299;
    }

    /**
     *
     * @return mixed
     */
    public function content(): mixed
    {
        if ($this->contentType === 'application/json' || $this->contentType === 'text/json') {
            $decoded = json_decode($this->body, true);
            return (json_last_error() === JSON_ERROR_NONE) ? $decoded : $this->body;
        } else if ($this->contentType === 'application/xml' || $this->contentType === 'text/xml') {
            libxml_use_internal_errors(true);

            $xmlObject = simplexml_load_string($this->body, 'SimpleXMLElement', \LIBXML_NOCDATA);
            if ($xmlObject === false) {
                libxml_clear_errors();
                throw new \Exception('Invalid XML Body received.');
            } else {
                return json_decode(json_encode($xmlObject), true);
            }
        } else {
            return $this->body;
        }
    }

    /**
     *
     * @return bool
     */
    public function hasErrors(): bool
    {
        return count($this->errors()) > 0;
    }

    /**
     *
     * @return array
     */
    public function errors(): array
    {
        $content = $this->content();

        if (is_array($content)) {
            if (array_key_exists('errors', $content)) {
                return $content['errors'];
            }
            if (array_key_exists('error', $content)) {
                return $content['error'];
            }
            if (array_key_exists('Errors', $content)) {
                return $content['Errors'];
            }
            if (array_key_exists('Error', $content)) {
                return $content['Error'];
            }
        }
        return [];
    }

    /**
     *
     * @return bool
     */
    public function hasWarnings(): bool
    {
        return count($this->warnings()) > 0;
    }

    /**
     *
     * @return array
     */
    public function warnings(): array
    {
        $content = $this->content();

        if (is_array($content)) {
            if (array_key_exists('warnings', $content)) {
                return $content['warnings'];
            }
            if (array_key_exists('warning', $content)) {
                return $content['warning'];
            }
            if (array_key_exists('Warnings', $content)) {
                return $content['Warnings'];
            }
            if (array_key_exists('Warning', $content)) {
                return $content['Warning'];
            }
        }
        return [];
    }
}
