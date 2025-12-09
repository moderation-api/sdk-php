<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Content\ContentSubmitParams\Policy\PiiMasking\Entity;
use ModerationAPI\Content\ContentSubmitParams\Policy\PiiMasking\Entity\ID;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type PiiMaskingShape = array{id: 'pii', entities: array<string,Entity>}
 */
final class PiiMasking implements BaseModel
{
    /** @use SdkModel<PiiMaskingShape> */
    use SdkModel;

    /** @var 'pii' $id */
    #[Required]
    public string $id = 'pii';

    /** @var array<string,Entity> $entities */
    #[Required(map: Entity::class)]
    public array $entities;

    /**
     * `new PiiMasking()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PiiMasking::with(entities: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PiiMasking)->withEntities(...)
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
     * @param array<string,Entity|array{
     *   id: value-of<ID>,
     *   enable: bool,
     *   flag: bool,
     *   shouldMask: bool,
     *   mask?: string|null,
     * }> $entities
     */
    public static function with(array $entities): self
    {
        $obj = new self;

        $obj['entities'] = $entities;

        return $obj;
    }

    /**
     * @param array<string,Entity|array{
     *   id: value-of<ID>,
     *   enable: bool,
     *   flag: bool,
     *   shouldMask: bool,
     *   mask?: string|null,
     * }> $entities
     */
    public function withEntities(array $entities): self
    {
        $obj = clone $this;
        $obj['entities'] = $entities;

        return $obj;
    }
}
