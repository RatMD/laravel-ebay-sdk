<?php declare(strict_types=1);

namespace Rat\eBaySDK\Exceptions;

use Throwable;

class AuthorizationException extends SDKException
{
    /**
     * HTTP Body content.
     * @var ?string
     */
    protected ?string $content;

    /**
     *
     * @param string $message
     * @param ?string $content
     * @param int $code
     * @param Throwable|null $previous
     * @return void
     */
    public function __construct(
        string $message = "",
        ?string $content = null,
        int $code = 0,
        Throwable|null $previous = null
    ) {
        if (!empty($code) && $code > 99 && $code < 600) {
            $message .= " (Status Code: {$code})";
        }
        if (!empty($content)) {
            $message .= " (Response Body: {$content})";
        }
        $this->content = $content;
        return parent::__construct($message, $code, $previous);
    }

    /**
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     *
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->code;
    }
}
