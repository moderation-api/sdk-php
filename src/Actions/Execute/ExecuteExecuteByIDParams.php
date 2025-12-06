<?php

declare(strict_types=1);

namespace ModerationAPI\Actions\Execute;

use ModerationAPI\Core\Attributes\Api;
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
 *   authorIds?: list<string>,
 *   contentIds?: list<string>,
 *   queueId?: string,
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
     * @var list<string>|null $authorIds
     */
    #[Api(list: 'string', optional: true)]
    public ?array $authorIds;

    /**
     * The IDs of the content items to perform the action on.
     *
     * @var list<string>|null $contentIds
     */
    #[Api(list: 'string', optional: true)]
    public ?array $contentIds;

    /**
     * The ID of the queue the action was performed from if any.
     */
    #[Api(optional: true)]
    public ?string $queueId;

    /**
     * The value of the action. Useful to set a reason for the action etc.
     */
    #[Api(optional: true)]
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
     * @param list<string> $authorIds
     * @param list<string> $contentIds
     */
    public static function with(
        ?array $authorIds = null,
        ?array $contentIds = null,
        ?string $queueId = null,
        ?string $value = null,
    ): self {
        $obj = new self;

        null !== $authorIds && $obj['authorIds'] = $authorIds;
        null !== $contentIds && $obj['contentIds'] = $contentIds;
        null !== $queueId && $obj['queueId'] = $queueId;
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
        $obj['authorIds'] = $authorIDs;

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
        $obj['contentIds'] = $contentIDs;

        return $obj;
    }

    /**
     * The ID of the queue the action was performed from if any.
     */
    public function withQueueID(string $queueID): self
    {
        $obj = clone $this;
        $obj['queueId'] = $queueID;

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
