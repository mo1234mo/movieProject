<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $data = Movie::where('movie_name' , 'like' ,$request->search.'%')->take(10)->get();
        }
        $output ='';
        if (count($data)>0) {

            foreach($data as $data){
            $output .= '
            <a href="movie-'.$data->id.'" style="text-decoration: none;">
                <div class="search_card">
                    <img class="img-fluid rounded-start" src="'.$data->poster.'" alt="">
                    <div class="row card_text"><h6>'.$data->movie_name.'</h6><p dir="rtl">'.$data->description.'</p></div>
                </div>
            </a>
            ';
        }
        }
        else{
            $output .= '<div class="card_text"><h6>هیچ ئەنجامێک نەبوو</h6></div>';
        }
        return $output;
    }
    public function insert(Request $request)
    {
        // $genres = json_encode($request->genre);

        $insert_movie = Movie::create([
            'movie_name' => $request->movie_name,
            'rating' => $request->rating,
            'length' => $request->length,
            'ast' => $request->ast,
            'description' => $request->description,
            'cast' => $request->cast,
            'genre' => $request->genre,
            'producer' => $request->producer,
            'trailer' => $request->trailer,
            'watch' => $request->watch,
            'date' => $request->date,
            'poster' => $request->poster,
            'background' => $request->background,
        ]);
        $insert_movie->save();
        return back()->with('message', 'بە سەرکەوتوویی زیاد کرا');
    }
    public function update(Request $request)
    {
        // $genres = json_encode($request->genre);

        $update_movie = Movie::find($request->id)->update(
            [
            'movie_name' => $request->movie_name,
            'rating' => $request->rating,
            'length' => $request->length,
            'ast' => $request->ast,
            'description' => $request->description,
            'cast' => $request->cast,
            'genre' => $request->genre,
            'producer' => $request->producer,
            'trailer' => $request->trailer,
            'watch' => $request->watch,
            'date' => $request->date,
            'poster' => $request->poster,
            'background' => $request->background,
        ]
        );
        return redirect(route('admin'))->with('message', 'بە سەرکەوتوویی نوێکرایەوە');
    }
    public function delete(Request $request)
    {
        $movie = Movie::find($request->id);
        $movie->delete();
        return redirect(route('admin'))->with('message', 'سڕایەوە');
    }
    public function genreFilter(Request $request)
    {
        if ($request->genre == null) {
            $movies = Movie::orderby('id','desc')->paginate(18);
            return view('movies',['movies' => $movies,'filter'=>array() ,'page'=> 'home']);
        }
        $movies = Movie::whereJsonContains('genre', $request->genre)->orderby('id','desc')->paginate(18);
        return view('movies',['movies' => $movies , 'filter' => $request->genre ,'page' => 'home']);
    }
}

