<?php declare(strict_types=1);

namespace Rat\eBaySDK\Support;

use Rat\eBaySDK\Contracts\TraditionalAPIRequest;

class XMLBody
{
    /**
     *
     * @param null|array|string $payload
     * @return void
     */
    public function __construct(
        protected null|array|string $payload = null
    ){ }

    /**
     *
     * @param array $data
     * @return string
     */
    protected function arrayToXml(array $data): string
    {
        $output = [];

        foreach ($data AS $key => $value) {
            $key = is_numeric($key) ? 'Item' : $key;
            if (!preg_match('/^[A-Za-z_][A-Za-z0-9._-]*$/', $key)) {
                throw new \InvalidArgumentException("Invalid XML tag name: {$key}");
            }

            if (is_array($value)) {
                if (array_is_list($value)) {
                    foreach ($value as $val) {
                        if (is_array($val)) {
                            $output[] = "<{$key}>" . $this->arrayToXml($val) . "</{$key}>";
                        } else {
                            $escaped = htmlspecialchars((string) $val, \ENT_XML1);
                            $output[] = "<{$key}>{$escaped}</{$key}>";
                        }
                    }
                } else {
                    $output[] = "<{$key}>" . $this->arrayToXml($value) . "</{$key}>";
                }
            } else {
                $escaped = htmlspecialchars((string) $value, \ENT_XML1);
                $output[] = "<{$key}>{$escaped}</{$key}>";
            }
        }

        return implode('', $output);
    }

    /**
     *
     * @param TraditionalAPIRequest $request
     * @param string $authToken
     * @return string
     */
    public function render(TraditionalAPIRequest $request, string $authToken)
    {
        $payload = is_array($this->payload) ? $this->arrayToXml($this->payload) : $this->payload;
        $authToken = htmlspecialchars($authToken, \ENT_XML1);

        return <<<XML
            <?xml version="1.0" encoding="utf-8"?>
            <{$request->tagName()} xmlns="urn:ebay:apis:eBLBaseComponents">
                <DetailLevel>ReturnAll</DetailLevel>
                <ErrorLanguage>{$request->errorLanguage()}</ErrorLanguage>
                <ErrorHandling>{$request->errorHandling()}</ErrorHandling>
                <RequesterCredentials>
                    <eBayAuthToken>{$authToken}</eBayAuthToken>
                </RequesterCredentials>
                <Version>{$request->compatibilityLevel()}</Version>
                <WarningLevel>{$request->warningLevel()}</WarningLevel>

                {$payload}
            </{$request->tagName()}>
        XML;
    }
}
