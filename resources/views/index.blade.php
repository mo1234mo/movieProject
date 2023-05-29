@extends('navbar')
@section('content')
<h1 class="line mt-4 justify-content-center">
            <hr width="550px">نوێترین فیلم
            <hr width="550px">
        </h1>
        <div class="justify-content-center">
            <div class="row justify-content-center">
                <?php foreach($movies as $movie) { ?>
                <a href="movie-<?php echo $movie->id; ?>" class="card-a" style="text-decoration: none;">
                            <div class="poster">
                                <p class="name">{{$movie->movie_name}}</p>
                                <div class="card-in">
                                    <div class="card-front">
                                        <img src="<?php echo $movie->poster ?>" alt="">
                                    </div>
                                    <div class="card-back">
                                        <br>
                                        <h5>{{$movie->movie_name}}</h5>
                                        <div dir="rtl">
                                            <p>هەڵسەنگاندن:</p>
                                            <p><button>IMDB:{{$movie->rating}}</button></p>
                                        </div>
                                        <p>ماوە: {{$movie->length}} خولەک</p>
                                        <div style="display: flex; margin-right: 50px;" dir="rtl">
                                            <p dir="rtl" style="margin-left: 10px;">ئاست: <p>{{$movie->ast}}</p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a><?php } ?>
            </div>


                    </div>
@endsection
