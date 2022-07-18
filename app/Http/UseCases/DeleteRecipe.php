<?php

namespace App\Http\UseCases;

use App\Http\UseCases\Results\DeleteRecipeResult;
use App\Models\Recipe;

/**
 * レシピ削除処理
 *
 * @param Recipe $recipe
 * @return DeleteRecipeResult
 */
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
