@extends('layouts.app')
@section('title') Edit page @endsection
@section('content')
    <form method="POST" action="{{route('blogs.update',$postid)}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" type="text" value="{{$post['title']}}" class="form-control" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea name="description" class="form-control"  rows="3">{{$post['description']}}</textarea>
        </div>

        <div class="mb-3">
            <label  class="form-label">Post Creator</label>
            <select name="post_creator" class="form-control">
                @foreach($users as $user)
                <option @if ($user['id']== $post['user_id']) selected @endif value="{{$user['id']}}" >{{$user['name']}}</option>
                @endforeach 
            </select>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{--we used that to display  validation errors --}}
        <button class="btn btn-primary">Update</button>
    </form>

@endsection
