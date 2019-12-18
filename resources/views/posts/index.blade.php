@extends('layouts.app')
@section('content')
    <ul>
        @foreach($posts as $post )
            <span class="col-md-2">
                <img src="{{$post->path}}" alt="">{{--/images/--}}
            </span>
            <li><a href="{{ route('posts.show',$post->id) }}">{{ $post->title }}</a>
            {{ $post->user->name }}
            </li>
        @endforeach
            @endsection
    </ul>
