<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Casebook;

/**
 * The ruling your past decisions point to for this content.
 */
enum Verdict: string
{
    case ALLOW = 'allow';

    case REJECT = 'reject';
}
