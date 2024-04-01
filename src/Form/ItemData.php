<?php

namespace App\Form;

use Symfony\Component\Validator\Constraints\NotBlank;

final class ItemData
{
    #[NotBlank]
    public string $name;
}
