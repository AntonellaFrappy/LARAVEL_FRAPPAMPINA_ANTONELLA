<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function store()
    {
        /* 1 METODO
        $article = new Article();

        $article->title = 'Sono un articolo';
        $article->category = 'Sport';
        $article->description = 'Nuovo database';
        $article->body = 'Sono il contenuto';
        $article->visible = true;
        

        $article->save();
        */
        //2 metodo
        Article::create([
        'title'=>'Secondo articolo',
        'category'=>'Astronomia',
        'description'=>'...',

        ]);
        //Article::create ($request->all());
        
        
    }
}
