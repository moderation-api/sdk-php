<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts;

use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\Wordlist\WordlistGetEmbeddingStatusResponse;
use ModerationAPI\Wordlist\WordlistGetResponse;
use ModerationAPI\Wordlist\WordlistListResponseItem;
use ModerationAPI\Wordlist\WordlistUpdateParams;
use ModerationAPI\Wordlist\WordlistUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
interface WordlistRawContract
{
    /**
     * @api
     *
     * @param string $id ID of the wordlist to get
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WordlistGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id ID of the wordlist to update
     * @param array<string,mixed>|WordlistUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WordlistUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|WordlistUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<WordlistListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id ID of the wordlist to check embedding status for
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WordlistGetEmbeddingStatusResponse>
     *
     * @throws APIException
     */
    public function getEmbeddingStatus(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
