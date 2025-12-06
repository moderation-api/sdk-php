<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Content;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Video.
 *
 * @phpstan-type VideoShape = array{type: 'video', url: string}
 */
final class Video implements BaseModel
{
    /** @use SdkModel<VideoShape> */
    use SdkModel;

    /** @var 'video' $type */
    #[Api]
    public string $type = 'video';

    /**
     * A public URL of the video content.
     */
    #[Api]
    public string $url;

    /**
     * `new Video()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Video::with(url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Video)->withURL(...)
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
     * A public URL of the video content.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }
}
