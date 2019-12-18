@extends('layouts.app')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>
                    {{ $error }}
                </div>
            @endforeach
        </div>
    @endif
    {!! Form::open(['method'=>'post','action'=>'postsController@store','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('title', ' عنوان :', ['class' => 'control-label']) !!}
        {!! Form::text('title',null, ['class' => 'form-control'],['id'=>'title']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'توضیحات :', ['class' => 'control-label']) !!}
        {!! Form::textarea('description',null, ['class' => 'form-control'],['placeholder'=>'توضیحات شما ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('file', 'عکس :', ['class' => 'control-label']) !!}
        {!! Form::file('file',null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('ذخیره', ['class' => 'form-control btn btn-success']) !!}

    {!! Form::close() !!}

    {{--
       <form  method="post" action="/posts">
            @csrf
            <label for="title">عنوان شما :</label>
            <input type="text" name="title" id="title" placeholder="عنوان شا">
            <br>
            <textarea name="description" id="description" cols="30" rows="10" placeholder="توضیحات شما ..."></textarea>
            <br>
            <button type="submit" name="submit">ذخیره</button>
        </form>
        --}}
@endsection
