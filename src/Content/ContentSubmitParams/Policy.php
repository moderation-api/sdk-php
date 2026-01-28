<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams;

use ModerationAPI\Content\ContentSubmitParams\Policy\Cannabis;
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

/**
 * @phpstan-import-type ToxicityShape from \ModerationAPI\Content\ContentSubmitParams\Policy\Toxicity
 * @phpstan-import-type PersonalInformationShape from \ModerationAPI\Content\ContentSubmitParams\Policy\PersonalInformation
 * @phpstan-import-type ToxicitySevereShape from \ModerationAPI\Content\ContentSubmitParams\Policy\ToxicitySevere
 * @phpstan-import-type HateShape from \ModerationAPI\Content\ContentSubmitParams\Policy\Hate
 * @phpstan-import-type IllicitShape from \ModerationAPI\Content\ContentSubmitParams\Policy\Illicit
 * @phpstan-import-type IllicitDrugsShape from \ModerationAPI\Content\ContentSubmitParams\Policy\IllicitDrugs
 * @phpstan-import-type IllicitAlcoholShape from \ModerationAPI\Content\ContentSubmitParams\Policy\IllicitAlcohol
 * @phpstan-import-type IllicitFirearmsShape from \ModerationAPI\Content\ContentSubmitParams\Policy\IllicitFirearms
 * @phpstan-import-type IllicitTobaccoShape from \ModerationAPI\Content\ContentSubmitParams\Policy\IllicitTobacco
 * @phpstan-import-type IllicitGamblingShape from \ModerationAPI\Content\ContentSubmitParams\Policy\IllicitGambling
 * @phpstan-import-type CannabisShape from \ModerationAPI\Content\ContentSubmitParams\Policy\Cannabis
 * @phpstan-import-type SexualShape from \ModerationAPI\Content\ContentSubmitParams\Policy\Sexual
 * @phpstan-import-type FlirtationShape from \ModerationAPI\Content\ContentSubmitParams\Policy\Flirtation
 * @phpstan-import-type ProfanityShape from \ModerationAPI\Content\ContentSubmitParams\Policy\Profanity
 * @phpstan-import-type ViolenceShape from \ModerationAPI\Content\ContentSubmitParams\Policy\Violence
 * @phpstan-import-type SelfHarmShape from \ModerationAPI\Content\ContentSubmitParams\Policy\SelfHarm
 * @phpstan-import-type SpamShape from \ModerationAPI\Content\ContentSubmitParams\Policy\Spam
 * @phpstan-import-type SelfPromotionShape from \ModerationAPI\Content\ContentSubmitParams\Policy\SelfPromotion
 * @phpstan-import-type PoliticalShape from \ModerationAPI\Content\ContentSubmitParams\Policy\Political
 * @phpstan-import-type ReligionShape from \ModerationAPI\Content\ContentSubmitParams\Policy\Religion
 * @phpstan-import-type CodeAbuseShape from \ModerationAPI\Content\ContentSubmitParams\Policy\CodeAbuse
 * @phpstan-import-type PiiMaskingShape from \ModerationAPI\Content\ContentSubmitParams\Policy\PiiMasking
 * @phpstan-import-type URLMaskingShape from \ModerationAPI\Content\ContentSubmitParams\Policy\URLMasking
 * @phpstan-import-type GuidelineShape from \ModerationAPI\Content\ContentSubmitParams\Policy\Guideline
 *
 * @phpstan-type PolicyVariants = Toxicity|PersonalInformation|ToxicitySevere|Hate|Illicit|IllicitDrugs|IllicitAlcohol|IllicitFirearms|IllicitTobacco|IllicitGambling|Cannabis|Sexual|Flirtation|Profanity|Violence|SelfHarm|Spam|SelfPromotion|Political|Religion|CodeAbuse|PiiMasking|URLMasking|Guideline
 * @phpstan-type PolicyShape = PolicyVariants|ToxicityShape|PersonalInformationShape|ToxicitySevereShape|HateShape|IllicitShape|IllicitDrugsShape|IllicitAlcoholShape|IllicitFirearmsShape|IllicitTobaccoShape|IllicitGamblingShape|CannabisShape|SexualShape|FlirtationShape|ProfanityShape|ViolenceShape|SelfHarmShape|SpamShape|SelfPromotionShape|PoliticalShape|ReligionShape|CodeAbuseShape|PiiMaskingShape|URLMaskingShape|GuidelineShape
 */
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
            Cannabis::class,
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
