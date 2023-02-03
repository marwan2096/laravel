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
  <form method="POST" action="{{ route('posts.update', $post->id) }}">
    @csrf
        @method('PUT')
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input name="title" type="text" class="form-control"value="{{$post->title}}" >
    </div>
    <div class="mb-3">
        <label class="form-label">
        <textarea name="description"  class="form-control" >{{$post->description}}</textarea>
           
          
     
    </div>
    <div class="mb-3">
      <label class="form-check-label">Post Creator</label>

      <select  class="form-control" name="user_id">
          @foreach($users as $user)
              <option value="{{$user->id}}" @if($user->id == $post->user_id) selected @endif >{{$user->name}}</option>
                 
          @endforeach
      </select></div>
    <button type="submit" class="btn btn-success">update</button>
    
</form>
    @endsection


