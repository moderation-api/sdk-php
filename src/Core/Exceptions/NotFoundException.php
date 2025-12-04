<?php

namespace ModerationAPI\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'ModerationAPI Not Found Exception';
}
