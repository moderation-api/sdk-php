<?php

declare(strict_types=1);

namespace ModerationAPI\Actions\Execute;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
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
 *   authorIDs?: list<string>,
 *   contentIDs?: list<string>,
 *   duration?: float,
 *   queueID?: string,
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
    #[Required]
    public string $actionKey;

    /**
     * IDs of the authors to apply the action to. Provide this or contentIds.
     *
     * @var list<string>|null $authorIDs
     */
    #[Optional('authorIds', list: 'string')]
    public ?array $authorIDs;

    /**
     * IDs of the content items to apply the action to. Provide this or authorIds.
     *
     * @var list<string>|null $contentIDs
     */
    #[Optional('contentIds', list: 'string')]
    public ?array $contentIDs;

    /**
     * Optional duration in milliseconds for actions with timeouts.
     */
    #[Optional]
    public ?float $duration;

    /**
     * Optional queue ID if the action is queue-specific.
     */
    #[Optional('queueId')]
    public ?string $queueID;

    /**
     * Optional value to provide with the action.
     */
    #[Optional]
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
     * @param list<string> $authorIDs
     * @param list<string> $contentIDs
     */
    public static function with(
        string $actionKey,
        ?array $authorIDs = null,
        ?array $contentIDs = null,
        ?float $duration = null,
        ?string $queueID = null,
        ?string $value = null,
    ): self {
        $obj = new self;

        $obj['actionKey'] = $actionKey;

        null !== $authorIDs && $obj['authorIDs'] = $authorIDs;
        null !== $contentIDs && $obj['contentIDs'] = $contentIDs;
        null !== $duration && $obj['duration'] = $duration;
        null !== $queueID && $obj['queueID'] = $queueID;
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
        $obj['authorIDs'] = $authorIDs;

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
        $obj['contentIDs'] = $contentIDs;

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
        $obj['queueID'] = $queueID;

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
