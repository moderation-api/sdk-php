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
        $obj = new self;

        null !== $afterDate && $obj['afterDate'] = $afterDate;
        null !== $authorID && $obj['authorID'] = $authorID;
        null !== $beforeDate && $obj['beforeDate'] = $beforeDate;
        null !== $conversationIDs && $obj['conversationIDs'] = $conversationIDs;
        null !== $filteredActionIDs && $obj['filteredActionIDs'] = $filteredActionIDs;
        null !== $filteredChannelIDs && $obj['filteredChannelIDs'] = $filteredChannelIDs;
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
        $obj['conversationIDs'] = $conversationIDs;

        return $obj;
    }

    /**
     * @param list<string> $filteredActionIDs
     */
    public function withFilteredActionIDs(array $filteredActionIDs): self
    {
        $obj = clone $this;
        $obj['filteredActionIDs'] = $filteredActionIDs;

        return $obj;
    }

    /**
     * @param list<string> $filteredChannelIDs
     */
    public function withFilteredChannelIDs(array $filteredChannelIDs): self
    {
        $obj = clone $this;
        $obj['filteredChannelIDs'] = $filteredChannelIDs;

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
