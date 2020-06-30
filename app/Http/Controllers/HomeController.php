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
     * Create a new controller instance.
     *
     * @param NewsServiceInterface $newsService
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(NewsServiceInterface $newsService)
    {
//        dd($newsService);
        return view('home');
    }
}
