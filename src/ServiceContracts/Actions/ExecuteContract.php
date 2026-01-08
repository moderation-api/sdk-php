<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts\Actions;

use ModerationAPI\Actions\Execute\ExecuteExecuteByIDResponse;
use ModerationAPI\Actions\Execute\ExecuteExecuteResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
interface ExecuteContract
{
    /**
     * @api
     *
     * @param string $actionKey ID or key of the action to execute
     * @param list<string> $authorIDs IDs of the authors to apply the action to. Provide this or contentIds.
     * @param list<string> $contentIDs IDs of the content items to apply the action to. Provide this or authorIds.
     * @param float $duration Optional duration in milliseconds for actions with timeouts
     * @param string $queueID Optional queue ID if the action is queue-specific
     * @param string $value Optional value to provide with the action
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function execute(
        string $actionKey,
        ?array $authorIDs = null,
        ?array $contentIDs = null,
        ?float $duration = null,
        ?string $queueID = null,
        ?string $value = null,
        RequestOptions|array|null $requestOptions = null,
    ): ExecuteExecuteResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param string $actionID the ID or key of the action to execute
     * @param list<string> $authorIDs IDs of the authors to apply the action to
     * @param list<string> $contentIDs the IDs of the content items to perform the action on
     * @param string $queueID the ID of the queue the action was performed from if any
     * @param string $value The value of the action. Useful to set a reason for the action etc.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function executeByID(
        string $actionID,
        ?array $authorIDs = null,
        ?array $contentIDs = null,
        ?string $queueID = null,
        ?string $value = null,
        RequestOptions|array|null $requestOptions = null,
    ): ExecuteExecuteByIDResponse;
}
