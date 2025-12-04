<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams;

use ModerationAPI\Content\ContentSubmitParams\Policy\CodeAbuse;
use ModerationAPI\Content\ContentSubmitParams\Policy\Flirtation;
use ModerationAPI\Content\ContentSubmitParams\Policy\Guideline;
use ModerationAPI\Content\ContentSubmitParams\Policy\Hate;
use ModerationAPI\Content\ContentSubmitParams\Policy\Illicit;
use ModerationAPI\Content\ContentSubmitParams\Policy\IllicitAlcohol;
use ModerationAPI\Content\ContentSubmitParams\Policy\IllicitDrugs;
use ModerationAPI\Content\ContentSubmitParams\Policy\IllicitFirearms;
use ModerationAPI\Content\ContentSubmitParams\Policy\IllicitGambling;
use ModerationAPI\Content\ContentSubmitParams\Policy\IllicitTobacco;
use ModerationAPI\Content\ContentSubmitParams\Policy\PersonalInformation;
use ModerationAPI\Content\ContentSubmitParams\Policy\PiiMasking;
use ModerationAPI\Content\ContentSubmitParams\Policy\Political;
use ModerationAPI\Content\ContentSubmitParams\Policy\Profanity;
use ModerationAPI\Content\ContentSubmitParams\Policy\Religion;
use ModerationAPI\Content\ContentSubmitParams\Policy\SelfHarm;
use ModerationAPI\Content\ContentSubmitParams\Policy\SelfPromotion;
use ModerationAPI\Content\ContentSubmitParams\Policy\Sexual;
use ModerationAPI\Content\ContentSubmitParams\Policy\Spam;
use ModerationAPI\Content\ContentSubmitParams\Policy\Toxicity;
use ModerationAPI\Content\ContentSubmitParams\Policy\ToxicitySevere;
use ModerationAPI\Content\ContentSubmitParams\Policy\URLMasking;
use ModerationAPI\Content\ContentSubmitParams\Policy\Violence;
use ModerationAPI\Core\Concerns\SdkUnion;
use ModerationAPI\Core\Conversion\Contracts\Converter;
use ModerationAPI\Core\Conversion\Contracts\ConverterSource;

final class Policy implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            Toxicity::class,
            PersonalInformation::class,
            ToxicitySevere::class,
            Hate::class,
            Illicit::class,
            IllicitDrugs::class,
            IllicitAlcohol::class,
            IllicitFirearms::class,
            IllicitTobacco::class,
            IllicitGambling::class,
            Sexual::class,
            Flirtation::class,
            Profanity::class,
            Violence::class,
            SelfHarm::class,
            Spam::class,
            SelfPromotion::class,
            Political::class,
            Religion::class,
            CodeAbuse::class,
            PiiMasking::class,
            URLMasking::class,
            Guideline::class,
        ];
    }
}
