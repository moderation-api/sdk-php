<?php

declare(strict_types=1);

namespace ModerationAPI\Actions\Execute;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkParams;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Execute an action on a set of content items in a queue.
 *
 * @deprecated
 * @see ModerationAPI\Services\Actions\ExecuteService::executeByID()
 *
 * @phpstan-type ExecuteExecuteByIDParamsShape = array{
 *   authorIDs?: list<string>,
 *   contentIDs?: list<string>,
 *   queueID?: string,
 *   value?: string,
 * }
 */
final class ExecuteExecuteByIDParams implements BaseModel
{
    /** @use SdkModel<ExecuteExecuteByIDParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * IDs of the authors to apply the action to.
     *
     * @var list<string>|null $authorIDs
     */
    #[Optional('authorIds', list: 'string')]
    public ?array $authorIDs;

    /**
     * The IDs of the content items to perform the action on.
     *
     * @var list<string>|null $contentIDs
     */
    #[Optional('contentIds', list: 'string')]
    public ?array $contentIDs;

    /**
     * The ID of the queue the action was performed from if any.
     */
    #[Optional('queueId')]
    public ?string $queueID;

    /**
     * The value of the action. Useful to set a reason for the action etc.
     */
    #[Optional]
    public ?string $value;

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
        ?array $authorIDs = null,
        ?array $contentIDs = null,
        ?string $queueID = null,
        ?string $value = null,
    ): self {
        $obj = new self;

        null !== $authorIDs && $obj['authorIDs'] = $authorIDs;
        null !== $contentIDs && $obj['contentIDs'] = $contentIDs;
        null !== $queueID && $obj['queueID'] = $queueID;
        null !== $value && $obj['value'] = $value;

        return $obj;
    }

    /**
     * IDs of the authors to apply the action to.
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
     * The IDs of the content items to perform the action on.
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
     * The ID of the queue the action was performed from if any.
     */
    public function withQueueID(string $queueID): self
    {
        $obj = clone $this;
        $obj['queueID'] = $queueID;

        return $obj;
    }

    /**
     * The value of the action. Useful to set a reason for the action etc.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj['value'] = $value;

        return $obj;
    }
}
