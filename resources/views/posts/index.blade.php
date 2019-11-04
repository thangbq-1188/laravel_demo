@extends('layouts.app')

@section('content')
    <div class="col-md-12">
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
              </div>
              <div class="card-footer text-muted">
                Posted on {{ $post->created_at->format('F j, Y') }} by
                <a href="#">Start Bootstrap</a>
              </div>
            </div>
        @endforeach

        {{ $posts->links() }}
    </div>
@endsection
