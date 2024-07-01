<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    

    
    public function welcome()
    {        
        return view('welcome');
    }

    public function articles()
    {
        $title = 'Articoli';

        $titleIsVisible = false;

        return view('pages.articles', [
            'titleIsVisible' => $titleIsVisible,
            'title' => $title,
            'articles' => \App\Models\Article::all(),
            'message' => 'Ci sono 3 nuovi articoli! (da controller)',
        ]);
    }

    public function article(\App\Models\Article $article)
    {    
         //$article = \App\Models\Article::find($id); //cerca, di default, sul campo id
        
        // $article = \App\Models\Article::findOrFail($id); // se il record con $id non esiste allora 404

        return view('pages.article', ['article' => $article]);
    }

    public function aboutUs()
    {
        $title = 'Chi Siamo';

        $description = 'Descrizione della pagina Chi Siamo';

        /*return view('pages.aboutUs', [
            'title' => $title,
            'description' => $description,
        ]);*/

        return view('pages.aboutUs', compact('title', 'description'));

        /*
            compact('title', 'description') 

            equivale all'array (perché la funzione compact restituisce questo array):

            [
                'title' => $title,
                'description' => $description,
            ]
            
        */
    }
}