@extends('navbar')
<?php foreach($movie as $movie){ ?>
    @section('content')
        <div class="black justify-content-center d-flex" dir="rtl">
        <div class="details">
        <div class="row d-flex">
                <div class="detail_poster col"><img src="<?php echo $movie->poster ?>" width="320" height="480"></div>
                <div class="details col">
                <h3>{{$movie->movie_name}}</h3>
                <p>{{$movie->length}} خولەک , {{$movie->date}}</p>
                <div>
                    <h6>چەشن:</h6>
                    <p><?php
                        foreach ($movie->genre as $g) {
                            echo $g .'  ';
                        }
                    ?></p>
                </div>
                <div>
                    <h6>نمرە:</h6>
                    <p>IMDB: {{$movie->rating}}</p>
                </div>
                <div>
                    <h6>کاست:</h6>
                    <p>{{$movie->cast}}</p>
                </div>
                <div>
                    <h6>دەرهێنەر:</h6>
                    <p>{{$movie->producer}}</p>
                </div>
            </div>
            <!-- <div class="col"><h1 class="d-none">a</h1></div> -->
            <div class="details">
                <div>
                    <h6>کورتە:</h6>
                    <p>{{$movie->description}}</p>
                </div>
            <br>
            <hr>
            <h3 class="btn btn-warning trw">ترایلەر</h3><br>
            <div class="video-container"><?php echo$movie->trailer ?></div><br><hr>
            <h3 class="btn btn-warning trw">بینین</h3><br>
            <div class="video-container"><?php echo$movie->watch ?></div><br>
            </div>
        </div>
        </div>
        </div>
        <br>
<?php } ?>
@endsection
