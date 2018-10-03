<!-- Title -->
<h2 class="mt-4">
<a href="/posts/{{$post->id}}">
{{ $post->title}}
</a>
</h2>

<!-- Author -->
<p class="lead text-muted">
  by
  <b>{{ $post->user->name}}</b>
<!-- Date/Time -->
on {{ $post->created_at->toFormattedDateString()}}</p>

<!-- Preview Image -->
<!-- <img class="img-fluid rounded" src="http://placehold.it/900x300" alt=""> -->
@if(count((array)$post->cover_image))
<img class="img-fluid rounded" src="/storage/cover_images/{{$post->cover_image}}" alt="Image">
<hr>
@endif
<!-- Post Content -->
<p>
<!-- {!! $post->body !!} -->

{!! str_limit($post->body, 300) !!}
            @if (strlen($post->body) > 300)
              <a href="{{ action('PostsController@show', $post) }}" class="btn btn-info btn-sm">Read More...</a>
            @endif

</p>

<hr>
