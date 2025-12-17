<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MediaAPI\Document;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\MediaAPIRequest;
use Rat\eBaySDK\Enums\DocumentType;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Enums\Language;

/**
 * POST /document
 * @see https://developer.ebay.com/api-docs/commerce/media/resources/document/methods/createDocument
 */
class CreateDocument implements MediaAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/media/v1_beta/document';

    /**
     * Create a new instance.
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly array $payload,
    ) { }

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
        return self::PATH;
    }

    /**
     * @inheritdoc
     */
    public function body(): array
    {
        return $this->payload;
    }

    /**
     * @inheritdoc
     */
    public function validate(): void
    {
        Validator::make($this->query(), [
            'documentType'  => ['required', Rule::Enum(DocumentType::class)],
            'languages'     => ['required', 'array', 'min:1'],
            'languages.*'   => ['required', Rule::enum(Language::class)],
        ])->validate();
    }
}
