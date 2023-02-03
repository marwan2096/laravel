@extends('layouts.app')

@section('title') index @endsection

@section('content')
    <div class="text-center">
       <a href="{{route('posts.create')}}" class="mt-4 btn btn-success">Create Post</a>
    </div>
    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($posts as $post)
{{--            @dd($post)--}}
            <tr>
{{--                <td>{{$post['id']}}</td>--}}
{{--                <td>{{$post['title']}}</td>--}}
{{--                <td>{{$post['posted_by']}}</td>--}}
{{--                <td>{{$post['created_at']}}</td>--}}

                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>

{{--                @if($post->user)--}}
{{--                    <td>{{$post->user->name}}</td>--}}
{{--                @else--}}
{{--                    <td>User Not Found</td>--}}
{{--                    @endif--}}
{{--                <td>{{$post->user?->name}}</td>--}}
{{--                <td>{{$post->user ? $post->user->name : 'Not Found'}}</td>--}}
                <td>{{$post->user->name ?? 'Not Found'}}</td>
{{--                <td>{{$post->test}}</td>--}}
                <td>{{$post->created_at->format('Y-m-d')}}</td>
{{-- 
                <td>@foreach($post ->comments as $comment)
                
                <p>{{$comment ->id}}</p>
                @endforeach
                 --}}
                </td>
                <td>
{{--                    href="/posts/{{$post['id']}}"--}}
                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-info">View</a>
                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary">Edit</a>
                    <form  style="display: inline" method="POST"action=" {{ route('posts.destroy', $post->id) }}">
                        <button onclick="return confirm('Are you sure?')" class="btn btn-danger" type="submit">Delete</button>
                        @csrf
                      @method('Delete')
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{$posts->links('pagination::bootstrap-4')}}

    
   
@endsection
