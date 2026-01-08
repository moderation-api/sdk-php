<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts;

use ModerationAPI\Content\ContentSubmitParams;
use ModerationAPI\Content\ContentSubmitResponse;
use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
interface ContentRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ContentSubmitParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentSubmitResponse>
     *
     * @throws APIException
     */
    public function submit(
        array|ContentSubmitParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
