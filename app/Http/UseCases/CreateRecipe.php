<?php

namespace App\Http\UseCases;

use App\Enums\IsFavorite;
use App\Http\UseCases\Results\CreateRecipeResult;
use App\Models\HowToMake;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * レシピ登録
 *
 * @param Request $request
 * @return CreateRecipeResult
 */
class CreateRecipe
{
    public function __invoke(Request $request): CreateRecipeResult
    {
        $result = new CreateRecipeResult();

        DB::beginTransaction();
        // レシピマスタに登録
        $recipe = new Recipe();
        $recipe->title = $request->input('title');
        if (is_null($request->input('is_favorite'))) {
            $recipe->is_favorite = IsFavorite::NO;
        } else {
            $recipe->is_favorite = IsFavorite::YES;
        }
        $recipe->is_favorite = $request->input('is_favorite');
        $recipe->dish_type = $request->input('dish_type');
        $recipe->memo = $request->input('memo');
        $recipe->save();

        // 材料トランに登録
        $ingredient = new Ingredient();
        $ingredient->recipe_id = $recipe->recipe_id;
        $ingredient->ingredient_name = $request->input('ingredient_name');
        $ingredient->save();

        // 作り方トランに登録
        $how_to_make = new HowToMake();
        $how_to_make->recipe_id = $recipe->recipe_id;
        $how_to_make->make = $request->input('make');
        $how_to_make->order = 1;
        $how_to_make->save();

        DB::commit();

        $result->success = true;
        return $result;
    }
}
