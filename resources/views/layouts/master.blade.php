<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Laravel Blog Project">
    <meta name="author" content="Amr Aboshaisha">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel Blog</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <!-- <link href="css/app.css" rel="stylesheet"> -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" > -->
    <link rel="stylesheet" href="{{ URL::asset('/css/app.css') }}" />
  </head>

    <body>


      @include ('layouts.nav')

        @if($flash = session('message'))
        <div class="alert alert-success" id="flash-message" role="alert">
        {{$flash}}
        </div>
        @endif

         @if($flash = session('error'))
        <div class="alert alert-danger" id="flash-message" role="alert">
        {{$flash}}
        </div>
        @endif

        <div class="container">
          <div class="row">

            <!-- Post Content Column -->
              <div class="col-lg-8">

              @yield ('content')



              </div>
              <!-- /.Post Content Column -->

            @include ('layouts.sidebar')
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->

      @include ('layouts.footer')
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
      <!-- <script src="{{ asset('/js/main.js') }}"></script> -->
      <script type="text/javascript">
      if (document.readyState === "complete") {
              CKEDITOR.replace('article-ckeditor');
          } else {

              document.addEventListener("DOMContentLoaded", function () {
                  CKEDITOR.replace('article-ckeditor');
              }, false);
          }
      </script>
    </body>
</html>
