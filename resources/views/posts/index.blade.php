@extends('layouts.app')

@section('content')
    @foreach ($posts as $post)
        <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title">{{ $post->title }}</h2>
            <p class="card-text">{{ str_limit($post->content, 80) }}</p>
            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">
                Read More &rarr;
            </a>
            @auth
                @if (auth()->user()->id == $post->user_id && app('request')->input('user_id'))
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success">
                        Edit
                    </a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')">
                            <span>Delete</span>
                        </button>
                    </form>
                @endif
            @endauth
          </div>
          <div class="card-footer text-muted">
            Posted on {{ $post->created_at->format('F j, Y') }} by
            <a href="#">{{ $post->user->fullName }}</a>
          </div>
        </div>
    @endforeach

    {{ $posts->appends(['user_id' => app('request')->input('user_id')])->links() }}
@endsection
