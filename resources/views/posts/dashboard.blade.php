@extends('layouts.master')

@section('content')
<a href="/posts/create" class="float-right btn btn-primary my-2">New post</a>
    <h3>My Blog Posts</h3>
    @if(count($posts))
        <table class="table table-striped">
            <tr>
                <th>Title</th>
                <th></th>
                <th></th>
            </tr>
            
            @foreach ($posts as $post)

                <tr>
                    <td>{{$post->title}}</td>
                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-outline-secondary">Edit</a></td>
                    <td><button class="btn btn-outline-danger"  data-toggle="modal" data-target="#delete">Delete</button></td>
                </tr>

            @endforeach

        </table>

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

    @else

            <p class="lead">You have no posts!</p>

    @endif
        
        

@endsection