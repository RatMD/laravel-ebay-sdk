# Program Enum <DocsBadge path="sell/analytics/types/ssp:ProgramEnum" />

An enum that defines the regions to which a profile can apply.

| Value            | Description                                                                                                   |
| ---------------- | ------------------------------------------------------------------------------------------------------------- |
| `PROGRAM_DE`     | Indicates the program region is Germany, which includes DE (Germany), AT (Austria), and CH (Switzerland).     |
| `PROGRAM_UK`     | Indicates the program region is the United Kingdom, which includes both UK (United Kingdom) and IE (Ireland). |
| `PROGRAM_US`     | Indicates the program region is the United States, which includes US (the United States) and US MOTORS.       |
| `PROGRAM_GLOBAL` | Includes all defined programs, plus any marketplace countries where a seller has conducted business.          |

## Example

```php
use Rat\eBaySDK\Enums\Program;

Program::PROGRAM_DE;
```