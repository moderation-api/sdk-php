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
 *   paidPlanName: string,
 *   remainingQuota: float,
 *   textAPIQuota: float,
 *   currentProject?: CurrentProject|null,
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
    #[Required('paid_plan_name')]
    public string $paidPlanName;

    /**
     * Remaining quota.
     */
    #[Required('remaining_quota')]
    public float $remainingQuota;

    /**
     * Text API quota.
     */
    #[Required('text_api_quota')]
    public float $textAPIQuota;

    #[Optional('current_project')]
    public ?CurrentProject $currentProject;

    /**
     * `new AccountListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AccountListResponse::with(
     *   id: ..., paidPlanName: ..., remainingQuota: ..., textAPIQuota: ...
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
     * @param CurrentProject|array{id: string, name: string} $currentProject
     */
    public static function with(
        string $id,
        string $paidPlanName,
        float $remainingQuota,
        float $textAPIQuota,
        CurrentProject|array|null $currentProject = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['paidPlanName'] = $paidPlanName;
        $obj['remainingQuota'] = $remainingQuota;
        $obj['textAPIQuota'] = $textAPIQuota;

        null !== $currentProject && $obj['currentProject'] = $currentProject;

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
        $obj['paidPlanName'] = $paidPlanName;

        return $obj;
    }

    /**
     * Remaining quota.
     */
    public function withRemainingQuota(float $remainingQuota): self
    {
        $obj = clone $this;
        $obj['remainingQuota'] = $remainingQuota;

        return $obj;
    }

    /**
     * Text API quota.
     */
    public function withTextAPIQuota(float $textAPIQuota): self
    {
        $obj = clone $this;
        $obj['textAPIQuota'] = $textAPIQuota;

        return $obj;
    }

    /**
     * @param CurrentProject|array{id: string, name: string} $currentProject
     */
    public function withCurrentProject(
        CurrentProject|array $currentProject
    ): self {
        $obj = clone $this;
        $obj['currentProject'] = $currentProject;

        return $obj;
    }
}
