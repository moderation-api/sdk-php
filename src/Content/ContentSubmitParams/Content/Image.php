<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Content;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Image.
 *
 * @phpstan-type ImageShape = array{
 *   type: 'image', data?: string|null, url?: string|null
 * }
 */
final class Image implements BaseModel
{
    /** @use SdkModel<ImageShape> */
    use SdkModel;

    /** @var 'image' $type */
    #[Required]
    public string $type = 'image';

    /**
     * Base64-encoded image data. Either url or data must be provided. Note: base64 images are not stored and will not appear in the review queue.
     */
    #[Optional]
    public ?string $data;

    /**
     * A public URL of the image content. Either url or data must be provided.
     */
    #[Optional]
    public ?string $url;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $data = null, ?string $url = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    /**
     * @param 'image' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Base64-encoded image data. Either url or data must be provided. Note: base64 images are not stored and will not appear in the review queue.
     */
    public function withData(string $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * A public URL of the image content. Either url or data must be provided.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
