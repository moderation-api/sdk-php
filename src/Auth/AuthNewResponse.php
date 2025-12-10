<?php

declare(strict_types=1);

namespace ModerationAPI\Auth;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type AuthNewResponseShape = array{
 *   message: string, project: string, status: string
 * }
 */
final class AuthNewResponse implements BaseModel
{
    /** @use SdkModel<AuthNewResponseShape> */
    use SdkModel;

    /**
     * Message of the authentication.
     */
    #[Required]
    public string $message;

    /**
     * Name of the authenticated project.
     */
    #[Required]
    public string $project;

    /**
     * Status of the authentication.
     */
    #[Required]
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
        $self = new self;

        $self['message'] = $message;
        $self['project'] = $project;
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
     * Name of the authenticated project.
     */
    public function withProject(string $project): self
    {
        $self = clone $this;
        $self['project'] = $project;

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
