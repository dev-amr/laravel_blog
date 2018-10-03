@extends('layouts.master')

@section('content')



  @foreach ($posts as $post)

    @include ('posts.post')

  @endforeach
{{$posts->links('vendor.pagination.bootstrap-4')}}

@endsection