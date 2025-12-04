<?php

namespace ModerationAPI\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'ModerationAPI Bad Request Exception';
}
