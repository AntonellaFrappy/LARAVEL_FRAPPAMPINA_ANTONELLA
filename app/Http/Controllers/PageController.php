<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private $articles;

    public function __construct()
    {
        $this->articles = [
            1 => ['title' => 'Titolo articolo #1', 'category' => 'Viaggi', 'description' => '...', 'visible' => true],
            2 => ['title' => 'Titolo articolo #2', 'category' => 'Concorsi', 'description' => '...', 'visible' => true],
            3 => ['title' => 'Titolo articolo #3', 'category' => 'Cronaca', 'description' => '...', 'visible' => true],
            4 => ['title' => 'Titolo articolo #4', 'category' => 'Meteo', 'description' => '...', 'visible' => true],
        ];
    }

    public function welcome()
    {
        //dump e die
        //dd($this->articles);
        
        return view('welcome');
    }

    public function articles()
    {
        $title = 'Articoli';

        $titleIsVisible = false;

        return view('pages.articles', [
            'titleIsVisible' => $titleIsVisible,
            'title' => $title,
            'articles' => $this->articles,
        ]);
    }

    public function article($id)
    {    
        if(! array_key_exists($id, $this->articles)) {
            abort(404); // questa funzione restituisce una pagina di errore 404
        }
    
        $article = $this->articles[$id];
    
        return view('pages.article', ['article' => $article]);
    }

    

    public function aboutUs()
    {

        $title="Chi siamo";
        $description = 'Descrizione della pagina Chi Siamo';

        /*return view('pages.aboutUs', [
            'title'=>$title,
            'description' => $description,
        ]);
        */
        return view ('pages.aboutUs', compact ('title', 'description'));
    }
}