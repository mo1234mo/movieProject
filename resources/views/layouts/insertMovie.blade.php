@extends('layouts.app')
@section('content')
<form method="post" class="text-white formfont" dir="rtl" action="{{route('insert')}}">
    @csrf
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
      <div class="col">
        <div class="form-outline">
            <label class="form-label" for="movie_name">ناوی فیلم</label>
          <input required type="text" name="movie_name" class="form-control" />
        </div>
      </div>
    </div>

    <!-- Text input required -->


    <!-- Text input required -->
    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                <label class="form-label" for="rating">ڕەیتینگ</label>
              <input required type="text" step="0.1" min="0" name="rating" class="form-control" />
            </div>
           </div>
           <div class="col">
            <div class="form-outline">
                <label class="form-label" for="length">ماوەی فیلم</label>
              <input required type="number" name="length" class="form-control" />
            </div>
           </div>
           <div class="col">
            <div class="form-outline">
           <label class="form-label" for="ast">ئاستی فیلم</label>
            <input required type="text" name="ast" class="form-control" />
        </div>
    </div>
    </div>
    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                <label class="form-label" for="cast">کاست</label>
              <input required type="text" name="cast" class="form-control" />
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <label class="form-label" for="producer">دەرهێنەر</label>
              <input required type="text" name="producer" class="form-control" />
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
                <?php for ($i = 0 ; $i < count($genres)/2 ; $i++) {  ?>
                <label for="genre">
                    <input type="checkbox" id="aGenre" name="genre[]" value="<?php echo $genres[$i]; ?>"
                    />{{$genres[$i]}}
                </label>
                <?php } ?>
                </div>
                <div class="col">
                <?php for ($i = count($genres)-(count($genres)/2) ; $i < count($genres) ; $i++) {
                ?>
                <label for="genre">
                    <input type="checkbox" id="aGenre" name="genre[]" value="<?php echo $genres[$i]; ?>"
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
                <input required type="text" name="trailer" class="form-control" />
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <label class="form-label" for="watch">لینکی بینین</label>
              <input required type="text" name="watch" class="form-control" />
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
                <input required type="text" name="poster" class="form-control" />
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
                <input required type="text" name="background" class="form-control" />
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <label class="form-label" for="date">بەرواری دەرچوون</label>
              <input required type="date" name="date" class="form-control"/>
            </div>
        </div>
    </div>

    <!-- Message input required -->
    <div class="form-outline mb-4">
      <label class="form-label" for="description">کورتەی فیلم</label>
      <textarea class="form-control" name="description" rows="4"></textarea>
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-warning form-control mb-4">زیادکردن</button>
  </form>
  @if(Session::has('message'))
  <div class="alert alert-success d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div>
      {{Session::get('message')}}
    </div>
  @endif
@endsection
