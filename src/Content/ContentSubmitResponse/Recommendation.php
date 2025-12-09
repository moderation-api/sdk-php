<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse;

use ModerationAPI\Content\ContentSubmitResponse\Recommendation\Action;
use ModerationAPI\Content\ContentSubmitResponse\Recommendation\ReasonCode;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * The recommendation for the content based on the evaluation.
 *
 * @phpstan-type RecommendationShape = array{
 *   action: value-of<Action>, reasonCodes: list<value-of<ReasonCode>>
 * }
 */
final class Recommendation implements BaseModel
{
    /** @use SdkModel<RecommendationShape> */
    use SdkModel;

    /**
     * The action to take based on the recommendation.
     *
     * @var value-of<Action> $action
     */
    #[Required(enum: Action::class)]
    public string $action;

    /**
     * The reason code for the recommendation. Can be used to display a reason to the user.
     *
     * @var list<value-of<ReasonCode>> $reasonCodes
     */
    #[Required('reason_codes', list: ReasonCode::class)]
    public array $reasonCodes;

    /**
     * `new Recommendation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Recommendation::with(action: ..., reasonCodes: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Recommendation)->withAction(...)->withReasonCodes(...)
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
     * @param Action|value-of<Action> $action
     * @param list<ReasonCode|value-of<ReasonCode>> $reasonCodes
     */
    public static function with(Action|string $action, array $reasonCodes): self
    {
        $obj = new self;

        $obj['action'] = $action;
        $obj['reasonCodes'] = $reasonCodes;

        return $obj;
    }

    /**
     * The action to take based on the recommendation.
     *
     * @param Action|value-of<Action> $action
     */
    public function withAction(Action|string $action): self
    {
        $obj = clone $this;
        $obj['action'] = $action;

        return $obj;
    }

    /**
     * The reason code for the recommendation. Can be used to display a reason to the user.
     *
     * @param list<ReasonCode|value-of<ReasonCode>> $reasonCodes
     */
    public function withReasonCodes(array $reasonCodes): self
    {
        $obj = clone $this;
        $obj['reasonCodes'] = $reasonCodes;

        return $obj;
    }
}
