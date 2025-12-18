<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/commerce/feedback/resources/feedback/methods/getFeedback
 */
enum FeedbackType: string
{
    /**
     * Retrieve feedback received by the specified user.
     */
    case FEEDBACK_RECEIVED = "FEEDBACK_RECEIVED";

    /**
     * Retrieve feedback sent by the specified user.
     */
    case FEEDBACK_SENT = "FEEDBACK_SENT";
}
