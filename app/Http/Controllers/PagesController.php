<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function horaire ()
    {
        return view('horaire')->with([
            'horaires' => [
                ['Lundi', 'Sur rendez-vous'],
                ['Mardi', 'Sur rendez-vous'],
                ['Mercredi', 'Sur rendez-vous'],
                ['Jeudi', 'Sur rendez-vous'],
                ['Vendredi', 'De 10h à 18h'],
                ['Samedi', 'Sur rendez-vous'],
                ['Dimanche', 'Fermé']
            ]
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function tarifs()
    {
        return view('tarifs');
    }

    public function galerie()
    {
        $articles = \App\Article::all();

        return view('galerie', [
            'confections' => $articles->where('ref_typeArticle', '=', 1),
            'reparations' => $articles->where('ref_typeArticle', '=', 2),
            'retouches' => $articles->where('ref_typeArticle', '=', 3)
        ]);
    }
}
