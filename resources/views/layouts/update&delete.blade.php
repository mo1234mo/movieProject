@extends('home')
@section('u&d')

@if($movie)
<form class="text-white formfont" method="post" action="update" dir="rtl" id="update">
    @csrf
    
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
      <div class="col">
        <div class="form-outline">
            <label class="form-label" for="movie_name">ناوی فیلم</label>
          <input required type="text" value="{{$movie->movie_name}}" name="movie_name" class="form-control" />
          <input style="display: none;" required type="number" value="{{$movie->id}}" name="id" class="form-control" />
        </div>
      </div>
    </div>

    <!-- Text input required -->


    <!-- Text input required -->
    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                <label class="form-label" for="rating">ڕەیتینگ</label>
              <input required type="text" value="{{$movie->rating}}" step="0.1" min="0" name="rating" class="form-control" />
            </div>
           </div>
           <div class="col">
            <div class="form-outline">
                <label class="form-label" for="length">ماوەی فیلم</label>
              <input required type="number" value="{{$movie->length}}" name="length" class="form-control" />
            </div>
           </div>
           <div class="col">
            <div class="form-outline">
           <label class="form-label" for="ast">ئاستی فیلم</label>
            <input required type="text" name="ast" class="form-control" value="{{$movie->ast}}"/>
        </div>
    </div>
    </div>
    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                <label class="form-label" for="cast">کاست</label>
              <input required type="text" name="cast" class="form-control" value="{{$movie->cast}}"/>
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <label class="form-label" for="producer">دەرهێنەر</label>
              <input required type="text" name="producer" class="form-control" value="{{$movie->producer}}"/>
            </div>
        </div>
    </div>

    <!-- Email input required -->

    <?php $genres = ['ئەکشن','دراما','مێژوویی','ڕۆمانسی','نهێنی','هەست بزوێن','ترسناک','تاوان','سەرکێشی','خەیاڵی','بەڵگەنامەیی','ئەنیمەیشن','میوزیک','کۆمیدی','خێزانی','جەنگ','ڕۆژئاوایی','وەرزشی','زانستی خەیاڵی','ژیاننامە','هیندی','فارسی','کۆری','چینی','یابانی','تورکی','ئەنیمی','عەرەبی']; ?>

    <!-- Number input required -->
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
                $checked = '';    
                if(in_array($genres[$i], $movie->genre)){
                    $checked = "checked";
                }
                ?>
                <label for="genre">
                    <input type="checkbox" id="aGenre" name="genre[]" <?php echo $checked; ?> value="<?php echo $genres[$i]; ?>" 
                    />{{$genres[$i]}}
                </label>
                <?php } ?>
                </div>
                <div class="col">
                <?php for ($i = count($genres)-(count($genres)/2) ; $i < count($genres) ; $i++) { 
                $checked = '';    
                if(in_array($genres[$i], $movie->genre)){
                    $checked = "checked";
                }
                ?>
                <label for="genre">
                    <input type="checkbox" id="aGenre" name="genre[]" <?php echo $checked; ?> value="<?php echo $genres[$i]; ?>" 
                    />{{$genres[$i]}}
                </label>
                <?php } ?>
                </div>
                </div>
            </div>
        </div>
        </div>
    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                <label class="form-label" for="trailer">لینکی ترایلەر</label>
                <input required type="text" name="trailer" class="form-control" value="{{$movie->trailer}}" />
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <label class="form-label" for="watch">لینکی بینین</label>
              <input required type="text" name="watch" class="form-control" value="{{$movie->watch}}" />
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <label class="form-label" for="watch">ئێمبێدکردن</label>

               <a href="https://autoembed.to/" target="_blank" rel="noopener noreferrer" class="btn btn-warning form-control">سێرڤەر</a>
        </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                <label class="form-label" for="poster">لینکی پۆستەر</label>
                <input required type="text" name="poster" class="form-control" value="{{$movie->poster}}" />
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <label class="form-label" for="watch">ئێمبێدکردن</label>

                <a href="https://autoembed.to/" target="_blank" rel="noopener noreferrer" class="btn btn-warning form-control">پۆستەر</a>
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <label class="form-label" for="background">لینکی باکگراوند</label>
                <input required type="text" name="background" class="form-control" value="{{$movie->background}}" />
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <label class="form-label" for="date">بەرواری دەرچوون</label>
              <input required type="date" name="date" class="form-control" value="{{$movie->date}}"/>
            </div>
        </div>
    </div>

    <!-- Message input required -->
    <div class="form-outline mb-4">
      <label class="form-label" for="description">کورتەی فیلم</label>
      <textarea class="form-control" name="description" rows="4">{{$movie->description}}</textarea>
    </div>
    <button form="update" type="submit" class="btn btn-success form-control mb-4">نوێکردنەوە</button>
  </form>
  <div style="position: relative;">
  <div id="deleteModal" class="modal container" style="font-family: speda; margin: 0; top: 50%; left: 50%; margin-right: -50%; transform: translate(-50%, -50%);">
  <div class="modal-content">
      <h2 style="color: white; padding: 10px;">سڕینەوەی فیلم</h2>
      <span class="close">&times;</span>
    <div class="modal-body">
      <p style="color: white;">دەتەوێ ئەم فیلمە بسڕیتەوە؟</p>
    </div>
    <div class="modal-footer">
      <form method="post" action="delete" id="delete"> 
        @csrf
        <input style="display: none;" required type="number" value="{{$movie->id}}" name="id" class="form-control" /> 
      <button form="delete" type="submit" class="btn btn-danger" id="deleteBtn">سڕینەوە</button>
      </form>
      <button class="btn btn-warning" id="cancelBtn">پاشگەزبوونەوە</button>
    </div>
  </div>
</div>
</div>
  <button style="font-family: speda;" id="deleteTrigger" class="btn btn-danger form-control mb-4">سڕینەوە</button>

@else
<div class="justify-content-center"><h1 style="color: white; margin-top: 100px;">هیچ فیلمێک نەدۆزرایەوە!!!</h1></div>
@endif
@endsection