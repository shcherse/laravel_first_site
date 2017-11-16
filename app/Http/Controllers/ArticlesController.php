<?php

namespace App\Http\Controllers;

use App\Article;
//use App\Http\Requests;
//use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
//use Request;
//use Illuminate\HttpResponse;
//use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);
    }

    public function index()
    {
        //return \Auth::user()->name;
        $articles = Article::latest('published_at')->published()->get();
        $latest = Article::latest()->first();
        return view('articles.index', compact('articles', 'latest'));
    }

    public function show(Article $article)
    {
        //dd($id);
        //$article = Article::findOrFail($id);

        //dd($article->published_at);

        return view('articles.show', compact('article'));
    }

    public function create()
    {

         /*
        if (Auth::guest())
        {
            return redirect('articles');
        }
        */
        $tags = \App\Tag::pluck('name', 'id');
        return view('articles.create', compact('tags'));
    }

    /**
     * @param CreateArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request)
    {
        //dd($request->input('tags'));
       // $article = new Article($request->all());
       // Auth::user()->articles()->save($article);

        $this->createArticle($request);

        //$article = Auth::user()->articles()->create($request->all());

        //$this->syncTags($article, $request->input('tags'));
        //$tagIds = $request->input('tags');

        //$article->tags()->attach($request->input('tags')); //$article->tags()->attach($tagIds);
        //\Session::flash('flash_message', 'Your article has been created!');
        //session()->flash('flash_message', 'Your article has been created!');
        //session()->flash('flash_message_important', true);
        //flash('Your article has been created');
        //flash()->success('Your article has been created');
        flash()->overlay('Your article has been successfully created!', 'Good Job ');
        //$input = Request::all();
       //$input['published_at'] = Carbon::now();
       // Article::create($request->all());
        return redirect('articles');
        //return redirect('articles')->with([
           // 'flash_message' => 'Your article has been created!',
           // 'flash_message_important' => true
       // ]);
    }

    public function edit(Article $article)
    {
        //$article = Article::findOrFail($id);
        $tags = \App\Tag::pluck('name', 'id');
        return view('articles.edit', compact('article', 'tags'));
    }

    public function update(Article $article, ArticleRequest $request)
    {
        //$article = Article::findOrFail($id);

        $article->update($request->all());

        $this->syncTags($article, $request->input('tags'));

        return redirect('articles');
    }

    /**
     * @param Article $article
     * @param ArticleRequest $request
     * @return array
     */
    private function syncTags(Article $article, array $tags)
    {
        return $article->tags()->sync($tags);
    }

    private function createArticle(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('tags'));

        return $article;
    }
}
