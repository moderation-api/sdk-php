<?php

namespace ModerationAPI\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'ModerationAPI Internal Server Exception';
}
