@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Edit Post
    </div>
    <div class="card-body">
        {{ Form::model($post, ['url' => route('posts.update', $post->id), 'method' => 'PUT' ]) }}
            @include('posts._form')
        {{ Form::close() }}
    </div>
</div>
@endsection
