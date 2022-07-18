<?php

namespace App\Http\UseCases;

use App\Enums\IsFavorite;
use App\Http\UseCases\Results\DeleteRecipeResult;
use App\Http\UseCases\Results\EditRecipeResult;
use App\Models\HowToMake;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// コメント書く
class DeleteRecipe
{
    public function __invoke(Recipe $recipe): DeleteRecipeResult
    {
        $result = new DeleteRecipeResult();

        // 材料を消す
        foreach ($recipe->ingredients as $ingredient) {
            $ingredient->delete();
        }

        // 作り方を消す
        foreach ($recipe->how_to_makes as $how_to_make) {
            $how_to_make->delete();
        }

        $recipe->delete();

        $result->success = true;
        return $result;
    }
}
