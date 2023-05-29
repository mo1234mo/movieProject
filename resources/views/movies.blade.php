@extends('navbar')
@section('content')
<?php $genres = ['ئەکشن','دراما','مێژوویی','ڕۆمانسی','نهێنی','هەست بزوێن','ترسناک','تاوان','سەرکێشی','خەیاڵی','بەڵگەنامەیی','ئەنیمەیشن','میوزیک','کۆمیدی','خێزانی','جەنگ','ڕۆژئاوایی','وەرزشی','زانستی خەیاڵی','ژیاننامە','هیندی','فارسی','کۆری','چینی','یابانی','تورکی','ئەنیمی','عەرەبی']; ?>

    <!-- Number input required -->
    <form action="/genre-filter" method="post" dir="rtl" class="d-flex">
        @csrf
    <div class="form-outline mb-4 ">
        <div class="multipleSelection" dir="rtl">
            <div class="selectBox" onclick="showCheckboxes()">
                <select>
                    <option id="zhanar">چەشن</option>
                </select>
                <div class="overSelect"></div>
            </div>
            <div id="checkBoxes">
                <div class="d-flex">
                <div class="col">
                <?php for ($i = 0 ; $i < count($genres)/2 ; $i++) { 
                $checked = ''; ?>
                @if(Session::has('filter'))
                <?php if(in_array($genres[$i], $filter)){
                    $checked = "checked";
                }
                ?>
                @endif
                <label for="genre">
                    <input type="checkbox" id="aGenre" name="genre[]" <?php echo $checked; ?> value="<?php echo $genres[$i]; ?>" 
                    />{{$genres[$i]}}
                </label>
                <?php } ?>
                </div>
                <div class="col">
                <?php for ($i = count($genres)/2 ; $i < count($genres) ; $i++) { 
                $checked = ''; ?>
                @if(Session::has('filter'))
                <?php if(in_array($genres[$i], $filter)){
                    $checked = "checked";
                }
                ?>
                @endif
                <label for="genre">
                    <input type="checkbox" id="aGenre" name="genre[]" <?php echo $checked; ?> value="<?php echo $genres[$i]; ?>" 
                    />{{$genres[$i]}}
                </label>
                <?php } ?>
                </div>
                </div>
            <button class="btn btn-warning" type="submit"><i class="bi bi-search"></i></button>
            </div>
        </div>
    </div>
    </form>
<div><h1 class="line mt-4 justify-content-center">
            <hr width="550px">فیلمەکان
            <hr width="550px">
        </h1>
        <div class="justify-content-center">
            <div class="row justify-content-center">
                <?php foreach($movies as $movie) { ?>
                <a href="movie-<?php echo $movie->id ?>" class="card-a">
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
                                            <p><button>IMDB: {{$movie->rating}}</button></p>
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
    <div class="justify-content-center">
        <?php echo $movies->onEachSide(1)->links('pagination') ?>
    </div>
    </div>
</div>

@endsection
