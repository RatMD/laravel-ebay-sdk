<?php declare(strict_types=1);

namespace Rat\eBaySDK\Support;

use Illuminate\Contracts\Support\Arrayable;

class MultipartBody implements Arrayable
{
    /**
     *
     * @var array
     */
    private array $handles = [];

    /**
     *
     * @param array $payload
     * @return void
     */
    public function __construct(
        protected array $payload
    ){ }

    /**
     *
     * @return void
     */
    public function __destruct()
    {
        $this->close();
    }

    /**
     * @inheritdoc
     */
    public function toArray()
    {
        foreach ($this->payload as $part) {
            if (isset($part['contents']) && is_resource($part['contents'])) {
                $this->handles[] = $part['contents'];
            }
        }
        return $this->payload;
    }

    /**
     *
     * @return void
     */
    public function close(): void
    {
        foreach ($this->handles as $h) {
            if (is_resource($h)) {
                fclose($h);
            }
        }
        $this->handles = [];
    }
}
