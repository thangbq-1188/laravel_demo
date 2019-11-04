@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Create Post
    </div>
    <div class="card-body">
        {{ Form::open(['url' => route('posts.store'), 'method' => 'POST' ]) }}
            @include('posts._form')
        {{ Form::close() }}
    </div>
</div>
@endsection
