@extends('layouts.master')

@section('content')
<br>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">About Laravel Blog</h3>
  </div>
  <div class="panel-body">
  <p>
This simple project has been created to showcase laravel framework knowledge, The project has the following features:
</p>
<dl>
<dt>Authentication System</dt>
<dd>Users can Register with email and password, and login to manage their account</dd>
<dt>Access Control</dt>
<dd>functionalities like publishing a new posts or delete posts are protected againest guests and other users too, i.e. each user can only edit his own posts only.</dd>
<dt>CRUD operations</dt>
<dd>Create, Read, Update and Delete operations on blog posts</dd>
<dt>File upload</dt>
<dd>Users are able to upload images with their posts.(only images thoug for security and usability reasons)</dd>
<dt>Filters</dt>
<dd>Archive functionality filtering through posts by the month and year it was created. (links are shown on sidebar when there are posts to filter).</dd>
<dt>Search functionality</dt>
<dd>users are able to search through blog posts titles and get immediate response.</dd>
<dt>Simplified Dashboard</dt>
<dd>users can access a personalised dashboard viewing all 'their' posts with ability to directly perform actions on them.</dd>
</dl>
  </div>
</div>



@endsection