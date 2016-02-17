<?php

namespace App\Http\Controllers\Blog;

use App\Model\Article;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Post;
use Carbon\Carbon;


class BlogController extends Controller
{
    public function index()
    {


        $lastArticleUpdatetime =  Carbon::now();
        $articles = Article::where('published_at', '<=', Carbon::now())
            ->orderBy('updated_at', 'desc')->limit(config('blog.articles_per_page'))->get();


        if(count($articles) == config('blog.articles_per_page'))
        {
            $lastArticleUpdatetime = $articles[config('blog.articles_per_page') -1]->updated_at;

        }

        return view('blog.index', ['articles' => $articles,'lastArticleUpdatetime' => $lastArticleUpdatetime]);
    }

    public function showPost($slug)
    {

        $article = Article::whereSlug($slug)->firstOrFail();

        return view('blog.article')->withArticle($article);
    }

}
