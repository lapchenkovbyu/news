<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Support\Abstracts\NewsServiceInterface;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param NewsServiceInterface $newsService
     * @return Renderable
     */
    public function index(NewsServiceInterface $newsService)
    {
        return view('home', ['news'=>$newsService->getNews()]);
    }
}
