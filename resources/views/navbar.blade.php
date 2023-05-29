<html lang="ku">
<head>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if($page == 'movie detail')
        <title><?php echo $movie->movie_name ?></title>
        <!-- <link rel="stylesheet" href="../assets/css/detail.css"> -->
    @elseif($page == 'home')
        <title>Top Film</title>
    @endif
</head>
<body @if($page == 'movie detail') style="background-image: url(<?php echo $movie->background; ?>)" class="detail_body" @elseif($page == 'home') @endif>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark" dir="rtl">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo route('index'); ?>">Top Film</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo route('index'); ?>">سەرەکی</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="<?php echo route('movies'); ?>">فیلم</a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control ms-2" type="" aria-label="Search" id="search" placeholder="گەڕان">
                </form>
            </div>
        </div>
    </nav>
    <div class="col data_search d-none" >

    </div>
        @yield('content')
    </div>
</body>
<footer class="bottom footer">
    <div class="card" style="background-color: #222325">
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <footer class="">Top Film</footer>
          </blockquote>
        </div>
      </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js" integrity="sha512-4WpSQe8XU6Djt8IPJMGD9Xx9KuYsVCEeitZfMhPi8xdYlVA5hzRitm0Nt1g2AZFS136s29Nq4E4NVvouVAVrBw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    $(document).ready(function(){
        // $("#search").focusin(function(){
        //     $('.data_search').removeClass('d-none');
        // });
        if ($('#search').val == '') {
            $('.data_search').addClass('d-none');
        }
        else{
            $("#search").on("keyup", function() {
                var search = $('#search').val();
                if (search == '') {
                    $('.data_search').addClass('d-none');
                }
                else{
                $('.data_search').removeClass('d-none');
                $.ajax({
                    url:"search",
                    type:"GET",
                    data:{'search' :search},
                    success:function(data){
                        $('.data_search').html(data);
                    }
                })
            }
            });
        }
        // $("#search").focusout(function(){
        //     $('.data_search').addClass('d-none');
        // });

    });
</script>
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
</html>
