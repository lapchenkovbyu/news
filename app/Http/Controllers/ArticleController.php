<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use App\Support\Abstracts\NewsServiceInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param NewsServiceInterface $newsService
     * @return JsonResponse
     */
    public function getArticles(NewsServiceInterface $newsService): JsonResponse
    {
        return response()->json($newsService->getNews());
    }

    /**
     * @param NewsServiceInterface $newsService
     * @param CreateArticleRequest $request
     * @return Response
     */
    public function createArticle(NewsServiceInterface $newsService, CreateArticleRequest $request): Response
    {
        return $newsService->createArticle($request);
    }
}
