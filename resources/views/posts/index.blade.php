@extends('layout')

@section('content') 
    <div class="container mt-4">
        <div class="mb-4">
            <p class="auth_myname">{{ Auth::user()->name }} さん、こんにちは！</p>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">
                投稿を新規作成する
            </a>
        </div>
     @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <a> {{-- href="{{ url('users/' . $post->user->id) }}"--}}
                    {{ $post->user->name }}
                </a>
                <div class="card-body">
                    <p class="card-text">
                        {!! nl2br(e(Str::limit($post->body, 200))) !!}
                    </p>
                    <a class="card-link" href="{{ route('posts.show', ['post' => $post]) }}">
                        続きを読む
                    </a>
                </div>
                <div class="card-footer">
                    <span class="mr-2">
                        投稿日時 {{ $post->created_at->format('Y.m.d') }}
                    </span>

                    @if ($post->comments->count())
                        <span class="badge badge-primary">
                            コメント {{ $post->comments->count() }}件
                        </span>
                    @endif
                </div>
            </div>
        @endforeach
        
    </div>
    <div class="d-flex justify-content-center mb-5">
        {{ $posts ->links() }}
    </div>
@endsection