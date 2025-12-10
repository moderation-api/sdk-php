<?php

declare(strict_types=1);

namespace ModerationAPI\Authors\AuthorGetResponse;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Additional metadata provided by your system. We recommend including any relevant information that may assist in the moderation process.
 *
 * @phpstan-type MetadataShape = array{
 *   emailVerified?: bool|null,
 *   identityVerified?: bool|null,
 *   isPayingCustomer?: bool|null,
 *   phoneVerified?: bool|null,
 * }
 */
final class Metadata implements BaseModel
{
    /** @use SdkModel<MetadataShape> */
    use SdkModel;

    /**
     * Whether the author's email is verified.
     */
    #[Optional('email_verified', nullable: true)]
    public ?bool $emailVerified;

    /**
     * Whether the author's identity is verified.
     */
    #[Optional('identity_verified', nullable: true)]
    public ?bool $identityVerified;

    /**
     * Whether the author is a paying customer.
     */
    #[Optional('is_paying_customer', nullable: true)]
    public ?bool $isPayingCustomer;

    /**
     * Whether the author's phone number is verified.
     */
    #[Optional('phone_verified', nullable: true)]
    public ?bool $phoneVerified;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?bool $emailVerified = null,
        ?bool $identityVerified = null,
        ?bool $isPayingCustomer = null,
        ?bool $phoneVerified = null,
    ): self {
        $self = new self;

        null !== $emailVerified && $self['emailVerified'] = $emailVerified;
        null !== $identityVerified && $self['identityVerified'] = $identityVerified;
        null !== $isPayingCustomer && $self['isPayingCustomer'] = $isPayingCustomer;
        null !== $phoneVerified && $self['phoneVerified'] = $phoneVerified;

        return $self;
    }

    /**
     * Whether the author's email is verified.
     */
    public function withEmailVerified(?bool $emailVerified): self
    {
        $self = clone $this;
        $self['emailVerified'] = $emailVerified;

        return $self;
    }

    /**
     * Whether the author's identity is verified.
     */
    public function withIdentityVerified(?bool $identityVerified): self
    {
        $self = clone $this;
        $self['identityVerified'] = $identityVerified;

        return $self;
    }

    /**
     * Whether the author is a paying customer.
     */
    public function withIsPayingCustomer(?bool $isPayingCustomer): self
    {
        $self = clone $this;
        $self['isPayingCustomer'] = $isPayingCustomer;

        return $self;
    }

    /**
     * Whether the author's phone number is verified.
     */
    public function withPhoneVerified(?bool $phoneVerified): self
    {
        $self = clone $this;
        $self['phoneVerified'] = $phoneVerified;

        return $self;
    }
}
