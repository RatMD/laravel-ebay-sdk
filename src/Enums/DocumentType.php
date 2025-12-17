<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/commerce/media/types/api:DocumentTypeEnum
 */
enum DocumentType: string
{
    /**
     * This is a document provided by the manufacturer or a qualified third-party laboratory that confirms the product has been tested and meets the specified criteria.
     */
    case CERTIFICATE_OF_ANALYSIS = "CERTIFICATE_OF_ANALYSIS";

    /**
     * This certificate is issued by a manufacturer or a certification body to declare that a product meets all the required safety and regulatory standards.
     */
    case CERTIFICATE_OF_CONFORMITY = "CERTIFICATE_OF_CONFORMITY";

    /**
     * This is a document self-issued by a manufacturer declaring that their product complies with all the relevant requirements of the GPSR and other applicable regulations and standards.
     */
    case DECLARATION_OF_CONFORMITY = "DECLARATION_OF_CONFORMITY";

    /**
     * These are detailed directions provided by the manufacturer that inform the consumer on how to use the product correctly and safely.
     */
    case INSTRUCTIONS_FOR_USE = "INSTRUCTIONS_FOR_USE";

    /**
     * This could refer to any additional safety-related documentation that accompanies a product. This may include safety warnings, emergency procedures, information on safe storage and handling, or any other relevant safety information that doesn't fall into the other specified categories.
     */
    case OTHER_SAFETY_DOCUMENTS = "OTHER_SAFETY_DOCUMENTS";

    /**
     * This is a detailed document that provides information on the properties of a chemical product. It includes information on the potential hazards (health, fire, reactivity, and environmental), safe handling practices, and emergency control measures (for example, fire-fighting).
     */
    case SAFETY_DATA_SHEET = "SAFETY_DATA_SHEET";

    /**
     * This guide helps users diagnose and resolve problems that they may encounter with a product.
     */
    case TROUBLE_SHOOTING_GUIDE = "TROUBLE_SHOOTING_GUIDE";

    /**
     * A user guide or manual is a comprehensive resource that includes all the necessary information for consumers to understand and operate the product.
     */
    case USER_GUIDE_OR_MANUAL = "USER_GUIDE_OR_MANUAL";

    /**
     * These are step-by-step instructions provided by the manufacturer that detail how to properly install a product.
     */
    case INSTALLATION_INSTRUCTIONS = "INSTALLATION_INSTRUCTIONS";

    /**
     * This document provides details on the accessibility features of a product, ensuring it can be used by individuals with disabilities or special needs.
     */
    case ACCESSIBILITY_INFORMATION = "ACCESSIBILITY_INFORMATION";

}
