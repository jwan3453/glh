<?php

namespace App\Http\Controllers\Blog;

use Carbon\Carbon,Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Article;
use App\User;
use App\Jobs\PostFormFields;



class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::paginate(10);

        return view('admin.article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //$data = $this->dispatch(new PostFormFields());

        $article = new Article();
        return view('admin.article.create', compact('article'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $article = [
            'title' =>$request->input('title'),
            'author' => User::find(Auth::id())->username,
            'content_raw' =>$request->input('editorValue'),
            'content_html' => $request->input('editorValue'),
            'page_image'=>$request->input('coverImage'),
            'published_at' => carbon::now()
        ];
        Article::create($article);
        return redirect('/admin/article');

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $article = Article::find($id);

        return view('admin.article.edit',compact('article'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $article = Article::findOrFail($id);
        $article->title = $request->input('title');
        $article->content_raw = $request->input('editorValue');
        $article->content_html = $request->input('editorValue');
        $article->page_image =  $request->input('coverImage');
        $article->save();

        return redirect('/admin/article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
