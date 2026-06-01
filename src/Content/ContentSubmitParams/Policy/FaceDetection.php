<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Content\ContentSubmitParams\Policy\FaceDetection\Comparator;
use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type FaceDetectionShape = array{
 *   id: 'face_detection',
 *   flag: bool,
 *   comparator?: null|Comparator|value-of<Comparator>,
 *   count?: int|null,
 *   threshold?: float|null,
 * }
 */
final class FaceDetection implements BaseModel
{
    /** @use SdkModel<FaceDetectionShape> */
    use SdkModel;

    /** @var 'face_detection' $id */
    #[Required]
    public string $id = 'face_detection';

    #[Required]
    public bool $flag;

    /**
     * Flag images that contain "at least" or "fewer than" the configured number of faces. Defaults to at_least.
     *
     * @var value-of<Comparator>|null $comparator
     */
    #[Optional(enum: Comparator::class)]
    public ?string $comparator;

    /**
     * Number of faces the comparator applies to. Defaults to 1, so the default rule flags any image containing a face.
     */
    #[Optional]
    public ?int $count;

    #[Optional]
    public ?float $threshold;

    /**
     * `new FaceDetection()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FaceDetection::with(flag: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FaceDetection)->withFlag(...)
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
     * @param Comparator|value-of<Comparator>|null $comparator
     */
    public static function with(
        bool $flag,
        Comparator|string|null $comparator = null,
        ?int $count = null,
        ?float $threshold = null,
    ): self {
        $self = new self;

        $self['flag'] = $flag;

        null !== $comparator && $self['comparator'] = $comparator;
        null !== $count && $self['count'] = $count;
        null !== $threshold && $self['threshold'] = $threshold;

        return $self;
    }

    /**
     * @param 'face_detection' $id
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
     * Flag images that contain "at least" or "fewer than" the configured number of faces. Defaults to at_least.
     *
     * @param Comparator|value-of<Comparator> $comparator
     */
    public function withComparator(Comparator|string $comparator): self
    {
        $self = clone $this;
        $self['comparator'] = $comparator;

        return $self;
    }

    /**
     * Number of faces the comparator applies to. Defaults to 1, so the default rule flags any image containing a face.
     */
    public function withCount(int $count): self
    {
        $self = clone $this;
        $self['count'] = $count;

        return $self;
    }

    public function withThreshold(float $threshold): self
    {
        $self = clone $this;
        $self['threshold'] = $threshold;

        return $self;
    }
}
