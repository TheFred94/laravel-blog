@extends('layout')

@section('content')
<article>
    <h1>{{$post->title}}</h1>

    <div>
        <!-- Using the exclamation points to treat it as html -->
        {!! $post->body !!}
    </div>
</article>
<a href="/">Go Back</a>
@endsection