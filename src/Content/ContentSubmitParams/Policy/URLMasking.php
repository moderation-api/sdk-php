<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Content\ContentSubmitParams\Policy\URLMasking\Entity;
use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type URLMaskingShape = array{id: 'url', entities: array<string,Entity>}
 */
final class URLMasking implements BaseModel
{
    /** @use SdkModel<URLMaskingShape> */
    use SdkModel;

    /** @var 'url' $id */
    #[Api]
    public string $id = 'url';

    /** @var array<string,Entity> $entities */
    #[Api(map: Entity::class)]
    public array $entities;

    /**
     * `new URLMasking()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * URLMasking::with(entities: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new URLMasking)->withEntities(...)
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
     * @param array<string,Entity> $entities
     */
    public static function with(array $entities): self
    {
        $obj = new self;

        $obj->entities = $entities;

        return $obj;
    }

    /**
     * @param array<string,Entity> $entities
     */
    public function withEntities(array $entities): self
    {
        $obj = clone $this;
        $obj->entities = $entities;

        return $obj;
    }
}
