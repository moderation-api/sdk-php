<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Content;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Audio.
 *
 * @phpstan-type AudioShape = array{type: 'audio', url: string}
 */
final class Audio implements BaseModel
{
    /** @use SdkModel<AudioShape> */
    use SdkModel;

    /** @var 'audio' $type */
    #[Api]
    public string $type = 'audio';

    /**
     * The URL of the audio content.
     */
    #[Api]
    public string $url;

    /**
     * `new Audio()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Audio::with(url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Audio)->withURL(...)
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

        $obj->url = $url;

        return $obj;
    }

    /**
     * The URL of the audio content.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }
}
