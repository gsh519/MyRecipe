<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller as BaseController;

class RecipeIndexController extends BaseController
{
    /**
     * レシピ一覧表示
     *
     * @return View
     */
    public function init(): View
    {
        $recipes = Recipe::all();

        return view('recipe.index', [
            'recipes' => $recipes,
        ]);
    }
}
