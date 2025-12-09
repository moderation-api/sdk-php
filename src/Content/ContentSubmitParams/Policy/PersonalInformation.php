<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type PersonalInformationShape = array{
 *   id: 'personal_information', flag: bool
 * }
 */
final class PersonalInformation implements BaseModel
{
    /** @use SdkModel<PersonalInformationShape> */
    use SdkModel;

    /** @var 'personal_information' $id */
    #[Required]
    public string $id = 'personal_information';

    #[Required]
    public bool $flag;

    /**
     * `new PersonalInformation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PersonalInformation::with(flag: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PersonalInformation)->withFlag(...)
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
    public static function with(bool $flag): self
    {
        $obj = new self;

        $obj['flag'] = $flag;

        return $obj;
    }

    public function withFlag(bool $flag): self
    {
        $obj = clone $this;
        $obj['flag'] = $flag;

        return $obj;
    }
}
