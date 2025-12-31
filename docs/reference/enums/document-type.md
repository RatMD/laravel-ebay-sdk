# DocumentType Enum <DocsBadge path="commerce/media/types/api:DocumentTypeEnum" />

This enumeration value indicates the type of document.

| Value           | Description           |
| --------------- | --------------------- |
| `CERTIFICATE_OF_ANALYSIS`   | This is a document provided by the manufacturer or a qualified third-party laboratory that confirms the product has been tested and meets the specified criteria. |
| `CERTIFICATE_OF_CONFORMITY` | This certificate is issued by a manufacturer or a certification body to declare that a product meets all the required safety and regulatory standards. |
| `DECLARATION_OF_CONFORMITY` | This is a document self-issued by a manufacturer declaring that their product complies with all the relevant requirements of the GPSR and other applicable regulations and standards. |
| `INSTRUCTIONS_FOR_USE`      | These are detailed directions provided by the manufacturer that inform the consumer on how to use the product correctly and safely. |
| `OTHER_SAFETY_DOCUMENTS`    | This could refer to any additional safety-related documentation that accompanies a product. This may include safety warnings, emergency procedures, information on safe storage and handling, or any other relevant safety information that doesn't fall into the other specified categories. |
| `SAFETY_DATA_SHEET`         | This is a detailed document that provides information on the properties of a chemical product. It includes information on the potential hazards (health, fire, reactivity, and environmental), safe handling practices, and emergency control measures (for example, fire-fighting). |
| `TROUBLE_SHOOTING_GUIDE`    | This guide helps users diagnose and resolve problems that they may encounter with a product. |
| `USER_GUIDE_OR_MANUAL`      | A user guide or manual is a comprehensive resource that includes all the necessary information for consumers to understand and operate the product. |
| `INSTALLATION_INSTRUCTIONS` | These are step-by-step instructions provided by the manufacturer that detail how to properly install a product. |
| `ACCESSIBILITY_INFORMATION` | This document provides details on the accessibility features of a product, ensuring it can be used by individuals with disabilities or special needs. |

## Example

```php
use Rat\eBaySDK\Enums\DocumentType;

DocumentType::CERTIFICATE_OF_ANALYSIS;
```
