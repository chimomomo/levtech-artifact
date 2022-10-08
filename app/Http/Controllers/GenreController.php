<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function listup(Genre $genre)
    {
        return view('genres/list')->with(['genres' => $genre->get()]);
    }
    
    public function index(Genre $genre)
    {
        return view('genres/index')->with(['games' => $genre->getByGenre()]);
    }
}
