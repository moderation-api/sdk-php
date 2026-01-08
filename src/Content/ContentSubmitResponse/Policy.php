<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse;

use ModerationAPI\Content\ContentSubmitResponse\Policy\ClassifierOutput;
use ModerationAPI\Content\ContentSubmitResponse\Policy\EntityMatcherOutput;
use ModerationAPI\Core\Concerns\SdkUnion;
use ModerationAPI\Core\Conversion\Contracts\Converter;
use ModerationAPI\Core\Conversion\Contracts\ConverterSource;

/**
 * Policy output schema.
 *
 * @phpstan-import-type ClassifierOutputShape from \ModerationAPI\Content\ContentSubmitResponse\Policy\ClassifierOutput
 * @phpstan-import-type EntityMatcherOutputShape from \ModerationAPI\Content\ContentSubmitResponse\Policy\EntityMatcherOutput
 *
 * @phpstan-type PolicyVariants = ClassifierOutput|EntityMatcherOutput
 * @phpstan-type PolicyShape = PolicyVariants|ClassifierOutputShape|EntityMatcherOutputShape
 */
final class Policy implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [ClassifierOutput::class, EntityMatcherOutput::class];
    }
}
