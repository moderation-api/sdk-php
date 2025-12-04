<?php

namespace ModerationAPI\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'ModerationAPI Conflict Exception';
}
