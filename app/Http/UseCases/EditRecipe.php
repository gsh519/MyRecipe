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
        $recipe->is_favorite = $request->input('is_favorite');
        $recipe->dish_type = $request->input('dish_type');
        $recipe->memo = $request->input('memo');
        $recipe->save();

        // 材料トラン削除
        /** @var Ingredient $ingredient */
        foreach ($recipe->ingredients as $ingredient) {
            $ingredient->delete();
        }

        // 材料トラン作成




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
