<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Policy\EntityMatcherOutput\Match_\Signals\BrandImpersonation;

enum Method: string
{
    case REGISTERED_DOMAIN_TOKEN = 'registered_domain_token';

    case SUBDOMAIN_TOKEN = 'subdomain_token';
}
