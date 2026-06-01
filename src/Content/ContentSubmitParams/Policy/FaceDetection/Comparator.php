<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy\FaceDetection;

/**
 * Flag images that contain "at least" or "fewer than" the configured number of faces. Defaults to at_least.
 */
enum Comparator: string
{
    case AT_LEAST = 'at_least';

    case FEWER_THAN = 'fewer_than';
}
