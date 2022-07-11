<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    /**
     *
     * @return View
     */
    public function init(): View
    {
        return view('recipe.home');
    }
}
