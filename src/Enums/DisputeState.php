<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/types/api:DisputeStateEnum
 */
enum DisputeState: string
{
    /**
     * This enumeration value indicates the payment dispute is open, but there is no action required by the seller at the present time.
     */
    case OPEN = "OPEN";

    /**
     * This enumeration value indicates the payment dispute is open, and the seller is required to take action at the present time. The seller's choices for action are returned in the availableChoices array of the getPaymentDispute response. The seller should respond by the date/time specified in the respondByDate field in the getPaymentDispute response.
     */
    case ACTION_NEEDED = "ACTION_NEEDED";

    /**
     * This enumeration value indicates the payment dispute is closed. The reason for the closure of the payment dispute can be viewed in the resolution.reasonForClosure field of the getPaymentDispute response, and closure date can be found in the closedDate field of the getPaymentDispute response.
     */
    case CLOSED = "CLOSED";
}
