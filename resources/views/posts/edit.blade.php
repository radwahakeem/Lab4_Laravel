@extends('layouts.app')
@section('content') 
@section('title') Edit @endsection
<form action="{{route('posts.update' , ['post' => $post -> id])}}" method="POST">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" class="form-control" name="title" value="{{$post -> title}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea  class="form-control" name="description">{{$post -> description}}</textarea>
  </div>
  <div class="mb-3">
  <label class="form-label">Post Creator</label>
  <select class="form-control" name="user_id">
      @foreach($users as $user)
        <option value="{{$user -> id}}">{{$user -> name}}</option>
        @endforeach
    </select>
  </div>
  
  <button  type="submit" class="btn btn-primary">Update</button>
</form>

@endsection