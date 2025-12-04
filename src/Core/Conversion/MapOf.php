<?php

declare(strict_types=1);

namespace ModerationAPI\Core\Conversion;

use ModerationAPI\Core\Conversion\Concerns\ArrayOf;
use ModerationAPI\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class MapOf implements Converter
{
    use ArrayOf;
}
