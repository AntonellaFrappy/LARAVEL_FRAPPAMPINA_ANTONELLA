<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index', ['articles' => Article::all()]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)

    {
        //dd($request->all());
        $article = Article::create($request->all());

        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $fileName = uniqid('img_') . '.' . $request->file('image')->extension();

            // $fileName = $request->file('image')->getClientOriginalName();

            $path = 'public/images/articles/' . $article->id;

            $article->image = $request->file('image')->storeAs($path, $fileName);

            $article->save();

        }

        return redirect()->back()->with(['success' => 'Articolo creato correttamente']);
    }
}
