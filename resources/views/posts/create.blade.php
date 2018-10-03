@extends ('layouts.master')


@section ('content')

    <h1>Publish a Post</h1>
<hr>

<form method="POST" action="/posts" enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="form-group">
        <label for="exampleInputEmail1">Title:</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>

    <div class="form-group">
        <label for="body">Body:</label>
        <textarea name="body" id="article-ckeditor" class="form-control" required></textarea>
    </div>

    <div class="form-group">
    <input type="file" name="cover_image" size="20">
    </div>
    <div class="form-group">
    <p><u>Note:</u> Your file has to be an image and smaller than 2MB!</p>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Publish</button>
    </div>

   @include ('layouts.errors')

</form>




@endsection