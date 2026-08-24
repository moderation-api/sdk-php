<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetResponse\Queue;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Core\Conversion\ListOf;
use ModerationAPI\Queue\QueueGetResponse\Queue\Filter\CasebookHandled;
use ModerationAPI\Queue\QueueGetResponse\Queue\Filter\CheckStatus;
use ModerationAPI\Queue\QueueGetResponse\Queue\Filter\ContentType;
use ModerationAPI\Queue\QueueGetResponse\Queue\Filter\FilterLabel;
use ModerationAPI\Queue\QueueGetResponse\Queue\Filter\IsFlagged;
use ModerationAPI\Queue\QueueGetResponse\Queue\Filter\MediaType;
use ModerationAPI\Queue\QueueGetResponse\Queue\Filter\RecommendationAction;
use ModerationAPI\Queue\QueueGetResponse\Queue\Filter\WithinUnit;

/**
 * @phpstan-import-type FilterLabelShape from \ModerationAPI\Queue\QueueGetResponse\Queue\Filter\FilterLabel
 *
 * @phpstan-type FilterShape = array{
 *   afterDate?: string|null,
 *   authorID?: string|null,
 *   authorTrustLevels?: list<int>|null,
 *   beforeDate?: string|null,
 *   casebookHandled?: null|CasebookHandled|value-of<CasebookHandled>,
 *   checkStatus?: null|CheckStatus|value-of<CheckStatus>,
 *   clearDateWindow?: bool|null,
 *   contentID?: string|null,
 *   contentTypes?: list<ContentType|value-of<ContentType>>|null,
 *   conversationIDs?: list<string|null>|null,
 *   filteredActionIDs?: list<string>|null,
 *   filteredChannelIDs?: list<string>|null,
 *   filterLabels?: list<FilterLabel|FilterLabelShape>|null,
 *   isFlagged?: null|IsFlagged|value-of<IsFlagged>,
 *   labels?: list<string>|null,
 *   languages?: list<string>|null,
 *   maxSeverity?: int|null,
 *   mediaTypes?: list<MediaType|value-of<MediaType>>|null,
 *   minSeverity?: int|null,
 *   recommendationActions?: list<RecommendationAction|value-of<RecommendationAction>>|null,
 *   search?: list<string>|null,
 *   within?: float|null,
 *   withinUnit?: null|WithinUnit|value-of<WithinUnit>,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Optional]
    public ?string $afterDate;

    #[Optional]
    public ?string $authorID;

    /** @var list<int>|null $authorTrustLevels */
    #[Optional(list: 'int')]
    public ?array $authorTrustLevels;

    #[Optional]
    public ?string $beforeDate;

    /** @var value-of<CasebookHandled>|null $casebookHandled */
    #[Optional(enum: CasebookHandled::class)]
    public ?string $casebookHandled;

    /** @var value-of<CheckStatus>|null $checkStatus */
    #[Optional(enum: CheckStatus::class, nullable: true)]
    public ?string $checkStatus;

    #[Optional]
    public ?bool $clearDateWindow;

    #[Optional]
    public ?string $contentID;

    /** @var list<value-of<ContentType>>|null $contentTypes */
    #[Optional(list: ContentType::class)]
    public ?array $contentTypes;

    /** @var list<string|null>|null $conversationIDs */
    #[Optional('conversationIds', type: new ListOf('string', nullable: true))]
    public ?array $conversationIDs;

    /** @var list<string>|null $filteredActionIDs */
    #[Optional('filteredActionIds', list: 'string')]
    public ?array $filteredActionIDs;

    /** @var list<string>|null $filteredChannelIDs */
    #[Optional('filteredChannelIds', list: 'string')]
    public ?array $filteredChannelIDs;

    /** @var list<FilterLabel>|null $filterLabels */
    #[Optional(list: FilterLabel::class)]
    public ?array $filterLabels;

    /** @var value-of<IsFlagged>|null $isFlagged */
    #[Optional(enum: IsFlagged::class)]
    public ?string $isFlagged;

    /** @var list<string>|null $labels */
    #[Optional(list: 'string')]
    public ?array $labels;

    /** @var list<string>|null $languages */
    #[Optional(list: 'string')]
    public ?array $languages;

    #[Optional]
    public ?int $maxSeverity;

    /** @var list<value-of<MediaType>>|null $mediaTypes */
    #[Optional(list: MediaType::class)]
    public ?array $mediaTypes;

    #[Optional]
    public ?int $minSeverity;

    /** @var list<value-of<RecommendationAction>>|null $recommendationActions */
    #[Optional(list: RecommendationAction::class)]
    public ?array $recommendationActions;

    /** @var list<string>|null $search */
    #[Optional(list: 'string')]
    public ?array $search;

    #[Optional]
    public ?float $within;

    /** @var value-of<WithinUnit>|null $withinUnit */
    #[Optional(enum: WithinUnit::class)]
    public ?string $withinUnit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<int>|null $authorTrustLevels
     * @param CasebookHandled|value-of<CasebookHandled>|null $casebookHandled
     * @param CheckStatus|value-of<CheckStatus>|null $checkStatus
     * @param list<ContentType|value-of<ContentType>>|null $contentTypes
     * @param list<string|null>|null $conversationIDs
     * @param list<string>|null $filteredActionIDs
     * @param list<string>|null $filteredChannelIDs
     * @param list<FilterLabel|FilterLabelShape>|null $filterLabels
     * @param IsFlagged|value-of<IsFlagged>|null $isFlagged
     * @param list<string>|null $labels
     * @param list<string>|null $languages
     * @param list<MediaType|value-of<MediaType>>|null $mediaTypes
     * @param list<RecommendationAction|value-of<RecommendationAction>>|null $recommendationActions
     * @param list<string>|null $search
     * @param WithinUnit|value-of<WithinUnit>|null $withinUnit
     */
    public static function with(
        ?string $afterDate = null,
        ?string $authorID = null,
        ?array $authorTrustLevels = null,
        ?string $beforeDate = null,
        CasebookHandled|string|null $casebookHandled = null,
        CheckStatus|string|null $checkStatus = null,
        ?bool $clearDateWindow = null,
        ?string $contentID = null,
        ?array $contentTypes = null,
        ?array $conversationIDs = null,
        ?array $filteredActionIDs = null,
        ?array $filteredChannelIDs = null,
        ?array $filterLabels = null,
        IsFlagged|string|null $isFlagged = null,
        ?array $labels = null,
        ?array $languages = null,
        ?int $maxSeverity = null,
        ?array $mediaTypes = null,
        ?int $minSeverity = null,
        ?array $recommendationActions = null,
        ?array $search = null,
        ?float $within = null,
        WithinUnit|string|null $withinUnit = null,
    ): self {
        $self = new self;

        null !== $afterDate && $self['afterDate'] = $afterDate;
        null !== $authorID && $self['authorID'] = $authorID;
        null !== $authorTrustLevels && $self['authorTrustLevels'] = $authorTrustLevels;
        null !== $beforeDate && $self['beforeDate'] = $beforeDate;
        null !== $casebookHandled && $self['casebookHandled'] = $casebookHandled;
        null !== $checkStatus && $self['checkStatus'] = $checkStatus;
        null !== $clearDateWindow && $self['clearDateWindow'] = $clearDateWindow;
        null !== $contentID && $self['contentID'] = $contentID;
        null !== $contentTypes && $self['contentTypes'] = $contentTypes;
        null !== $conversationIDs && $self['conversationIDs'] = $conversationIDs;
        null !== $filteredActionIDs && $self['filteredActionIDs'] = $filteredActionIDs;
        null !== $filteredChannelIDs && $self['filteredChannelIDs'] = $filteredChannelIDs;
        null !== $filterLabels && $self['filterLabels'] = $filterLabels;
        null !== $isFlagged && $self['isFlagged'] = $isFlagged;
        null !== $labels && $self['labels'] = $labels;
        null !== $languages && $self['languages'] = $languages;
        null !== $maxSeverity && $self['maxSeverity'] = $maxSeverity;
        null !== $mediaTypes && $self['mediaTypes'] = $mediaTypes;
        null !== $minSeverity && $self['minSeverity'] = $minSeverity;
        null !== $recommendationActions && $self['recommendationActions'] = $recommendationActions;
        null !== $search && $self['search'] = $search;
        null !== $within && $self['within'] = $within;
        null !== $withinUnit && $self['withinUnit'] = $withinUnit;

        return $self;
    }

    public function withAfterDate(string $afterDate): self
    {
        $self = clone $this;
        $self['afterDate'] = $afterDate;

        return $self;
    }

    public function withAuthorID(string $authorID): self
    {
        $self = clone $this;
        $self['authorID'] = $authorID;

        return $self;
    }

    /**
     * @param list<int> $authorTrustLevels
     */
    public function withAuthorTrustLevels(array $authorTrustLevels): self
    {
        $self = clone $this;
        $self['authorTrustLevels'] = $authorTrustLevels;

        return $self;
    }

    public function withBeforeDate(string $beforeDate): self
    {
        $self = clone $this;
        $self['beforeDate'] = $beforeDate;

        return $self;
    }

    /**
     * @param CasebookHandled|value-of<CasebookHandled> $casebookHandled
     */
    public function withCasebookHandled(
        CasebookHandled|string $casebookHandled
    ): self {
        $self = clone $this;
        $self['casebookHandled'] = $casebookHandled;

        return $self;
    }

    /**
     * @param CheckStatus|value-of<CheckStatus>|null $checkStatus
     */
    public function withCheckStatus(CheckStatus|string|null $checkStatus): self
    {
        $self = clone $this;
        $self['checkStatus'] = $checkStatus;

        return $self;
    }

    public function withClearDateWindow(bool $clearDateWindow): self
    {
        $self = clone $this;
        $self['clearDateWindow'] = $clearDateWindow;

        return $self;
    }

    public function withContentID(string $contentID): self
    {
        $self = clone $this;
        $self['contentID'] = $contentID;

        return $self;
    }

    /**
     * @param list<ContentType|value-of<ContentType>> $contentTypes
     */
    public function withContentTypes(array $contentTypes): self
    {
        $self = clone $this;
        $self['contentTypes'] = $contentTypes;

        return $self;
    }

    /**
     * @param list<string|null> $conversationIDs
     */
    public function withConversationIDs(array $conversationIDs): self
    {
        $self = clone $this;
        $self['conversationIDs'] = $conversationIDs;

        return $self;
    }

    /**
     * @param list<string> $filteredActionIDs
     */
    public function withFilteredActionIDs(array $filteredActionIDs): self
    {
        $self = clone $this;
        $self['filteredActionIDs'] = $filteredActionIDs;

        return $self;
    }

    /**
     * @param list<string> $filteredChannelIDs
     */
    public function withFilteredChannelIDs(array $filteredChannelIDs): self
    {
        $self = clone $this;
        $self['filteredChannelIDs'] = $filteredChannelIDs;

        return $self;
    }

    /**
     * @param list<FilterLabel|FilterLabelShape> $filterLabels
     */
    public function withFilterLabels(array $filterLabels): self
    {
        $self = clone $this;
        $self['filterLabels'] = $filterLabels;

        return $self;
    }

    /**
     * @param IsFlagged|value-of<IsFlagged> $isFlagged
     */
    public function withIsFlagged(IsFlagged|string $isFlagged): self
    {
        $self = clone $this;
        $self['isFlagged'] = $isFlagged;

        return $self;
    }

    /**
     * @param list<string> $labels
     */
    public function withLabels(array $labels): self
    {
        $self = clone $this;
        $self['labels'] = $labels;

        return $self;
    }

    /**
     * @param list<string> $languages
     */
    public function withLanguages(array $languages): self
    {
        $self = clone $this;
        $self['languages'] = $languages;

        return $self;
    }

    public function withMaxSeverity(int $maxSeverity): self
    {
        $self = clone $this;
        $self['maxSeverity'] = $maxSeverity;

        return $self;
    }

    /**
     * @param list<MediaType|value-of<MediaType>> $mediaTypes
     */
    public function withMediaTypes(array $mediaTypes): self
    {
        $self = clone $this;
        $self['mediaTypes'] = $mediaTypes;

        return $self;
    }

    public function withMinSeverity(int $minSeverity): self
    {
        $self = clone $this;
        $self['minSeverity'] = $minSeverity;

        return $self;
    }

    /**
     * @param list<RecommendationAction|value-of<RecommendationAction>> $recommendationActions
     */
    public function withRecommendationActions(
        array $recommendationActions
    ): self {
        $self = clone $this;
        $self['recommendationActions'] = $recommendationActions;

        return $self;
    }

    /**
     * @param list<string> $search
     */
    public function withSearch(array $search): self
    {
        $self = clone $this;
        $self['search'] = $search;

        return $self;
    }

    public function withWithin(float $within): self
    {
        $self = clone $this;
        $self['within'] = $within;

        return $self;
    }

    /**
     * @param WithinUnit|value-of<WithinUnit> $withinUnit
     */
    public function withWithinUnit(WithinUnit|string $withinUnit): self
    {
        $self = clone $this;
        $self['withinUnit'] = $withinUnit;

        return $self;
    }
}
