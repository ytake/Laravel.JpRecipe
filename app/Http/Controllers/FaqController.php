<?php

namespace App\Http\Controllers;

/**
 * Class FaqController
 *
 * @package App\Http\Controllers
 */
class FaqController extends Controller
{
    /**
     * @get("faq", as="faq.index")
     * @return \Illuminate\View\View
     */
    public function index()
    {
        view()->inject('title', config('recipe.title') . "FAQ");

        return view('home.faq.index');
    }
}
