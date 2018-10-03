@extends ('layouts.master')


@section ('content')

    <h1>Publish a Post</h1>
<hr>

<form method="POST" action="{{action('PostsController@update',$post['id'])}}"  enctype="multipart/form-data">
        {{method_field('patch')}}
        {{ csrf_field() }}
    <div class="form-group">
        <label for="exampleInputEmail1">Title:</label>
        <input type="text" class="form-control" id="title" name="title"  value="{{$post->title}}">
    </div>

    <div class="form-group">
        <label for="body">Body:</label>
        <textarea name="body" id="article-ckeditor" class="form-control">{{$post->body}}</textarea>
    </div>

    <div class="form-group">
    <input type="file" name="cover_image" size="20">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Edit Post</button>
    </div>

   @include ('layouts.errors')

</form>




@endsection