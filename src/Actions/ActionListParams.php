<?php

declare(strict_types=1);

namespace ModerationAPI\Actions;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkParams;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * List all available moderation actions for the authenticated organization.
 *
 * @see ModerationAPI\Services\ActionsService::list()
 *
 * @phpstan-type ActionListParamsShape = array{queueID?: string}
 */
final class ActionListParams implements BaseModel
{
    /** @use SdkModel<ActionListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $queueID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $queueID = null): self
    {
        $obj = new self;

        null !== $queueID && $obj['queueID'] = $queueID;

        return $obj;
    }

    public function withQueueID(string $queueID): self
    {
        $obj = clone $this;
        $obj['queueID'] = $queueID;

        return $obj;
    }
}
