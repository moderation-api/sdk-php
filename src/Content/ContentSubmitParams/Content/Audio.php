<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Content;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Audio.
 *
 * @phpstan-type AudioShape = array{type?: 'audio', url: string}
 */
final class Audio implements BaseModel
{
    /** @use SdkModel<AudioShape> */
    use SdkModel;

    /** @var 'audio' $type */
    #[Required]
    public string $type = 'audio';

    /**
     * The URL of the audio content.
     */
    #[Required]
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
        $self = new self;

        $self['url'] = $url;

        return $self;
    }

    /**
     * The URL of the audio content.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
