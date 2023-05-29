<?php

namespace App\Http\Controllers;
use App\Models\Movie;

class HomeController extends Controller
{
    public function home()
    {
        $movies = Movie::orderby('id','desc')->take(12)->get();
        return view('home',['movies' => $movies, 'page'=> 'home']);
    }
    public function movies()
    {
        $movies = Movie::paginate(1);
        return view('movies',['movies' => $movies, 'page'=> 'home']);
    }
    public function movieDetail($id)
    {
        $movie = Movie::where('id', $id)->get();
        return view('detail',['movie' => $movie, 'page'=> 'movie detail']);
    }
    public function movie()
    {
        return view('movies/movie', ['page'=> 'movie']);
    }
}
