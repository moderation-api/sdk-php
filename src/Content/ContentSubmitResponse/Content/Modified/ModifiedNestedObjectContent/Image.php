<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Content\Modified\ModifiedNestedObjectContent;

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
     * Base64-encoded image data.
     */
    #[Optional]
    public ?string $data;

    /**
     * A public URL of the image content.
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
     * Base64-encoded image data.
     */
    public function withData(string $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * A public URL of the image content.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
