<?php

namespace ModerationAPI\Core\Exceptions;

class AuthenticationException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'ModerationAPI Authentication Exception';
}
