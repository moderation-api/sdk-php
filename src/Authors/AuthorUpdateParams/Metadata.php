<?php

declare(strict_types=1);

namespace ModerationAPI\Authors\AuthorUpdateParams;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Additional metadata provided by your system. We recommend including any relevant information that may assist in the moderation process.
 *
 * @phpstan-type MetadataShape = array{
 *   email_verified?: bool|null,
 *   identity_verified?: bool|null,
 *   is_paying_customer?: bool|null,
 *   phone_verified?: bool|null,
 * }
 */
final class Metadata implements BaseModel
{
    /** @use SdkModel<MetadataShape> */
    use SdkModel;

    /**
     * Whether the author's email is verified.
     */
    #[Api(nullable: true, optional: true)]
    public ?bool $email_verified;

    /**
     * Whether the author's identity is verified.
     */
    #[Api(nullable: true, optional: true)]
    public ?bool $identity_verified;

    /**
     * Whether the author is a paying customer.
     */
    #[Api(nullable: true, optional: true)]
    public ?bool $is_paying_customer;

    /**
     * Whether the author's phone number is verified.
     */
    #[Api(nullable: true, optional: true)]
    public ?bool $phone_verified;

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
        ?bool $email_verified = null,
        ?bool $identity_verified = null,
        ?bool $is_paying_customer = null,
        ?bool $phone_verified = null,
    ): self {
        $obj = new self;

        null !== $email_verified && $obj['email_verified'] = $email_verified;
        null !== $identity_verified && $obj['identity_verified'] = $identity_verified;
        null !== $is_paying_customer && $obj['is_paying_customer'] = $is_paying_customer;
        null !== $phone_verified && $obj['phone_verified'] = $phone_verified;

        return $obj;
    }

    /**
     * Whether the author's email is verified.
     */
    public function withEmailVerified(?bool $emailVerified): self
    {
        $obj = clone $this;
        $obj['email_verified'] = $emailVerified;

        return $obj;
    }

    /**
     * Whether the author's identity is verified.
     */
    public function withIdentityVerified(?bool $identityVerified): self
    {
        $obj = clone $this;
        $obj['identity_verified'] = $identityVerified;

        return $obj;
    }

    /**
     * Whether the author is a paying customer.
     */
    public function withIsPayingCustomer(?bool $isPayingCustomer): self
    {
        $obj = clone $this;
        $obj['is_paying_customer'] = $isPayingCustomer;

        return $obj;
    }

    /**
     * Whether the author's phone number is verified.
     */
    public function withPhoneVerified(?bool $phoneVerified): self
    {
        $obj = clone $this;
        $obj['phone_verified'] = $phoneVerified;

        return $obj;
    }
}
