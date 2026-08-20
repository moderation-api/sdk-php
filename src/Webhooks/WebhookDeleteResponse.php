<?php

declare(strict_types=1);

namespace ModerationAPI\Webhooks;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type WebhookDeleteResponseShape = array{id: string, deleted: bool}
 */
final class WebhookDeleteResponse implements BaseModel
{
    /** @use SdkModel<WebhookDeleteResponseShape> */
    use SdkModel;

    /**
     * The ID of the webhook.
     */
    #[Required]
    public string $id;

    /**
     * Whether the webhook was deleted.
     */
    #[Required]
    public bool $deleted;

    /**
     * `new WebhookDeleteResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookDeleteResponse::with(id: ..., deleted: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookDeleteResponse)->withID(...)->withDeleted(...)
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
    public static function with(string $id, bool $deleted): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['deleted'] = $deleted;

        return $self;
    }

    /**
     * The ID of the webhook.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Whether the webhook was deleted.
     */
    public function withDeleted(bool $deleted): self
    {
        $self = clone $this;
        $self['deleted'] = $deleted;

        return $self;
    }
}
