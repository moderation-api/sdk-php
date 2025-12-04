<?php

namespace ModerationAPI\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'ModerationAPI Unprocessable Entity Exception';
}
