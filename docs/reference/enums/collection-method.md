# CollectionMethod Enum <DocsBadge path="sell/fulfillment/types/sel:CollectionMethodEnum" />

This enumerated type defines the collection methods that are used to collect either 'Collect and 
Remit' sales tax in the US, or 'Good and Services' tax in Australia and New Zealand.

> [!NOTE]
> Although the collectionMethod field is returned for all orders subject to 'Collect and Remit' tax, 
> the collectionMethod field and the CollectionMethodEnum type are not currently of any practical 
> use, although this field may have use in the future. If and when the logic of this field is 
> changed, this note will be updated and a note will also be added to the Release Notes.

| Value     | Description                        |
| --------- | ---------------------------------- |
| `INVOICE` | This enumeration value is for future use only, and will not currently be returned in the collectionMethod field. |
| `NET`     | This enumeration value is always returned in the collectionMethod field for 'Collect and Remit' taxes, but the collectionMethod field is currently for future use. |

## Example

```php
use Rat\eBaySDK\Enums\CollectionMethod;

CollectionMethod::INVOICE;
```
