<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public final function allNews() {
        return view('pages.news.allNews');
    }

    public final function createArticle() {
        return view('pages.news.createArticle');
    }
}
