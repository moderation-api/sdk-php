<?php

declare(strict_types=1);

namespace ModerationAPI\Authors;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type AuthorDeleteResponseShape = array{success: bool}
 */
final class AuthorDeleteResponse implements BaseModel
{
    /** @use SdkModel<AuthorDeleteResponseShape> */
    use SdkModel;

    #[Required]
    public bool $success;

    /**
     * `new AuthorDeleteResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AuthorDeleteResponse::with(success: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AuthorDeleteResponse)->withSuccess(...)
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
    public static function with(bool $success): self
    {
        $self = new self;

        $self['success'] = $success;

        return $self;
    }

    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }
}
