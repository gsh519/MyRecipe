<?php

namespace App\Http\Controllers;

use App\Http\UseCases\CreateRecipe;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class RecipeAddController extends BaseController
{
    /**
     * レシピ新規登録画面
     *
     * @return View
     */
    public function init(): View
    {
        return view('recipe.add');
    }

    /**
     * レシピ新規登録処理
     *
     * @param Request $request
     * @param CreateRecipe $CreateRecipe
     * @return RedirectResponse
     */
    public function add(Request $request, CreateRecipe $CreateRecipe): RedirectResponse
    {
        $result = $CreateRecipe($request);

        if ($result->success) {
            return redirect()
                ->route('recipe.add')
                ->with('message', 'レシピを登録できました');
        } else {
            return back()
                ->route('recipe.add')
                ->with('message', $result->error);
        }
    }
}
