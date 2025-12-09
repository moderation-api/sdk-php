<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Content;

use ModerationAPI\Content\ContentSubmitParams\Content\Object1\Data;
use ModerationAPI\Content\ContentSubmitParams\Content\Object1\Data\Audio;
use ModerationAPI\Content\ContentSubmitParams\Content\Object1\Data\Image;
use ModerationAPI\Content\ContentSubmitParams\Content\Object1\Data\Text;
use ModerationAPI\Content\ContentSubmitParams\Content\Object1\Data\Video;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Object.
 *
 * @phpstan-type Object1Shape = array{
 *   data: array<string,\ModerationAPI\Content\ContentSubmitParams\Content\Object1\Data\Text|\ModerationAPI\Content\ContentSubmitParams\Content\Object1\Data\Image|\ModerationAPI\Content\ContentSubmitParams\Content\Object1\Data\Video|\ModerationAPI\Content\ContentSubmitParams\Content\Object1\Data\Audio>,
 *   type?: 'object',
 * }
 */
final class Object1 implements BaseModel
{
    /** @use SdkModel<Object1Shape> */
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
     * `new Object1()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Object1::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Object1)->withData(...)
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
     * @param array<string,Text|array{
     *   text: string, type?: 'text'
     * }|Image|array{
     *   type?: 'image', url: string
     * }|Video|array{
     *   type?: 'video', url: string
     * }|Audio|array{
     *   type?: 'audio', url: string
     * }> $data
     */
    public static function with(array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * Values in the object. Can be mixed content types.
     *
     * @param array<string,Text|array{
     *   text: string, type?: 'text'
     * }|Image|array{
     *   type?: 'image', url: string
     * }|Video|array{
     *   type?: 'video', url: string
     * }|Audio|array{
     *   type?: 'audio', url: string
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
