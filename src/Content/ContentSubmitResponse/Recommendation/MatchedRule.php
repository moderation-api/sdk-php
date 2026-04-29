<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Recommendation;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type MatchedRuleShape = array{key: string, name: string}
 */
final class MatchedRule implements BaseModel
{
    /** @use SdkModel<MatchedRuleShape> */
    use SdkModel;

    #[Required]
    public string $key;

    #[Required]
    public string $name;

    /**
     * `new MatchedRule()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MatchedRule::with(key: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MatchedRule)->withKey(...)->withName(...)
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
    public static function with(string $key, string $name): self
    {
        $self = new self;

        $self['key'] = $key;
        $self['name'] = $name;

        return $self;
    }

    public function withKey(string $key): self
    {
        $self = clone $this;
        $self['key'] = $key;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
