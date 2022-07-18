<?php

namespace App\Http\UseCases;

use App\Models\Recipe;
use Illuminate\Support\Collection;

/**
 * レシピ一覧を取得
 *
 * @return Collection<Recipe>
 */
class GetRecipe
{
    public function __invoke(): Collection
    {
        return Recipe::query()
            ->with(['ingredients', 'how_to_makes'])
            ->get();
    }
}
