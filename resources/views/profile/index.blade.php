@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img src="{{ asset($user->profile->portrait_src) }}" class="rounded-circle w-100">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center pb-3">
                        <div class="h4">{{ $user->name }}</div>
{{--                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>--}}
                        <a href="{{ route('post.create') }}" class="btn btn-primary">Add post</a>
                    </div>

                    @can('update', $user->profile)
                        <a href="{{ route('post.create') }}">Add New Post</a>
                    @endcan

                </div>

                @can('update', $user->profile)
                    <a href="{{ route('post.create') }}">Edit Profile</a>
                @endcan

                <ul class="d-flex flex-row list-unstyled">
                    <li class="me-4"><span class="fw-bolder">{{ $postCount ?? 0 }}</span> posts</li>
                    <li class="me-4"><span class="fw-bolder">{{ $followersCount ?? 0 }}</span> followers</li>
                    <li class="me-4"><span class="fw-bolder">{{ $followingCount ?? 0 }}</span> following</li>
                </ul>

                <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
                <div>{{ $user->profile->description }}</div>
                <div><a href="{{ $user->profile->url }}">{{ $user->profile->url }}</a></div>
            </div>
        </div>

        <div class="row pt-5">
            @foreach($user->posts as $post)
                <div class="col-4 pb-4">
                    <a href="{{ route('post.show', $post->id) }}">
                        <img src="{{ asset($post->preview_picture) }}" class="w-100">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
