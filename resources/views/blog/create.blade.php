@extends('layouts.app')
@section('title') Create page @endsection
@section('content')
        <form method="POST" action="{{route('blogs.store')}}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input name="title" type="text" class="form-control" value="{{old('title')}}" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Description</label>
                <textarea name="description" class="form-control"  rows="3">{{old('description')}}</textarea>
            </div>

            <div class="mb-3">
                <label  class="form-label">Post Creator</label>
                <select name="post_creator" class="form-control">
                    @foreach($creators as $creator)
                    <option value="{{$creator['id']}}">{{$creator['name']}}</option>
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
            <button class="btn btn-success">Submit</button>
        </form>


    @endsection
