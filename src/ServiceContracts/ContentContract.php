<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts;

use ModerationAPI\Content\ContentSubmitParams;
use ModerationAPI\Content\ContentSubmitResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;

interface ContentContract
{
    /**
     * @api
     *
     * @param array<mixed>|ContentSubmitParams $params
     *
     * @throws APIException
     */
    public function submit(
        array|ContentSubmitParams $params,
        ?RequestOptions $requestOptions = null
    ): ContentSubmitResponse;
}
