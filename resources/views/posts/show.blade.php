@extends ('layouts.master')

@section('content')

    <h1>{{$post->title}}</h1>
    <small>By {{$post->user->name}} on {{ $post->created_at->toFormattedDateString()}} </small>
    @if(count($post->cover_image))
    <img class="img-fluid rounded" src="/storage/cover_images/{{$post->cover_image}}" alt="Image">
    <br>
    <br>
    @endif


    <p>{!!$post->body!!}</p>

    <hr>
    @if(!auth()->guest())
      @if(auth()->user()->id == $post->user_id)
        <a class="btn btn-outline-secondary" href="/posts/{{$post->id}}/edit" >Edit Post</a>
        <button class="btn btn-outline-danger"  data-toggle="modal" data-target="#delete">Delete</button>

        <!-- Modal Delete -->
        <div class="modal" tabindex="-1" role="dialog" id="delete">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{action('PostsController@destroy',$post['id'])}}" method="post">
              <!-- <input type="hidden" name="_method" value="DELETE"> -->
                  {{method_field('delete')}}
                  {{csrf_field()}}
              <div class="modal-body">
                <p>You are about to delete this post</p>
              </div>
              <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        <!-- /modal delete -->
        @endif
      @endif
    <div class="comments">
    
        <ul class="list-group">
            @foreach ($post->comments as $comment)
                <li class="list-group-item">
                <strong>{{ $comment->created_at->diffForHumans()}} By {{$comment->user->name}}: &nbsp;</strong>
                    {{ $comment->body}}
                </li>
            @endforeach
        </ul>

    </div>

    <!-- Comments Form -->
<div class="card my-4">
  <h5 class="card-header">Leave a Comment:</h5>
    <div class="card-body">
      <form method="POST" action="/posts/{{$post->id}}/comments">
      {{ csrf_field() }}
        <div class="form-group">
          <textarea class="form-control" rows="3" name="body" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Comment</button>
      </form>
    </div>
    @include('layouts.errors')
  </div>

@endsection