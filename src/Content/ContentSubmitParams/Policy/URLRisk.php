<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type URLRiskShape = array{
 *   id: 'url_risk',
 *   flag: bool,
 *   allowlistWordlistIDs?: list<string>|null,
 *   blocklistWordlistIDs?: list<string>|null,
 *   threshold?: float|null,
 * }
 */
final class URLRisk implements BaseModel
{
    /** @use SdkModel<URLRiskShape> */
    use SdkModel;

    /** @var 'url_risk' $id */
    #[Required]
    public string $id = 'url_risk';

    #[Required]
    public bool $flag;

    /**
     * IDs of wordlists whose entries are treated as allowed URL domains. Matches short-circuit the risk model and are never flagged.
     *
     * @var list<string>|null $allowlistWordlistIDs
     */
    #[Optional('allowlistWordlistIds', list: 'string')]
    public ?array $allowlistWordlistIDs;

    /**
     * IDs of wordlists whose entries are treated as blocked URL domains. Matches short-circuit the risk model and are always flagged. Blocklists take precedence over allowlists.
     *
     * @var list<string>|null $blocklistWordlistIDs
     */
    #[Optional('blocklistWordlistIds', list: 'string')]
    public ?array $blocklistWordlistIDs;

    #[Optional]
    public ?float $threshold;

    /**
     * `new URLRisk()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * URLRisk::with(flag: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new URLRisk)->withFlag(...)
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
     * @param list<string>|null $allowlistWordlistIDs
     * @param list<string>|null $blocklistWordlistIDs
     */
    public static function with(
        bool $flag,
        ?array $allowlistWordlistIDs = null,
        ?array $blocklistWordlistIDs = null,
        ?float $threshold = null,
    ): self {
        $self = new self;

        $self['flag'] = $flag;

        null !== $allowlistWordlistIDs && $self['allowlistWordlistIDs'] = $allowlistWordlistIDs;
        null !== $blocklistWordlistIDs && $self['blocklistWordlistIDs'] = $blocklistWordlistIDs;
        null !== $threshold && $self['threshold'] = $threshold;

        return $self;
    }

    /**
     * @param 'url_risk' $id
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withFlag(bool $flag): self
    {
        $self = clone $this;
        $self['flag'] = $flag;

        return $self;
    }

    /**
     * IDs of wordlists whose entries are treated as allowed URL domains. Matches short-circuit the risk model and are never flagged.
     *
     * @param list<string> $allowlistWordlistIDs
     */
    public function withAllowlistWordlistIDs(array $allowlistWordlistIDs): self
    {
        $self = clone $this;
        $self['allowlistWordlistIDs'] = $allowlistWordlistIDs;

        return $self;
    }

    /**
     * IDs of wordlists whose entries are treated as blocked URL domains. Matches short-circuit the risk model and are always flagged. Blocklists take precedence over allowlists.
     *
     * @param list<string> $blocklistWordlistIDs
     */
    public function withBlocklistWordlistIDs(array $blocklistWordlistIDs): self
    {
        $self = clone $this;
        $self['blocklistWordlistIDs'] = $blocklistWordlistIDs;

        return $self;
    }

    public function withThreshold(float $threshold): self
    {
        $self = clone $this;
        $self['threshold'] = $threshold;

        return $self;
    }
}
