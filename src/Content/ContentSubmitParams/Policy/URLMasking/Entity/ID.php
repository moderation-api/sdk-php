<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy\URLMasking\Entity;

enum ID: string
{
    case EMAIL = 'email';

    case PHONE = 'phone';

    case URL = 'url';

    case ADDRESS = 'address';

    case NAME = 'name';

    case USERNAME = 'username';

    case IP_ADDRESS = 'ip_address';

    case CREDIT_CARD = 'credit_card';

    case SENSITIVE_OTHER = 'sensitive_other';
}
