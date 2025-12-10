<?php

declare(strict_types=1);

namespace ModerationAPI\Auth;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type AuthGetResponseShape = array{message: string, status: string}
 */
final class AuthGetResponse implements BaseModel
{
    /** @use SdkModel<AuthGetResponseShape> */
    use SdkModel;

    /**
     * Message of the authentication.
     */
    #[Required]
    public string $message;

    /**
     * Status of the authentication.
     */
    #[Required]
    public string $status;

    /**
     * `new AuthGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AuthGetResponse::with(message: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AuthGetResponse)->withMessage(...)->withStatus(...)
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
     */
    public static function with(string $message, string $status): self
    {
        $self = new self;

        $self['message'] = $message;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Message of the authentication.
     */
    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    /**
     * Status of the authentication.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
