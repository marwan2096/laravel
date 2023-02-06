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



<body>
  <form method="POST" action="{{ route('posts.update', $post->id) }}"enctype="multipart/form-data">
    @csrf
        @method('PUT')


    <div class="mb-3">
        <label class="form-label">Title</label>
        <input name="title" type="text" class="form-control"value="{{$post->title}}" >
    </div>


    <div class="mb-3">
        <label class="form-label">description</label>
        <textarea name="description"  class="form-control" >{{$post->description}}</textarea>
    
    </div>


    <div class="mb-3">
      <label class="form-check-label">Post Creator</label>

      <select  class="form-control" name="user_id">
          @foreach($users as $user)
              <option value="{{$user->id}}" @if($user->id == $post->user_id) selected @endif >{{$user->name}}</option>
                 
          @endforeach
      </select></div>
   



    <label class="block mb-4">
        <span class="sr-only">Choose File</span>
        <img src="{{Storage::disk('local')->url($post->image)}}" alt="" srcset="">
        <input type="file" name="image"
     
    </label>
     <br>
    
    <button type="submit" class="btn btn-success">update</button>

    </form>




    @endsection


