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

interface WordlistRawContract
{
    /**
     * @api
     *
     * @param string $id ID of the wordlist to get
     *
     * @return BaseResponse<WordlistGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id ID of the wordlist to update
     * @param array<mixed>|WordlistUpdateParams $params
     *
     * @return BaseResponse<WordlistUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|WordlistUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<list<WordlistListResponseItem>>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): BaseResponse;

    /**
     * @api
     *
     * @param string $id ID of the wordlist to check embedding status for
     *
     * @return BaseResponse<WordlistGetEmbeddingStatusResponse>
     *
     * @throws APIException
     */
    public function getEmbeddingStatus(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
