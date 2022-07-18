<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = "recipes";
    protected $primaryKey = 'recipe_id';

    /*
    |-------------------
    | RELATION
    |-------------------
    |
    */

    /**
     * 材料
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class, 'recipe_id', 'recipe_id');
    }

    /**
     * 作り方
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function how_to_makes()
    {
        return $this->hasMany(HowToMake::class, 'recipe_id', 'recipe_id');
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
