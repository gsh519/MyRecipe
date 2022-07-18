<?php

namespace App\Http\UseCases\Results;

class EditRecipeResult
{
    /** @var bool $success */
    public $success = false;
    /** @var string $error */
    public $error = null;
    /** @var Recipe|null */
    public $recipe = null;
}
