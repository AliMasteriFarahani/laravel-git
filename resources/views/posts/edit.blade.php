@extends('layouts.app')
@section('content')

    @can('update',$post)
    {!! Form::model($post,[ 'method' => 'PATCH','action' =>[ 'postsController@update',$post->id],]) !!}
    <div class="form-group">
        {!! Form::label('title', ' عنوان :', ['class' => 'control-label']) !!}
        {!! Form::text('title',$post->title, ['class' => 'form-control'],['id'=>'title']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'توضیحات :', ['class' => 'control-label']) !!}
        {!! Form::textarea('description',$post->body,['placeholder'=>'توضیحات شما ...'], ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('ذخیره', ['class' => 'form-control btn btn-success']) !!}

    {!! Form::close() !!}
<br>
    {!! Form::model($post,[ 'method' => 'DELETE','action' =>[ 'postsController@destroy',$post->id],]) !!}
    {!! Form::submit('حذف', ['class' => 'form-control btn btn-danger']) !!}
    {!! Form::close() !!}
@endcan
{{--    <form  method="post" action="/posts/{{$post->id}}">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <label for="title">عنوان شما :</label>
        <input type="text" name="title" id="title" value="{{ $post->title }}" placeholder="عنوان شا">
        <br>
        <textarea name="description" id="description" cols="30" rows="10" placeholder="توضیحات شما ...">{{ $post->body }}</textarea>
        <br>
        <button type="submit" name="submit">ذخیره</button>
    </form>--}}


{{--    <form  method="post" action="/posts/{{$post->id}}">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" name="submit">delete</button>
    </form>--}}
@endsection
