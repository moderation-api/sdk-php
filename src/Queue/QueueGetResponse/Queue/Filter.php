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
 *   conversationIds?: list<string|null>|null,
 *   filteredActionIds?: list<string>|null,
 *   filteredChannelIds?: list<string>|null,
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

    /** @var list<string|null>|null $conversationIds */
    #[Optional(type: new ListOf('string', nullable: true))]
    public ?array $conversationIds;

    /** @var list<string>|null $filteredActionIds */
    #[Optional(list: 'string')]
    public ?array $filteredActionIds;

    /** @var list<string>|null $filteredChannelIds */
    #[Optional(list: 'string')]
    public ?array $filteredChannelIds;

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
     * @param list<string|null> $conversationIds
     * @param list<string> $filteredActionIds
     * @param list<string> $filteredChannelIds
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
        ?array $conversationIds = null,
        ?array $filteredActionIds = null,
        ?array $filteredChannelIds = null,
        ?array $filterLabels = null,
        ?array $labels = null,
        ?array $recommendationActions = null,
        ?bool $showChecked = null,
    ): self {
        $obj = new self;

        null !== $afterDate && $obj['afterDate'] = $afterDate;
        null !== $authorID && $obj['authorID'] = $authorID;
        null !== $beforeDate && $obj['beforeDate'] = $beforeDate;
        null !== $conversationIds && $obj['conversationIds'] = $conversationIds;
        null !== $filteredActionIds && $obj['filteredActionIds'] = $filteredActionIds;
        null !== $filteredChannelIds && $obj['filteredChannelIds'] = $filteredChannelIds;
        null !== $filterLabels && $obj['filterLabels'] = $filterLabels;
        null !== $labels && $obj['labels'] = $labels;
        null !== $recommendationActions && $obj['recommendationActions'] = $recommendationActions;
        null !== $showChecked && $obj['showChecked'] = $showChecked;

        return $obj;
    }

    public function withAfterDate(string $afterDate): self
    {
        $obj = clone $this;
        $obj['afterDate'] = $afterDate;

        return $obj;
    }

    public function withAuthorID(string $authorID): self
    {
        $obj = clone $this;
        $obj['authorID'] = $authorID;

        return $obj;
    }

    public function withBeforeDate(string $beforeDate): self
    {
        $obj = clone $this;
        $obj['beforeDate'] = $beforeDate;

        return $obj;
    }

    /**
     * @param list<string|null> $conversationIDs
     */
    public function withConversationIDs(array $conversationIDs): self
    {
        $obj = clone $this;
        $obj['conversationIds'] = $conversationIDs;

        return $obj;
    }

    /**
     * @param list<string> $filteredActionIDs
     */
    public function withFilteredActionIDs(array $filteredActionIDs): self
    {
        $obj = clone $this;
        $obj['filteredActionIds'] = $filteredActionIDs;

        return $obj;
    }

    /**
     * @param list<string> $filteredChannelIDs
     */
    public function withFilteredChannelIDs(array $filteredChannelIDs): self
    {
        $obj = clone $this;
        $obj['filteredChannelIds'] = $filteredChannelIDs;

        return $obj;
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
        $obj = clone $this;
        $obj['filterLabels'] = $filterLabels;

        return $obj;
    }

    /**
     * @param list<string> $labels
     */
    public function withLabels(array $labels): self
    {
        $obj = clone $this;
        $obj['labels'] = $labels;

        return $obj;
    }

    /**
     * @param list<RecommendationAction|value-of<RecommendationAction>> $recommendationActions
     */
    public function withRecommendationActions(
        array $recommendationActions
    ): self {
        $obj = clone $this;
        $obj['recommendationActions'] = $recommendationActions;

        return $obj;
    }

    public function withShowChecked(bool $showChecked): self
    {
        $obj = clone $this;
        $obj['showChecked'] = $showChecked;

        return $obj;
    }
}
