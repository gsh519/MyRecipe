<?php

namespace App\Http\Controllers;

use App\Http\UseCases\DeleteRecipe;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;

class RecipeDeleteController extends BaseController
{
    /**
     * レシピ削除
     *
     * @param Recipe $recipe
     * @param DeleteRecipe $DeleteRecipe
     * @return RedirectResponse
     */
    public function delete(Recipe $recipe, DeleteRecipe $DeleteRecipe): RedirectResponse
    {
        $result = $DeleteRecipe($recipe);

        if ($result->success) {
            return redirect()
                ->route('recipe')
                ->with('message', 'レシピを削除しました');
        } else {
            return back()
                ->route('recipe')
                ->with('message', $result->error);
        }
    }
}
