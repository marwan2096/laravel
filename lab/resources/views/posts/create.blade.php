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
            <label class="form-label">Description</label>
            <textarea
                name="description"
                class="form-control"
            ></textarea>
        </div>
        <div class="mb-3">
            <label class="form-check-label">Post Creator</label>

            <select  class="form-control" name="user_id">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach

            </select>
        </div>
        <div class="mb-3">
            
            <input class="form-control-file" type="file" name="img">
          </div>
         

        



        <button type="submit" class="btn btn-success">Submit</button>
    </form>








@endsection

