<?php

declare(strict_types=1);

namespace ModerationAPI\WebhookSecret;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type WebhookSecretGetResponseShape = array{secret: string}
 */
final class WebhookSecretGetResponse implements BaseModel
{
    /** @use SdkModel<WebhookSecretGetResponseShape> */
    use SdkModel;

    /**
     * The signing secret for this project. Every webhook delivery is signed with HMAC-SHA256 over the raw JSON body, hex-encoded in the `modapi-signature` header.
     */
    #[Required]
    public string $secret;

    /**
     * `new WebhookSecretGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookSecretGetResponse::with(secret: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookSecretGetResponse)->withSecret(...)
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
    public static function with(string $secret): self
    {
        $self = new self;

        $self['secret'] = $secret;

        return $self;
    }

    /**
     * The signing secret for this project. Every webhook delivery is signed with HMAC-SHA256 over the raw JSON body, hex-encoded in the `modapi-signature` header.
     */
    public function withSecret(string $secret): self
    {
        $self = clone $this;
        $self['secret'] = $secret;

        return $self;
    }
}
