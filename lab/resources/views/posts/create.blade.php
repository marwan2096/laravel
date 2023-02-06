@extends('layouts.app')

@section('title') create @endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif




 <form method="POST" action="/posts" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" type="text" class="form-control" >
        </div>
    


        <div class="mb-3">
            <label class="form-group">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>


        <div class="mb-3">
            <label class="form-check-label">Post Creator</label>

            <select  class="form-control" name="user_id">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach

            </select>
         </div>



    <label class="block mb-4">
            <span class="sr-only">Choose File</span>
            <input type="file" name="image"
                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
            @error('image')
            <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
    </label>


        <button type="submit" class="btn btn-success">Submit</button>


    </form>


@endsection

