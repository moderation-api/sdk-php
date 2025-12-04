<?php

namespace ModerationAPI\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'ModerationAPI Rate Limit Exception';
}
