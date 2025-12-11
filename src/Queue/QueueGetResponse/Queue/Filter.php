<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetResponse\Queue;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Core\Conversion\ListOf;
use ModerationAPI\Queue\QueueGetResponse\Queue\Filter\FilterLabel;
use ModerationAPI\Queue\QueueGetResponse\Queue\Filter\FilterLabel\Type;
use ModerationAPI\Queue\QueueGetResponse\Queue\Filter\RecommendationAction;

/**
 * @phpstan-type FilterShape = array{
 *   afterDate?: string|null,
 *   authorID?: string|null,
 *   beforeDate?: string|null,
 *   conversationIDs?: list<string|null>|null,
 *   filteredActionIDs?: list<string>|null,
 *   filteredChannelIDs?: list<string>|null,
 *   filterLabels?: list<FilterLabel>|null,
 *   labels?: list<string>|null,
 *   recommendationActions?: list<value-of<RecommendationAction>>|null,
 *   showChecked?: bool|null,
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

    #[Optional]
    public ?string $beforeDate;

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

    /** @var list<string>|null $labels */
    #[Optional(list: 'string')]
    public ?array $labels;

    /** @var list<value-of<RecommendationAction>>|null $recommendationActions */
    #[Optional(list: RecommendationAction::class)]
    public ?array $recommendationActions;

    #[Optional]
    public ?bool $showChecked;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string|null> $conversationIDs
     * @param list<string> $filteredActionIDs
     * @param list<string> $filteredChannelIDs
     * @param list<FilterLabel|array{
     *   label: string,
     *   type: value-of<Type>,
     *   maxThreshold?: float|null,
     *   minThreshold?: float|null,
     * }> $filterLabels
     * @param list<string> $labels
     * @param list<RecommendationAction|value-of<RecommendationAction>> $recommendationActions
     */
    public static function with(
        ?string $afterDate = null,
        ?string $authorID = null,
        ?string $beforeDate = null,
        ?array $conversationIDs = null,
        ?array $filteredActionIDs = null,
        ?array $filteredChannelIDs = null,
        ?array $filterLabels = null,
        ?array $labels = null,
        ?array $recommendationActions = null,
        ?bool $showChecked = null,
    ): self {
        $self = new self;

        null !== $afterDate && $self['afterDate'] = $afterDate;
        null !== $authorID && $self['authorID'] = $authorID;
        null !== $beforeDate && $self['beforeDate'] = $beforeDate;
        null !== $conversationIDs && $self['conversationIDs'] = $conversationIDs;
        null !== $filteredActionIDs && $self['filteredActionIDs'] = $filteredActionIDs;
        null !== $filteredChannelIDs && $self['filteredChannelIDs'] = $filteredChannelIDs;
        null !== $filterLabels && $self['filterLabels'] = $filterLabels;
        null !== $labels && $self['labels'] = $labels;
        null !== $recommendationActions && $self['recommendationActions'] = $recommendationActions;
        null !== $showChecked && $self['showChecked'] = $showChecked;

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

    public function withBeforeDate(string $beforeDate): self
    {
        $self = clone $this;
        $self['beforeDate'] = $beforeDate;

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
     * @param list<FilterLabel|array{
     *   label: string,
     *   type: value-of<Type>,
     *   maxThreshold?: float|null,
     *   minThreshold?: float|null,
     * }> $filterLabels
     */
    public function withFilterLabels(array $filterLabels): self
    {
        $self = clone $this;
        $self['filterLabels'] = $filterLabels;

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
     * @param list<RecommendationAction|value-of<RecommendationAction>> $recommendationActions
     */
    public function withRecommendationActions(
        array $recommendationActions
    ): self {
        $self = clone $this;
        $self['recommendationActions'] = $recommendationActions;

        return $self;
    }

    public function withShowChecked(bool $showChecked): self
    {
        $self = clone $this;
        $self['showChecked'] = $showChecked;

        return $self;
    }
}
