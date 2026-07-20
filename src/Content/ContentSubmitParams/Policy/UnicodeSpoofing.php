<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Content\ContentSubmitParams\Policy\UnicodeSpoofing\Signal;
use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SignalShape from \ModerationAPI\Content\ContentSubmitParams\Policy\UnicodeSpoofing\Signal
 *
 * @phpstan-type UnicodeSpoofingShape = array{
 *   id: 'unicode_spoofing',
 *   flag: bool,
 *   signals?: array<string,Signal|SignalShape>|null,
 *   threshold?: float|null,
 * }
 */
final class UnicodeSpoofing implements BaseModel
{
    /** @use SdkModel<UnicodeSpoofingShape> */
    use SdkModel;

    /** @var 'unicode_spoofing' $id */
    #[Required]
    public string $id = 'unicode_spoofing';

    #[Required]
    public bool $flag;

    /**
     * Per-signal flag toggles. Omitted spoofing signals are enabled; encoding_damage defaults to off because decode damage (U+FFFD) marks a broken pipeline, not an attack. A disabled signal is still detected and reported as a label, but does not by itself flag the policy.
     *
     * @var array<string,Signal>|null $signals
     */
    #[Optional(map: Signal::class)]
    public ?array $signals;

    #[Optional]
    public ?float $threshold;

    /**
     * `new UnicodeSpoofing()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UnicodeSpoofing::with(flag: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UnicodeSpoofing)->withFlag(...)
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
     * @param array<string,Signal|SignalShape>|null $signals
     */
    public static function with(
        bool $flag,
        ?array $signals = null,
        ?float $threshold = null
    ): self {
        $self = new self;

        $self['flag'] = $flag;

        null !== $signals && $self['signals'] = $signals;
        null !== $threshold && $self['threshold'] = $threshold;

        return $self;
    }

    /**
     * @param 'unicode_spoofing' $id
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
     * Per-signal flag toggles. Omitted spoofing signals are enabled; encoding_damage defaults to off because decode damage (U+FFFD) marks a broken pipeline, not an attack. A disabled signal is still detected and reported as a label, but does not by itself flag the policy.
     *
     * @param array<string,Signal|SignalShape> $signals
     */
    public function withSignals(array $signals): self
    {
        $self = clone $this;
        $self['signals'] = $signals;

        return $self;
    }

    public function withThreshold(float $threshold): self
    {
        $self = clone $this;
        $self['threshold'] = $threshold;

        return $self;
    }
}
