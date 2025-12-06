<?php

declare(strict_types=1);

namespace ModerationAPI\Auth;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkResponse;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type AuthNewResponseShape = array{
 *   message: string, project: string, status: string
 * }
 */
final class AuthNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<AuthNewResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Message of the authentication.
     */
    #[Api]
    public string $message;

    /**
     * Name of the authenticated project.
     */
    #[Api]
    public string $project;

    /**
     * Status of the authentication.
     */
    #[Api]
    public string $status;

    /**
     * `new AuthNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AuthNewResponse::with(message: ..., project: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AuthNewResponse)->withMessage(...)->withProject(...)->withStatus(...)
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
    public static function with(
        string $message,
        string $project,
        string $status
    ): self {
        $obj = new self;

        $obj['message'] = $message;
        $obj['project'] = $project;
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
     * Name of the authenticated project.
     */
    public function withProject(string $project): self
    {
        $obj = clone $this;
        $obj['project'] = $project;

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
