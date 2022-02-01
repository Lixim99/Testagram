@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex p-2 flex-wrap">
            <div style="flex: 1.5">
                <img class="w-100" src="{{ asset($post->detail_picture) }}" alt="">
            </div>
            <div class=" d-flex flex-column" style="flex: 1">
                <header class="d-flex px-4 p-2">
                    <div class="rounded-circle overflow-hidden" style="width: 42px; height: 42px">
                        <a href=" {{ route('profile.show', $post->user->id) }}">
                            <img class="w-100 h-100" src="{{ asset($post->user->profile->portrait_src) }}" alt="">
                        </a>
                    </div>
                    <span class="fw-bolder px-2 d-flex align-items-center">
                        <a class="text-decoration-none text-dark" href="{{ route('profile.show', $post->user->id) }}">{{ $post->user->profile->user_name }}</a>
                    </span>
                    <div class="d-flex fw-bold align-items-center">
                        <div class="d-flex align-items-center px-2 "><span>•</span></div>
                        <a class="px-3 text-decoration-none" href="#">{{ __('Follow') }}</a>
                    </div>
                    <div class="ms-auto d-flex align-items-center">
                        <form action="{{ route('post.destroy',$post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn text-decoration-none btn-outline-danger">x</button>
                        </form>
                        <a href="{{ route('post.edit',$post->id) }}" class="btn text-decoration-none btn-outline-danger">E</a>
                    </div>
                </header>
                <hr>

                <div class="d-flex flex-column h-100 w-100" style="max-height: 487px;">
                    <div class="overflow-auto" style="flex: 1 1 auto">
                        <?//Items?>
                        <ul>
                            <li>
                                <div></div>
                                <div>
                                    <span>Noëlle had herself convinced that regex would crush her…but instead, she
                                    crushed them</span>
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div></div>
                                <div>
                                    <span>Noëlle had herself convinced that regex would crush her…but instead, she
                                    crushed them</span>
                                </div>
                            </li>
                        </ul>
                            <ul>
                                <li>
                                    <div></div>
                                    <div>
                                    <span>Noëlle had herself convinced that regex would crush her…but instead, she
                                    crushed them</span>
                                    </div>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <div></div>
                                    <div>
                                    <span>Noëlle had herself convinced that regex would crush her…but instead, she
                                    crushed them</span>
                                    </div>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <div></div>
                                    <div>
                                    <span>Noëlle had herself convinced that regex would crush her…but instead, she
                                    crushed them</span>
                                    </div>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <div></div>
                                    <div>
                                    <span>Noëlle had herself convinced that regex would crush her…but instead, she
                                    crushed them</span>
                                    </div>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <div></div>
                                    <div>
                                    <span>Noëlle had herself convinced that regex would crush her…but instead, she
                                    crushed them</span>
                                    </div>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <div></div>
                                    <div>
                                    <span>2Noëlle had herself convinced that regex would crush her…but instead, she
                                    crushed them</span>
                                    </div>
                                </li>
                            </ul>
                    </div>
                    <div class="form-floating">
                        <form class="d-flex" method="POST">
                            @csrf
                            @method('PATCH')
                            <textarea class="form-control" placeholder="Add a comment…" autocomplete="off" autocorrect="off"></textarea>
                            <button class="btn btn-primary btn-sm" type="submit">{{ __('Post') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
