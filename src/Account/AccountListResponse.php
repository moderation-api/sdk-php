<?php

declare(strict_types=1);

namespace ModerationAPI\Account;

use ModerationAPI\Account\AccountListResponse\CurrentProject;
use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type AccountListResponseShape = array{
 *   id: string,
 *   paid_plan_name: string,
 *   remaining_quota: float,
 *   text_api_quota: float,
 *   current_project?: CurrentProject|null,
 * }
 */
final class AccountListResponse implements BaseModel
{
    /** @use SdkModel<AccountListResponseShape> */
    use SdkModel;

    /**
     * ID of the account.
     */
    #[Required]
    public string $id;

    /**
     * Name of the paid plan.
     */
    #[Required]
    public string $paid_plan_name;

    /**
     * Remaining quota.
     */
    #[Required]
    public float $remaining_quota;

    /**
     * Text API quota.
     */
    #[Required]
    public float $text_api_quota;

    #[Optional]
    public ?CurrentProject $current_project;

    /**
     * `new AccountListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AccountListResponse::with(
     *   id: ..., paid_plan_name: ..., remaining_quota: ..., text_api_quota: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AccountListResponse)
     *   ->withID(...)
     *   ->withPaidPlanName(...)
     *   ->withRemainingQuota(...)
     *   ->withTextAPIQuota(...)
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
     * @param CurrentProject|array{id: string, name: string} $current_project
     */
    public static function with(
        string $id,
        string $paid_plan_name,
        float $remaining_quota,
        float $text_api_quota,
        CurrentProject|array|null $current_project = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['paid_plan_name'] = $paid_plan_name;
        $obj['remaining_quota'] = $remaining_quota;
        $obj['text_api_quota'] = $text_api_quota;

        null !== $current_project && $obj['current_project'] = $current_project;

        return $obj;
    }

    /**
     * ID of the account.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Name of the paid plan.
     */
    public function withPaidPlanName(string $paidPlanName): self
    {
        $obj = clone $this;
        $obj['paid_plan_name'] = $paidPlanName;

        return $obj;
    }

    /**
     * Remaining quota.
     */
    public function withRemainingQuota(float $remainingQuota): self
    {
        $obj = clone $this;
        $obj['remaining_quota'] = $remainingQuota;

        return $obj;
    }

    /**
     * Text API quota.
     */
    public function withTextAPIQuota(float $textAPIQuota): self
    {
        $obj = clone $this;
        $obj['text_api_quota'] = $textAPIQuota;

        return $obj;
    }

    /**
     * @param CurrentProject|array{id: string, name: string} $currentProject
     */
    public function withCurrentProject(
        CurrentProject|array $currentProject
    ): self {
        $obj = clone $this;
        $obj['current_project'] = $currentProject;

        return $obj;
    }
}
