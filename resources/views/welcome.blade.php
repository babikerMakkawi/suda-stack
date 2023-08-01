@extends('layout.master')

@section('title', 'Home Page')

@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-8">
                    <h3 class="text-muted">All Questoins</h3>
                </div>
                <div class="col-4 text-end">
                    <a class="btn btn-primary" href="{{ route('post.create') }}">Ask Question</a>
                </div>
            </div>

            <div class="row py-3">
                <div class="col-4">
                    {{ $posts->count() }} Questions
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 text-end">
                    <div class="btn-group">
                        <a href="?order=latest" class="btn btn-primary btn-sm">Newest</a>
                        <a href="?order=oldest" class="btn btn-primary btn-sm">Oldest</a>
                        <a href="?order=unanswered" class="btn btn-primary btn-sm">Unanswerd</a>
                        <a href="?order=score" class="btn btn-primary btn-sm">Score</a>
                    </div>
                </div>
            </div>
            <!---------------------------------------------------------------------------------------------------------->

            @forelse($posts as $post)

                <div class="card bg-transparent mb-3" style="border-top: 1px #696f75 solid; border-radius: 0;">



                    @if (auth()->id() == $post->user_id)
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li><a class="dropdown-item text-info" href="#">Edit</a></li>
                                <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                <li><a class="dropdown-item text-success" href="#">Mark As Answered</a></li>
                            </ul>
                        </div>
                    @endif


                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-2 col-sm-2 order-sm-0">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <ul class="d-inline-flex d-sm-block list-unstyled m-0">
                                        <li class="p-2 p-sm-0 text-end">0 votes</li>
                                        <li class="p-2 p-sm-0 text-end">{{ $post->comment->count() ?? 0 }} answers</li>
                                        <li class="p-2 p-sm-0 text-end">{{ $post->post_bookmark->count() ?? 0 }}
                                            Bookmarks
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-10 col-sm-10 order-lg-0">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="card-title mb-0">
                                        <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                                    </h5>
                                </div>

                                <p class="card-text">
                                    {!! $post->excerpt !!}
                                    </code>
                                    </pre>
                                </p>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6 text-start">
                                        @if ($post->tags != null)
                                            @foreach ($post->tags as $tag)
                                                <a href="#"
                                                    class="badge bg-info text-decoration-none">{{ $tag->name }}</a>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="col-sm-12 col-md-6 text-md-end mt-3 mt-md-0">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <div
                                                class="bg-primary rounded-pill px-3 py-2 d-flex align-items-center user-post-details">
                                                <div class="avatar rounded-circle bg-secondary me-2">
                                                    <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Avatar"
                                                        width="32" class="img-fluid rounded-circle">
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
                </div>
            @empty
                <h5>There is no posts!!</h5>
            @endforelse

            {{ $posts->links() }}

        </div>

    </div>
@endsection

@section('js')
    <script>
        hljs.highlightAll();
    </script>
@endsection
