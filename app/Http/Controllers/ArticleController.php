<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index', ['articles' => Article::all()]);
    }

    public function create()
    {
        return view('articles.create', ['categories'=>Category::all()]);
    }

    public function store(StoreArticleRequest $request)

    {
        //dd($request->all());
        $article = Article::create(
            array_merge (
                $request->all(), 
                ['user_id'=>auth()->user()->id]
            )
        );

        
        $article->categories()->attach($request->categories);

        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $fileName = uniqid('img_') . '.' . $request->file('image')->extension();

            // $fileName = $request->file('image')->getClientOriginalName();

            $path = 'public/images/articles/' . $article->id;

            $article->image = $request->file('image')->storeAs($path, $fileName);

            $article->save();

        }

        return redirect()->back()->with(['success' => 'Articolo creato correttamente']);
    }
    public function edit(Article $article)
    {
        if($article->user_id !== auth()->user()->id) {
            abort(403);
        }
        return view('articles.edit', ['article' => $article, 'categories' => \App\Models\Category::all()]);
    }
    public function update(StoreArticleRequest $request, Article $article)
    {
        if($article->user_id !== auth()->user()->id) {
            abort(403);
        }
        
        $article->update($request->all());

        $article->categories()->detach(); // elimina i collegamenti alle categorie del singolo articolo selezionato
        
        // $article->categories()->detach(1);
            // elimina il collegamenti alla singola categoria con id 1 del singolo articolo selezionato
        
        // $article->categories()->detach([1, 3]);
            // elimina il collegamenti agli id delle categorie indicate nell'array del singolo articolo selezionato
        
        $article->categories()->attach($request->categories);

        return redirect()->back()->with(['success' => 'Articolo modificato correttamente']);
    }

    public function destroy(Article $article)
    {
        if($article->user_id !== auth()->user()->id) {
            abort(403);
        }

        $article->categories()->detach();

        $article->delete();

        return redirect()->route('articles.index')->with(['success' => 'Articolo cancellato correttamente']);
    }
}