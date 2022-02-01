@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit post') }}</div>

                    <div class="card-body">
                        <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="row mb-3">
                                <label for="caption" class="col-md-4 col-form-label text-md-right">{{ __('Caption') }}</label>

                                <div class="col-md-6">
                                    <input
                                        id="caption"
                                        type="text"
                                        class="form-control @error('caption') is-invalid @enderror"
                                        name="caption"
                                        value="{{ old('caption') ?? $post->caption }}"
                                        required
                                        autocomplete="caption"
                                    >
                                    @error('caption')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Picture') }}</label>

                                <div class="col-md-6">
                                    <input
                                        id="image"
                                        type="file"
                                        class="form-control @error('image') is-invalid @enderror"
                                        name="image"
                                    >
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-9 pt-3 d-flex justify-content-end">
                                    <img src="{{ asset($post->preview_picture) }}" alt="">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
