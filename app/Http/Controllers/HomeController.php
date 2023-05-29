<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    //    $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin()
    {
        return view('home');
    }
    public function insertMovie()
    {
        return view('layouts.insertMovie');
    }
    public function home()
    {
        $movies = Movie::orderby('id','desc')->take(12)->get();
        return view('index',['movies' => $movies, 'page'=> 'home']);
    }
    public function movies()
    {
        $movies = Movie::orderby('id','desc')->paginate(18);
        return view('movies',['movies' => $movies, 'filter'=>array() ,'page'=> 'home']);
    }
    public function trash()
    {
        $movies = Movie::onlyTrashed()->orderby('id','desc')->paginate(18);
        return view('movies',['movies' => $movies, 'page'=> 'home']);
    }
    public function movieDetail($id)
    {
        $movie = Movie::where('id', $id)->get();
        return view('detail',['movie' => $movie , 'page'=> 'movie detail']);
    }
    public function movie()
    {
        return view('movies/movie', ['page'=> 'movie']);
    }
    public function adminDetail(Request $request)
    {
        $movie = Movie::find($request->search);
        return view('layouts.update&delete', ['movie' => $movie]);
    }
    // public function moviesFiltered($a=array())
    // {
    //     return view('movies', ['movies' => $a]);
    // }
}
