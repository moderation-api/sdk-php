<?php

declare(strict_types=1);

namespace ModerationAPI\Authors;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkResponse;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type AuthorDeleteResponseShape = array{success: bool}
 */
final class AuthorDeleteResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<AuthorDeleteResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
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
        $obj = new self;

        $obj['success'] = $success;

        return $obj;
    }

    public function withSuccess(bool $success): self
    {
        $obj = clone $this;
        $obj['success'] = $success;

        return $obj;
    }
}
