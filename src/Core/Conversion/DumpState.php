<?php

declare(strict_types=1);

namespace ModerationAPI\Core\Conversion;

/**
 * @internal
 */
final class DumpState
{
    public function __construct(
        public bool $canRetry = true
    ) {}
}
