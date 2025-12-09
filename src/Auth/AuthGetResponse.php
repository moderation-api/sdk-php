<?php

declare(strict_types=1);

namespace ModerationAPI\Auth;

use ModerationAPI\Core\Attributes\Api;
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
    #[Api]
    public string $message;

    /**
     * Status of the authentication.
     */
    #[Api]
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
        $obj = new self;

        $obj['message'] = $message;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Message of the authentication.
     */
    public function withMessage(string $message): self
    {
        $obj = clone $this;
        $obj['message'] = $message;

        return $obj;
    }

    /**
     * Status of the authentication.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
