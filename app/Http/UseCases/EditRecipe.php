<?php

namespace App\Http\UseCases;

use App\Enums\IsFavorite;
use App\Http\UseCases\Results\CreateRecipeResult;
use App\Http\UseCases\Results\EditRecipeResult;
use App\Models\HowToMake;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// コメント書く
class EditRecipe
{
    public function __invoke(Request $request, Recipe $recipe): EditRecipeResult
    {
        $result = new EditRecipeResult();

        DB::beginTransaction();
        // レシピマスタ更新
        $recipe->title = $request->input('title');
        if (is_null($request->input('is_favorite'))) {
            $recipe->is_favorite = IsFavorite::NO;
        } else {
            $recipe->is_favorite = IsFavorite::YES;
        }
        $recipe->dish_type = $request->input('dish_type');
        $recipe->memo = $request->input('memo');
        $recipe->save();

        // 材料トラン削除
        /** @var Ingredient $ingredient */
        foreach ($recipe->ingredients as $ingredient) {
            $ingredient->delete();
        }
        // 材料トラン作成
        $request_ingredients = $request->input('ingredients');
        foreach ($request_ingredients as $ingredient_name) {
            $ingredient = new Ingredient();
            $ingredient->recipe_id = $recipe->recipe_id;
            $ingredient->ingredient_name = $ingredient_name;
            $ingredient->save();
        }

        // 作り方トラン削除
        foreach ($recipe->how_to_makes as $how_to_make) {
            $how_to_make->delete();
        }
        // 作り方トラン作成
        $request_how_to_makes = $request->input('how_to_makes');
        foreach ($request_how_to_makes as $make) {
            $how_to_make = new HowToMake();
            $how_to_make->recipe_id = $recipe->recipe_id;
            $how_to_make->make = $make;
            $how_to_make->order = 1;
            $how_to_make->save();
        }

        DB::commit();

        $result->success = true;
        $result->recipe = $recipe;
        return $result;
    }
}
