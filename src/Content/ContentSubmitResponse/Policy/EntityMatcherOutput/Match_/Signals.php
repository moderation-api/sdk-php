<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Policy\EntityMatcherOutput\Match_;

use ModerationAPI\Content\ContentSubmitResponse\Policy\EntityMatcherOutput\Match_\Signals\BrandImpersonation;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Observable properties of a URL (URL Risk only). Absent for allow/block list matches.
 *
 * @phpstan-import-type BrandImpersonationShape from \ModerationAPI\Content\ContentSubmitResponse\Policy\EntityMatcherOutput\Match_\Signals\BrandImpersonation
 *
 * @phpstan-type SignalsShape = array{
 *   botProtection: bool|null,
 *   brandImpersonation: null|BrandImpersonation|BrandImpersonationShape,
 *   domainAgeDays: int|null,
 *   finalURL: string|null,
 *   hasEmailSetup: bool|null,
 *   hasSuspiciousCharacters: bool,
 *   isLinkShortener: bool,
 *   isReported: bool,
 *   redirectCount: int|null,
 * }
 */
final class Signals implements BaseModel
{
    /** @use SdkModel<SignalsShape> */
    use SdkModel;

    #[Required('bot_protection')]
    public ?bool $botProtection;

    #[Required('brand_impersonation')]
    public ?BrandImpersonation $brandImpersonation;

    #[Required('domain_age_days')]
    public ?int $domainAgeDays;

    #[Required('final_url')]
    public ?string $finalURL;

    #[Required('has_email_setup')]
    public ?bool $hasEmailSetup;

    #[Required('has_suspicious_characters')]
    public bool $hasSuspiciousCharacters;

    #[Required('is_link_shortener')]
    public bool $isLinkShortener;

    #[Required('is_reported')]
    public bool $isReported;

    #[Required('redirect_count')]
    public ?int $redirectCount;

    /**
     * `new Signals()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Signals::with(
     *   botProtection: ...,
     *   brandImpersonation: ...,
     *   domainAgeDays: ...,
     *   finalURL: ...,
     *   hasEmailSetup: ...,
     *   hasSuspiciousCharacters: ...,
     *   isLinkShortener: ...,
     *   isReported: ...,
     *   redirectCount: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Signals)
     *   ->withBotProtection(...)
     *   ->withBrandImpersonation(...)
     *   ->withDomainAgeDays(...)
     *   ->withFinalURL(...)
     *   ->withHasEmailSetup(...)
     *   ->withHasSuspiciousCharacters(...)
     *   ->withIsLinkShortener(...)
     *   ->withIsReported(...)
     *   ->withRedirectCount(...)
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
     * @param BrandImpersonation|BrandImpersonationShape|null $brandImpersonation
     */
    public static function with(
        ?bool $botProtection,
        BrandImpersonation|array|null $brandImpersonation,
        ?int $domainAgeDays,
        ?string $finalURL,
        ?bool $hasEmailSetup,
        bool $hasSuspiciousCharacters,
        bool $isLinkShortener,
        bool $isReported,
        ?int $redirectCount,
    ): self {
        $self = new self;

        $self['botProtection'] = $botProtection;
        $self['brandImpersonation'] = $brandImpersonation;
        $self['domainAgeDays'] = $domainAgeDays;
        $self['finalURL'] = $finalURL;
        $self['hasEmailSetup'] = $hasEmailSetup;
        $self['hasSuspiciousCharacters'] = $hasSuspiciousCharacters;
        $self['isLinkShortener'] = $isLinkShortener;
        $self['isReported'] = $isReported;
        $self['redirectCount'] = $redirectCount;

        return $self;
    }

    public function withBotProtection(?bool $botProtection): self
    {
        $self = clone $this;
        $self['botProtection'] = $botProtection;

        return $self;
    }

    /**
     * @param BrandImpersonation|BrandImpersonationShape|null $brandImpersonation
     */
    public function withBrandImpersonation(
        BrandImpersonation|array|null $brandImpersonation
    ): self {
        $self = clone $this;
        $self['brandImpersonation'] = $brandImpersonation;

        return $self;
    }

    public function withDomainAgeDays(?int $domainAgeDays): self
    {
        $self = clone $this;
        $self['domainAgeDays'] = $domainAgeDays;

        return $self;
    }

    public function withFinalURL(?string $finalURL): self
    {
        $self = clone $this;
        $self['finalURL'] = $finalURL;

        return $self;
    }

    public function withHasEmailSetup(?bool $hasEmailSetup): self
    {
        $self = clone $this;
        $self['hasEmailSetup'] = $hasEmailSetup;

        return $self;
    }

    public function withHasSuspiciousCharacters(
        bool $hasSuspiciousCharacters
    ): self {
        $self = clone $this;
        $self['hasSuspiciousCharacters'] = $hasSuspiciousCharacters;

        return $self;
    }

    public function withIsLinkShortener(bool $isLinkShortener): self
    {
        $self = clone $this;
        $self['isLinkShortener'] = $isLinkShortener;

        return $self;
    }

    public function withIsReported(bool $isReported): self
    {
        $self = clone $this;
        $self['isReported'] = $isReported;

        return $self;
    }

    public function withRedirectCount(?int $redirectCount): self
    {
        $self = clone $this;
        $self['redirectCount'] = $redirectCount;

        return $self;
    }
}
