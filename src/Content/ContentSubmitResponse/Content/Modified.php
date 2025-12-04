<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Content;

use ModerationAPI\Content\ContentSubmitResponse\Content\Modified\UnionMember1;
use ModerationAPI\Core\Concerns\SdkUnion;
use ModerationAPI\Core\Conversion\Contracts\Converter;
use ModerationAPI\Core\Conversion\Contracts\ConverterSource;
use ModerationAPI\Core\Conversion\MapOf;

/**
 * The modified content, if any.
 */
final class Modified implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', new MapOf(UnionMember1::class)];
    }
}
