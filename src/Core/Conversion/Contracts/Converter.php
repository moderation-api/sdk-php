<?php

declare(strict_types=1);

namespace ModerationAPI\Core\Conversion\Contracts;

use ModerationAPI\Core\Conversion\CoerceState;
use ModerationAPI\Core\Conversion\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
