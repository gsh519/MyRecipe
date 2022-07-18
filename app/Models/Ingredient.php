<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $table = "ingredients";
    protected $primaryKey = 'ingredient_id';

    /*
    |-------------------
    | RELATION
    |-------------------
    |
    */

    /**
     * レシピ
     *
     */
    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id', 'recipe_id');
    }

    /*
    |-------------------
    | ACCESSOR
    |-------------------
    |
    */

    /*
    |-------------------
    | SCOPE
    |-------------------
    |
    */
}
