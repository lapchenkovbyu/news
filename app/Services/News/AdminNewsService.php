<?php
declare(strict_types=1);

namespace App\Services\News;


use App\Article;
use App\Http\Requests\CreateArticleRequest;
use App\Support\Abstracts\NewsServiceInterface;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response;

class AdminNewsService implements NewsServiceInterface
{
    /**
     * @return Collection
     */
    function getNews(): Collection
    {
        return Article::orderBy('created_at', 'desc')->get();
    }

    /**
     * @param CreateArticleRequest $request
     * @return Response
     */
    function createArticle(CreateArticleRequest $request): Response
    {
        try {
            $article = Article::create([
                'heading' => $request->get('heading'),
                'text' => $request->get('text'),
                'hidden' => $request->get('hidden'),
            ]);
        } catch (\Exception $exception){
            abort(500, $exception->getMessage());
        }

        if ($article->exists)
            return \response()->json($article);
        else abort(500, 'Something went wrong');
    }
}
