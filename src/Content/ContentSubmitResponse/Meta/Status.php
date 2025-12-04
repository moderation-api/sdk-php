<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Meta;

enum Status: string
{
    case SUCCESS = 'success';

    case PARTIAL_SUCCESS = 'partial_success';
}
