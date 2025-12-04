<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Content;

use ModerationAPI\Content\ContentSubmitParams\Content\ContentNode\Data;
use ModerationAPI\Content\ContentSubmitParams\Content\ContentNode\Data\Audio;
use ModerationAPI\Content\ContentSubmitParams\Content\ContentNode\Data\Image;
use ModerationAPI\Content\ContentSubmitParams\Content\ContentNode\Data\Text;
use ModerationAPI\Content\ContentSubmitParams\Content\ContentNode\Data\Video;
use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Object.
 *
 * @phpstan-type ContentNodeShape = array{
 *   data: array<string,\ModerationAPI\Content\ContentSubmitParams\Content\ContentNode\Data\Text|\ModerationAPI\Content\ContentSubmitParams\Content\ContentNode\Data\Image|\ModerationAPI\Content\ContentSubmitParams\Content\ContentNode\Data\Video|\ModerationAPI\Content\ContentSubmitParams\Content\ContentNode\Data\Audio>,
 *   type: 'object',
 * }
 */
final class ContentNode implements BaseModel
{
    /** @use SdkModel<ContentNodeShape> */
    use SdkModel;

    /** @var 'object' $type */
    #[Api]
    public string $type = 'object';

    /**
     * Values in the object. Can be mixed content types.
     *
     * @var array<string,Text|Image|Video|Audio> $data
     */
    #[Api(map: Data::class)]
    public array $data;

    /**
     * `new ContentNode()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContentNode::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContentNode)->withData(...)
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
     * @param array<string,Text|Image|Video|Audio> $data
     */
    public static function with(array $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    /**
     * Values in the object. Can be mixed content types.
     *
     * @param array<string,Text|Image|Video|Audio> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
