@extends('layout.master')

@section('title', 'Home Page')

@section('content')

    <div class="row p-0 m-0 py-3">
        <div class="col-9 align-self-end">
            <h3 class="text-muted">{{ Str::upper($post->title) }}</h3>
        </div>

        <div class="col-3 text-end">
            <a class="btn btn-primary btn-sm text-center p-lg-3" href="{{ route('post.create') }}">Ask
                Question</a>
        </div>
    </div>
    <div class="row p-0 m-0 py-3">
        <span class="inline-block text-info">
            Asked <strong class="text-light">{{ $post->created_at->diffForHumans() }}</strong>
            Modified <strong class="text-light">{{ $post->updated_at->diffForHumans() }}</strong>
            Views <strong class="text-light">240</strong>
        </span>
    </div>
    </div>
    {{-- Start Of Post Header --}}

    {{-- Start Of Post --}}

    <div class="card bg-transparent mb-3" style="border-top: 1px #696f75 solid; border-radius: 0;">

        @if (auth()->id() == $post->user_id)
            <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                    <li><a class="dropdown-item text-info" href="{{ route('post.edit', $comment) }}">Edit</a></li>
                    <li><a class="dropdown-item text-danger" href="{{ route('post.destroy', $comment) }}">Delete</a>
                    </li>

                    <li><a class="dropdown-item text-warning" href="{{ route('post.activate', $comment) }}">Mark
                            unAnswered</a></li>
                    <li><a class="dropdown-item text-success" href="{{ route('post.answered', $comment) }}">Mark
                            Answered</a></li>

                    <li><a class="dropdown-item text-warning" href="{{ route('post.disable', $comment) }}">Disable</a>
                    </li>
                    <li><a class="dropdown-item text-success" href="{{ route('post.activate', $comment) }}">Activate</a>
                    </li>
                </ul>
            </div>
        @endif

        <div class="card-body">
            <div class="row align-items-center">
                <div class="row p-0 m-0 py-3">

                    <div class="col-1">
                        <div class="d-flex flex-column justify-content-center align-items-center">

                            <a href="#" class="text-decoration-none text-dark">
                                <i class="bi bi-caret-up-fill fs-1"></i>
                            </a>

                            <span class="votes fs-3">{{ $post->post_bookmark->count() }}</span>

                            <a href="#" class="text-decoration-none text-dark">
                                <i class="bi bi-caret-down-fill fs-1"></i>
                            </a>

                            <div class="bookmark mt-3 mt-sm-0">
                                <a href="{{ route('post.bookmark', $post) }}" class="text-decoration-none text-dark">

                                    <?php $flag = 0; ?>

                                    @foreach ($post->post_bookmark as $post_bookmark)
                                        @if (Auth::user()->id == $post_bookmark->user_id)
                                            <?php $flag = 1; ?>
                                        @endif
                                    @endforeach

                                    @if ($flag == 1)
                                        <i class="bi bi-bookmark-fill fs-2"></i>
                                    @else
                                        <i class="bi bi-bookmark fs-2"></i>
                                    @endif

                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-11">
                        <div class="d-flex justify-content-between
                        align-items-center mb-3">
                            <h5 class="card-title mb-0">{{ $post->title }}</h5>
                        </div>
                        <p class="card-text">
                            {!! $post->body !!}
                        </p>
                    </div>
                </div>
                <div class="row p-0 m-0 py-3">
                    <div class="col-sm-12 col-md-6 text-start">
                        @if ($post->tags != null)
                            @foreach ($post->tags as $tag)
                                <a href="#" class="badge bg-info text-decoration-none">{{ $tag->name }}</a>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-sm-12 col-md-6 text-md-end mt-3 mt-md-0">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="bg-primary rounded-pill px-3 py-2 d-flex align-items-center user-post-details">
                                <div class="avatar rounded-circle bg-secondary me-2">
                                    <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Avatar" width="32"
                                        class="img-fluid rounded-circle">
                                </div>
                                <div> <small
                                        class="text-black-50 d-block fw-bold text-start">{{ $post->user->username }}</small>
                                    <small class="text-info d-block">asked
                                        {{ $post->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- End Of Post --}}

    {{-- Start Of Comments Header --}}
    <div class="row p-0 m-0 py-3">
        <div class="col-3 align-self-end">
            <h3 class="text-muted">Answers</h3>
        </div>
        <div class="col-9 text-end">
            <div class="input-group mb-3 d-flex flex-md-row-reverse">
                <select class="custom-select" onchange="location = this.value;">
                    <option value="?order=rating" @selected(request('order') == 'rating')>Higest Score (Default)</option>
                    <option value="?order=latest" @selected(request('order') == 'latest')>Newest</option>
                    <option value="?order=oldest" @selected(request('order') == 'oldest')>Oldest</option>
                </select>
                <div class="input-group-prepend">
                    <label class="pe-2" for="inputGroupSelect01">Sorted By: </label>
                </div>
            </div>
        </div>

    </div>
    {{-- End Of Comments Header --}}


    @forelse ($post->comment as $comment)
        {{-- Comment --}}

        <div class="card bg-transparent mb-3" style="border-top: 1px #696f75 solid; border-radius: 0;">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="row p-0 m-0 py-3">
                        <div class="col-lg-1 col-sm-1">
                            <div class="d-flex flex-column justify-content-center align-items-center"> <a href="#"
                                    class="text-decoration-none text-dark"> <i class="bi bi-caret-up-fill fs-1"></i>
                                </a>
                                <span class="votes fs-3">10</span> <a href="#" class="text-decoration-none text-dark">
                                    <i class="bi bi-caret-down-fill fs-1"></i> </a>
                                <div class="bookmark mt-3 mt-sm-0">
                                    <a href="{{ route('comment.bookmark', $comment) }}"
                                        class="text-decoration-none text-dark">

                                        <?php $flag = 0; ?>

                                        @foreach (Auth::user()->comment_bookamrk as $user_bookmark)
                                            @if ($user_bookmark->comment_id == $comment->id)
                                                <?php $flag = 1; ?>
                                            @endif
                                        @endforeach

                                        @if ($flag == 1)
                                            <i class="bi bi-bookmark-fill fs-2"></i>
                                        @else
                                            <i class="bi bi-bookmark fs-2"></i>
                                        @endif

                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-11 col-sm-11 py-3">
                            <p class="card-text">
                                {!! $comment->body !!}
                            </p>
                        </div>
                    </div>
                    <div class="row p-0 m-0 py-3">
                        <div class="col-12 text-md-end mt-3 mt-md-0">
                            <div class="d-flex align-items-center justify-content-end">
                                <div class="bg-primary rounded-pill px-3 py-2 d-flex align-items-center user-post-details">
                                    <div class="avatar rounded-circle bg-secondary me-2">
                                        <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Avatar"
                                            width="32" class="img-fluid rounded-circle">
                                    </div>
                                    <div> <small
                                            class="text-black-50 d-block fw-bold text-start">{{ $comment->user->username }}</small>
                                        <small class="text-info d-block">Answered
                                            {{ $comment->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Comment --}}
    @empty
        <h3>There's No Comment At Moment</h3>
    @endforelse

    {{-- Answer --}}

    <div class="row p-0 m-0 py-3">
        <form action="{{ route('comment.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="" class="form-label">Your Answer</label>
                <Textarea class="form-control tinymce-editor" name="body" onchange="">{{ old('body') }}</Textarea>

                @if ($errors->has('body'))
                    <p class="text-danger small">{{ $errors->first('body') }}</p>
                @endif
            </div>

            <div class="card mb-3">
                <div class="card-body">
                    <div class="card-title">Preview</div>
                    <div id="preview">
                    </div>
                </div>
            </div>

            <input type="hidden" name="post_id" value="{{ $post->id }}">

            <input type="submit" class="btn btn-primary" value="Post Your Answer">

        </form>
    </div>

    {{-- Answer --}}


    </div>
    </div>
@endsection

@section('js')
    <script>
        toastr() - > info('Welcome back');
    </script>
@endsection
