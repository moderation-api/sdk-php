<?php

declare(strict_types=1);

namespace ModerationAPI\Actions\Execute;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkParams;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Execute a moderation action on one or more content items.
 *
 * @see ModerationAPI\Services\Actions\ExecuteService::execute()
 *
 * @phpstan-type ExecuteExecuteParamsShape = array{
 *   actionKey: string,
 *   authorIds?: list<string>,
 *   contentIds?: list<string>,
 *   duration?: float,
 *   queueId?: string,
 *   value?: string,
 * }
 */
final class ExecuteExecuteParams implements BaseModel
{
    /** @use SdkModel<ExecuteExecuteParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID or key of the action to execute.
     */
    #[Api]
    public string $actionKey;

    /**
     * IDs of the authors to apply the action to. Provide this or contentIds.
     *
     * @var list<string>|null $authorIds
     */
    #[Api(list: 'string', optional: true)]
    public ?array $authorIds;

    /**
     * IDs of the content items to apply the action to. Provide this or authorIds.
     *
     * @var list<string>|null $contentIds
     */
    #[Api(list: 'string', optional: true)]
    public ?array $contentIds;

    /**
     * Optional duration in milliseconds for actions with timeouts.
     */
    #[Api(optional: true)]
    public ?float $duration;

    /**
     * Optional queue ID if the action is queue-specific.
     */
    #[Api(optional: true)]
    public ?string $queueId;

    /**
     * Optional value to provide with the action.
     */
    #[Api(optional: true)]
    public ?string $value;

    /**
     * `new ExecuteExecuteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExecuteExecuteParams::with(actionKey: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExecuteExecuteParams)->withActionKey(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $authorIds
     * @param list<string> $contentIds
     */
    public static function with(
        string $actionKey,
        ?array $authorIds = null,
        ?array $contentIds = null,
        ?float $duration = null,
        ?string $queueId = null,
        ?string $value = null,
    ): self {
        $obj = new self;

        $obj['actionKey'] = $actionKey;

        null !== $authorIds && $obj['authorIds'] = $authorIds;
        null !== $contentIds && $obj['contentIds'] = $contentIds;
        null !== $duration && $obj['duration'] = $duration;
        null !== $queueId && $obj['queueId'] = $queueId;
        null !== $value && $obj['value'] = $value;

        return $obj;
    }

    /**
     * ID or key of the action to execute.
     */
    public function withActionKey(string $actionKey): self
    {
        $obj = clone $this;
        $obj['actionKey'] = $actionKey;

        return $obj;
    }

    /**
     * IDs of the authors to apply the action to. Provide this or contentIds.
     *
     * @param list<string> $authorIDs
     */
    public function withAuthorIDs(array $authorIDs): self
    {
        $obj = clone $this;
        $obj['authorIds'] = $authorIDs;

        return $obj;
    }

    /**
     * IDs of the content items to apply the action to. Provide this or authorIds.
     *
     * @param list<string> $contentIDs
     */
    public function withContentIDs(array $contentIDs): self
    {
        $obj = clone $this;
        $obj['contentIds'] = $contentIDs;

        return $obj;
    }

    /**
     * Optional duration in milliseconds for actions with timeouts.
     */
    public function withDuration(float $duration): self
    {
        $obj = clone $this;
        $obj['duration'] = $duration;

        return $obj;
    }

    /**
     * Optional queue ID if the action is queue-specific.
     */
    public function withQueueID(string $queueID): self
    {
        $obj = clone $this;
        $obj['queueId'] = $queueID;

        return $obj;
    }

    /**
     * Optional value to provide with the action.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj['value'] = $value;

        return $obj;
    }
}
