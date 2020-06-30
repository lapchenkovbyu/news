<?php
declare(strict_types = 1);

namespace App\Services\News;


use App\Article;
use App\Http\Requests\CreateArticleRequest;
use App\Scopes\Atricle\WithoutHiddenScope;
use App\Support\Abstracts\NewsServiceInterface;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response;

class UserNewsService implements NewsServiceInterface
{
    /**
     * @return Collection
     */
    function getNews(): Collection
    {
        return Article::addGlobalScope(WithoutHiddenScope::class)->orderBy('created_at', 'desc')->get();
    }

    /**
     * @param CreateArticleRequest $request
     * @return Response
     */
    function createArticle(CreateArticleRequest $request): Response
    {
        abort(401, 'User is not authorized to create articles');
    }
}
