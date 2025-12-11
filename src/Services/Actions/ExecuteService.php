<?php

declare(strict_types=1);

namespace ModerationAPI\Services\Actions;

use ModerationAPI\Actions\Execute\ExecuteExecuteByIDResponse;
use ModerationAPI\Actions\Execute\ExecuteExecuteResponse;
use ModerationAPI\Client;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\Core\Util;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\Actions\ExecuteContract;

final class ExecuteService implements ExecuteContract
{
    /**
     * @api
     */
    public ExecuteRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ExecuteRawService($client);
    }

    /**
     * @api
     *
     * Execute a moderation action on one or more content items.
     *
     * @param string $actionKey ID or key of the action to execute
     * @param list<string> $authorIDs IDs of the authors to apply the action to. Provide this or contentIds.
     * @param list<string> $contentIDs IDs of the content items to apply the action to. Provide this or authorIds.
     * @param float $duration Optional duration in milliseconds for actions with timeouts
     * @param string $queueID Optional queue ID if the action is queue-specific
     * @param string $value Optional value to provide with the action
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
        ?RequestOptions $requestOptions = null,
    ): ExecuteExecuteResponse {
        $params = Util::removeNulls(
            [
                'actionKey' => $actionKey,
                'authorIDs' => $authorIDs,
                'contentIDs' => $contentIDs,
                'duration' => $duration,
                'queueID' => $queueID,
                'value' => $value,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->execute(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Execute an action on a set of content items in a queue.
     *
     * @param string $actionID the ID or key of the action to execute
     * @param list<string> $authorIDs IDs of the authors to apply the action to
     * @param list<string> $contentIDs the IDs of the content items to perform the action on
     * @param string $queueID the ID of the queue the action was performed from if any
     * @param string $value The value of the action. Useful to set a reason for the action etc.
     *
     * @throws APIException
     */
    public function executeByID(
        string $actionID,
        ?array $authorIDs = null,
        ?array $contentIDs = null,
        ?string $queueID = null,
        ?string $value = null,
        ?RequestOptions $requestOptions = null,
    ): ExecuteExecuteByIDResponse {
        $params = Util::removeNulls(
            [
                'authorIDs' => $authorIDs,
                'contentIDs' => $contentIDs,
                'queueID' => $queueID,
                'value' => $value,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->executeByID($actionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
