<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Content;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Text.
 *
 * @phpstan-type TextShape = array{text: string, type?: 'text'}
 */
final class Text implements BaseModel
{
    /** @use SdkModel<TextShape> */
    use SdkModel;

    /** @var 'text' $type */
    #[Required]
    public string $type = 'text';

    /**
     * The content text.
     */
    #[Required]
    public string $text;

    /**
     * `new Text()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Text::with(text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Text)->withText(...)
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
    public static function with(string $text): self
    {
        $obj = new self;

        $obj['text'] = $text;

        return $obj;
    }

    /**
     * The content text.
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj['text'] = $text;

        return $obj;
    }
}
