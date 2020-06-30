<?php
declare(strict_types = 1);

namespace App\Support\Abstracts;


use App\Http\Requests\CreateArticleRequest;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response;

interface NewsServiceInterface
{
    function getNews():Collection;

    function createArticle(CreateArticleRequest $request):Response;

}
