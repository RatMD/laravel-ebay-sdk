<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/account/types/api:ProgramTypeEnum
 */
enum ProgramType: string
{
    /**
     * If a seller's account is opted in to the out-of-stock control program, active fixed-price
     * listings will be kept 'alive' (but not surfaced in search results) even when the quantity for
     * the listing has been depleted to 0. This feature allows the seller to update/revise the
     * listing with more quantity, and prevents the seller from having to relist the item.
     */
    case OUT_OF_STOCK_CONTROL = "OUT_OF_STOCK_CONTROL";

    /**
     * The Partner Motors Program that sellers can participate in by opting-in to the program.
     * Sellers must be registered business users to opt-in to this program.
     */
    case PARTNER_MOTORS_DEALER = "PARTNER_MOTORS_DEALER";

    /**
     * If a seller's account is opted in to this program, sellers can associate business policies
     * (payment, return policy, fulfillment) to their listings. Being opted in to business policies
     * is a requirement for using the Inventory API.
     */
    case SELLING_POLICY_MANAGEMENT = "SELLING_POLICY_MANAGEMENT";
}
