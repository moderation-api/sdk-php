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
 *   authorIDs?: list<string>|null,
 *   contentIDs?: list<string>|null,
 *   queueID?: string|null,
 *   value?: string|null,
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
     * @param list<string>|null $authorIDs
     * @param list<string>|null $contentIDs
     */
    public static function with(
        ?array $authorIDs = null,
        ?array $contentIDs = null,
        ?string $queueID = null,
        ?string $value = null,
    ): self {
        $self = new self;

        null !== $authorIDs && $self['authorIDs'] = $authorIDs;
        null !== $contentIDs && $self['contentIDs'] = $contentIDs;
        null !== $queueID && $self['queueID'] = $queueID;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    /**
     * IDs of the authors to apply the action to.
     *
     * @param list<string> $authorIDs
     */
    public function withAuthorIDs(array $authorIDs): self
    {
        $self = clone $this;
        $self['authorIDs'] = $authorIDs;

        return $self;
    }

    /**
     * The IDs of the content items to perform the action on.
     *
     * @param list<string> $contentIDs
     */
    public function withContentIDs(array $contentIDs): self
    {
        $self = clone $this;
        $self['contentIDs'] = $contentIDs;

        return $self;
    }

    /**
     * The ID of the queue the action was performed from if any.
     */
    public function withQueueID(string $queueID): self
    {
        $self = clone $this;
        $self['queueID'] = $queueID;

        return $self;
    }

    /**
     * The value of the action. Useful to set a reason for the action etc.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
