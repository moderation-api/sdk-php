<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Recommendation;

enum ReasonCode: string
{
    case SEVERITY_REJECT = 'severity_reject';

    case SEVERITY_REVIEW = 'severity_review';

    case AUTHOR_BLOCK = 'author_block';

    case DRY_RUN = 'dry_run';

    case TRUSTED_ALLOW = 'trusted_allow';

    case UNTRUSTED_SEVERITY = 'untrusted_severity';
}
