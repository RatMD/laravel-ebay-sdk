<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/analytics/types/ssp:ProgramEnum
 */
enum Program: string
{
    /**
     * Indicates the program region is Germany, which includes DE (Germany), AT (Austria), and
     * CH (Switzerland).
     */
    case PROGRAM_DE = "PROGRAM_DE";

    /**
     * Indicates the program region is the United Kingdom, which includes both UK (United Kingdom)
     * and IE (Ireland).
     */
    case PROGRAM_UK = "PROGRAM_UK";

    /**
     * Indicates the program region is the United States, which includes US (the United States) and
     * US MOTORS.
     */
    case PROGRAM_US = "PROGRAM_US";

    /**
     * Includes all defined programs, plus any marketplace countries where a seller has conducted
     * business.
     */
    case PROGRAM_GLOBAL = "PROGRAM_GLOBAL";
}
