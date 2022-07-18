<?php

namespace App\Http\Controllers;

use App\Http\UseCases\GetRecipe;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller as BaseController;

class RecipeIndexController extends BaseController
{
    /**
     * レシピ一覧表示
     *
     * @param GetRecipe $GetRecipe
     * @return View
     */
    public function init(GetRecipe $GetRecipe): View
    {
        // レシピ一覧を取得
        $recipes = $GetRecipe();

        return view('recipe.index', [
            'recipes' => $recipes,
        ]);
    }
}
