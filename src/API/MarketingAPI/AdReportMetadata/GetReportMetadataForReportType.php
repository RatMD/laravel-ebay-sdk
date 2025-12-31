<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\AdReportMetadata;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Enums\ReportType;

/**
 * GET /ad_report_metadata/{reportType}
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/ad_report_metadata/methods/getReportMetadataForReportType
 */
class GetReportMetadataForReportType implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/ad_report_metadata';

    /**
     * Create a new instance.
     * @param ReportType $reportType
     * @param string $fundingModel
     * @param string $channel
     * @return void
     */
    public function __construct(
        public readonly ReportType $reportType,
        public readonly ?string $fundingModel = null,
        public readonly ?string $channel = null,
    ) { }

    /**
     * @inheritdoc
     */
    public function method(): HTTPMethod
    {
        return HTTPMethod::GET;
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
    public function params(): array
    {
        return ['reportType' => $this->reportType];
    }

    /**
     * @inheritdoc
     */
    public function query(): array
    {
        return [
            'funding_model' => $this->fundingModel,
            'channel'       => $this->channel
        ];
    }
}
