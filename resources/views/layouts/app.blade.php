<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/adminStyle.css">
    <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js" integrity="sha512-4WpSQe8XU6Djt8IPJMGD9Xx9KuYsVCEeitZfMhPi8xdYlVA5hzRitm0Nt1g2AZFS136s29Nq4E4NVvouVAVrBw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background-position: center;background-size: cover;background-repeat: no-repeat;background: rgb(32,1,34);background: linear-gradient(90deg, rgba(32,1,34,1) 0%, rgba(111,0,0,1) 100%);">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   Top Film
                    {{-- {{ config('app.name', 'Laravel') }} --}}
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif


                        @else
                            <li class="">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        {{-- SIDE BAR {{ --}}
        @guest
        @if (Route::has('login'))
        @endif
        @else

        <div class="container-fluid sidebar" dir="rtl">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <li class="nav-item">
                                <a href="{{route('admin')}}" class="nav-link align-middle px-0">
                                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline text-white text-decoration-none">سەرەکی</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('insertMovie')}}" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-upload"></i> <span class="ms-1 d-none d-sm-inline text-white text-decoration-none">زیادکردنی فیلم</span></a>
                            </li>
                            @if (Auth::user()->manager == true)
                            <li>
                                <a href="{{ route('register') }}" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline text-white text-decoration-none">زیادکردنی ئەدمین</span> </a>
                            </li>
                            @endif
                            <li>
                                <a href="{{ route('trash') }}" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-trash3"></i> <span class="ms-1 d-none d-sm-inline text-white text-decoration-none">سڕاوەکان</span> </a>
                            </li>
                            <li>
                                <a class="nav-link px-0 align-middle" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fs-4 bi-box-arrow-right"></i><span class="ms-1 d-none d-sm-inline text-white text-decoration-none"> چوونە دەرەوە</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>
                        </ul>
                        <hr>
                    </div>
                </div>
                <div class="col py-3">
                    @yield('content')
                </div>
            </div>
        </div>
        @endguest
        {{-- SIDE BAR }} --}}

        <div class="col py-3">
            @yield('login')
        </div>
    </div>
</body>
<script>
    var show = true;
    var show2 = true;

    function showCheckboxes() {
        var checkboxes =
            document.getElementById("checkBoxes");

        if (show) {
            checkboxes.style.display = "block";
            show = false;
        } else {
            checkboxes.style.display = "none";
            show = true;
        }
    }
</script>
<footer class="fixed-bottom">
    <div class="card" style="background-color: #222325">
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <footer class="footer">Top Film</footer>
          </blockquote>
        </div>
      </div>
</footer>
<script>
var modal = document.getElementById("deleteModal");

// Get the button that opens the modal
var deleteTrigger = document.getElementById("deleteTrigger");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// Get the delete button
var deleteBtn = document.getElementById("deleteBtn");

// Get the cancel button
var cancelBtn = document.getElementById("cancelBtn");

// When the user clicks the delete trigger, open the modal
deleteTrigger.onclick = function() {
  modal.style.display = "flex";
  modal.style.position = "fixed";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks the delete button, delete the record
deleteBtn.onclick = function() {
  // Delete the record here
  modal.style.display = "none";
}

// When the user clicks the cancel button, close the modal
cancelBtn.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</html>

