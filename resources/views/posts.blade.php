<!-- extends the layout file here. The view is extending a layout -->
@extends ('layout')

@section('banner')

<h1>My Blog</h1>

@endsection


<!-- This sections content is yielded in the layout file -->
@section('content')

<!-- Using the @ symbol instead of <?php ?> - Will be compiled into vanilla php  -->
@foreach ($posts as $post)

<!-- Using the loop variable which is accessable inside a foreach loop gains access to information about the loop. -->
{{-- @dd($loop) --}}

<!-- Using the loop-variable to style on elements -->
<article class="{{ $loop->even ? 'bg-white' : ''}}">
    <h1>
        <a class="" href=" /posts/{{ $post->slug }}">
            {{ $post->title }}
        </a>
    </h1>

    <div>
        <!-- Excerpt is not HTMl and can be written like this. It's compiled into vanilla php -->
        {{ $post->excerpt }}
    </div>
</article>
@endforeach
@endsection