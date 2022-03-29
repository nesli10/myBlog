<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>anasayfa</title>
    <link href="{{ asset('assets/css/blog.css') }}" rel="stylesheet">
</head>
<body >
<header>

    <div class="container">
        
        <div class="profile">

            <div class="profile-image">

                <img class="profile-pic" src="{{asset('assets/images/faces')}}/{{$biyografi->foto}}" width="200" height="200"/>

            </div>

            <div class="profile-user-settings">

                <h1 class="profile-user-name">{{ $biyografi->isim }}</h1>

                <a href="/admin">
                    <button class="btn profile-edit-btn">admin</button>
                </a>

            </div>
            <div class="profile-bio">

                <p> {{ $biyografi->aciklama }}</p>

            </div>

        </div>
        <!-- End of profile section -->

    </div>
    <!-- End of container -->

</header>

<main>

    <div class="container">

        <div class="gallery">
            @foreach($foto as $f)
            <div class="gallery-item" tabindex="0">
                <img  class="gallery-image" src="{{asset('assets/images/posts')}}/{{$f->foto}}" />
                <div class="gallery-item-info">
                    {{$f->aciklama}}
                </div>
            </div>
            @endforeach
        </div>
        <!-- End of gallery -->
        <div class="loaderArea">
        </div>
    </div>
    <!-- End of container -->
    <div class="zoomModal">
            <span class="close">&times;</span>
            <img src="">
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</main>
<script>
    $("body").on("click", ".gallery-item", function() {
        let image = $(this).find("img").attr("src");
        $(".zoomModal img").attr("src", image);
        $(".zoomModal").css("display", "block");
    });
    $(".zoomModal .close").on("click", function() {
        $(".zoomModal img").attr("src", "");
        $(".zoomModal").css("display", "none");
    })
    let ajaxRequest = true;
    let ajaxQueue = true;
    let offset = 12;
    let limit = 12;
    $(window).scroll(function () {
        if ($(window).scrollTop() >= ($(document).height() - $(window).height())) {
            if(ajaxRequest == true && ajaxQueue == true) {
                ajaxQueue = false;
                $(".loaderArea").append('<div class="loader"></div>');
                $.ajax({
                    type: "GET",
                    url: "{{route("getFoto")}}/" + offset + "/" + limit,
                    success: function(result) {
                        offset += result.length;
                        if(result.length > 0)
                        {
                            result.forEach(function(foto) {
                               $(".gallery").append('' +
                                   ' <div class="gallery-item" tabindex="0">' +
                                   '<img  class="gallery-image" src="{{asset("assets/images/posts")}}/' + foto.foto +'" />' +
                                   ' <div class="gallery-item-info">' +
                                   foto.aciklama +
                                   '</div>' +
                                   '</div>');
                            });
                        }
                        else ajaxRequest = false;
                        ajaxQueue = true;
                        $(".loaderArea").html("");
                    }
                });
            }
        }})
</script>
</body>
</html>
