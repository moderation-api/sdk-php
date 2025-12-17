<?php

declare(strict_types=1);

namespace ModerationAPI\Account;

use ModerationAPI\Account\AccountListResponse\CurrentProject;
use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CurrentProjectShape from \ModerationAPI\Account\AccountListResponse\CurrentProject
 *
 * @phpstan-type AccountListResponseShape = array{
 *   id: string,
 *   paidPlanName: string,
 *   remainingQuota: float,
 *   textAPIQuota: float,
 *   currentProject?: null|CurrentProject|CurrentProjectShape,
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
     * @param CurrentProjectShape $currentProject
     */
    public static function with(
        string $id,
        string $paidPlanName,
        float $remainingQuota,
        float $textAPIQuota,
        CurrentProject|array|null $currentProject = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['paidPlanName'] = $paidPlanName;
        $self['remainingQuota'] = $remainingQuota;
        $self['textAPIQuota'] = $textAPIQuota;

        null !== $currentProject && $self['currentProject'] = $currentProject;

        return $self;
    }

    /**
     * ID of the account.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Name of the paid plan.
     */
    public function withPaidPlanName(string $paidPlanName): self
    {
        $self = clone $this;
        $self['paidPlanName'] = $paidPlanName;

        return $self;
    }

    /**
     * Remaining quota.
     */
    public function withRemainingQuota(float $remainingQuota): self
    {
        $self = clone $this;
        $self['remainingQuota'] = $remainingQuota;

        return $self;
    }

    /**
     * Text API quota.
     */
    public function withTextAPIQuota(float $textAPIQuota): self
    {
        $self = clone $this;
        $self['textAPIQuota'] = $textAPIQuota;

        return $self;
    }

    /**
     * @param CurrentProjectShape $currentProject
     */
    public function withCurrentProject(
        CurrentProject|array $currentProject
    ): self {
        $self = clone $this;
        $self['currentProject'] = $currentProject;

        return $self;
    }
}
