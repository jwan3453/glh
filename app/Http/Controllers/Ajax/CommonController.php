<?php namespace App\Http\Controllers\Ajax;

use App\Http\Requests;
use App\Http\Controllers\Controller;



use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Model\Article, App\Model\City, App\Model\Province, Carbon\Carbon, Qiniu\Auth as QiniuAuth;



class CommonController extends Controller {

    public function loadMoreArticle(Request $request)
    {
        $lastArtilceUpdateTime = $request->input('lastArticleUpdateTime');
        $articles = Article::where('published_at', '<=', Carbon::now())->where('updated_at', '<', $lastArtilceUpdateTime)
            ->orderBy('updated_at', 'desc')->limit(config('blog.articles_per_page'))->get();

        return response()->json(array(
            'articles' => $articles,

        ));

    }

    public function loadCityProvince()
    {
        $cities = City::all()->toArray();
        $provinces = Province::all()->toArray();
        return response()->json(array(
            'cities' => $cities,
            'provinces' => $provinces
        ));
    }



}