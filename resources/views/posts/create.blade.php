@extends('layouts.app')
@section('content') 
@section('title') Create @endsection

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('posts.store')}}" method="POST">
    @csrf
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" class="form-control" name="title">
  </div>
  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea  class="form-control" name="description"></textarea>
  </div>
  <div class="mb-3">
  <label class="form-label">Post Creator</label>
    <select class="form-control" name="user_id">
      @foreach($users as $user)
        <option value="{{$user -> id}}">{{$user -> name}}</option>
        @endforeach
    </select>
  </div>
  

  <button type="submit" class="btn btn-success">Create</button>
</form>

@endsection


