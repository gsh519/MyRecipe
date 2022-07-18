<?php

namespace App\Http\Controllers;

use App\Http\UseCases\EditRecipe;
use App\Models\Recipe;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class RecipeEditController extends BaseController
{
    /**
     * レシピ編集画面表示
     *
     * @return View
     */
    public function init(Recipe $recipe): View
    {
        return view('recipe.edit', [
            'recipe' => $recipe,
        ]);
    }

    public function edit(Request $request, Recipe $recipe, EditRecipe $EditRecipe)
    {
        $result = $EditRecipe($request, $recipe);

        if ($result->success) {
            return redirect()
                ->route('recipe.edit', $result->recipe)
                ->with('message', 'レシピを更新しました');
        } else {
            return back()
                ->route('recipe.edit', $result->recipe)
                ->with('message', $result->error);
        }
    }
}
