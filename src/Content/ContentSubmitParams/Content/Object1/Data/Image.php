<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Content\Object1\Data;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Image.
 *
 * @phpstan-type ImageShape = array{type: 'image', url: string}
 */
final class Image implements BaseModel
{
    /** @use SdkModel<ImageShape> */
    use SdkModel;

    /** @var 'image' $type */
    #[Required]
    public string $type = 'image';

    /**
     * A public URL of the image content.
     */
    #[Required]
    public string $url;

    /**
     * `new Image()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Image::with(url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Image)->withURL(...)
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
    public static function with(string $url): self
    {
        $obj = new self;

        $obj['url'] = $url;

        return $obj;
    }

    /**
     * A public URL of the image content.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }
}
