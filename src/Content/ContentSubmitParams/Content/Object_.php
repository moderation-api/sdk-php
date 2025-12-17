<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Content;

use ModerationAPI\Content\ContentSubmitParams\Content\Object_\Data;
use ModerationAPI\Content\ContentSubmitParams\Content\Object_\Data\Audio;
use ModerationAPI\Content\ContentSubmitParams\Content\Object_\Data\Image;
use ModerationAPI\Content\ContentSubmitParams\Content\Object_\Data\Text;
use ModerationAPI\Content\ContentSubmitParams\Content\Object_\Data\Video;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Object.
 *
 * @phpstan-import-type DataShape from \ModerationAPI\Content\ContentSubmitParams\Content\Object_\Data
 *
 * @phpstan-type ObjectShape = array{data: array<string,DataShape>, type: 'object'}
 */
final class Object_ implements BaseModel
{
    /** @use SdkModel<ObjectShape> */
    use SdkModel;

    /** @var 'object' $type */
    #[Required]
    public string $type = 'object';

    /**
     * Values in the object. Can be mixed content types.
     *
     * @var array<string,Text|Image|Video|Audio> $data
     */
    #[Required(map: Data::class)]
    public array $data;

    /**
     * `new Object_()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Object_::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Object_)->withData(...)
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
     *
     * @param array<string,DataShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * Values in the object. Can be mixed content types.
     *
     * @param array<string,DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
