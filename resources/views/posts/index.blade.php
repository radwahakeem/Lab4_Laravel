@extends('layouts.app')
@section('content')
@section('title') Index @endsection

    <div class="text-center">
        <a  href="{{route('posts.create')}}" class="mt-4 btn btn-success">Create Post</a>
        <a href="{{route('posts.restore')}}"><i class="fa-solid fa-arrow-rotate-left mt-5"></i></a>
        
    </div>
    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{$post -> id}}</td>
            <td>{{$post -> title}}</td>
            <td>{{$post -> slug}}</td>
            <td>{{$post -> user ? $post -> user ->name : 'user not found'}}</td>
            <td>{{$post -> created_at -> format('Y-m-d')}}</td>
           
            <td>
                <a href="{{route('posts.show' , ['post' => $post -> id])}}" class="btn btn-info">View</a>
                <a href="{{route('posts.edit' , ['post' => $post -> id])}}" class="btn btn-primary">Edit</a>
                <form style="display:inline;" method="POST" action="{{route('posts.destroy' , ['post' => $post -> id])}}">
                <button  class="btn btn-danger delete" type="submit" id="btnSubmit">Delete</button>
                @csrf
                @method("DELETE")
</form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <br>
        {{$posts->links()}}
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#btnSubmit").click(function () {
                var result = confirm("Are you sure wants to delete it ?");

                if (result == true) {
                    return true;
                }

                else {
                    return false;
                }
            });
        });
    </script>
    
@endsection


