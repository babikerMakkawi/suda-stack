@extends('layout.master')

@section('title', 'Add Question')

@section('content')
    <h3 class="py-4 px-3">
        Ask A Question Briefly
    </h3>
    <div class="row px-3">
        <div class="col-lg-4 col-sm-12 order-lg-2 order-xl-2 small">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Post Instructions</h5>
                        You’re ready to ask a programming-related question and this form will help guide you through the
                        process.

                        Looking to ask a non-programming question? See the topics here to find a relevant site.
                        <div class="my-3">Steps</div>
                        <ul>
                            <li>Summarize your problem in a one-line title.</li>
                            <li>Describe your problem in more detail.</li>
                            <li>Describe what you tried and what you expected to happen.</li>
                            <li>Add “tags” which help surface your question to members of the community.</li>
                            <li>Review your question and post it to the site.</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-sm-12">
            <div class="row">

                {{-- <button onclick="tinymce.activeEditor.setContent('{{ request()->get('body') }}');"
                    class="btn btn-primary w-2">Grap Old Data
                </button> --}}

                <form action="{{ route('post.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                            aria-describedby="emailHelpId" placeholder="Post Title">

                        @if ($errors->has('title'))
                            <p class="text-danger small">{{ $errors->first('title') }}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Question</label>
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

                    <div class="mb-3">
                        <label for="" class="form-label">Tags</label>
                        <input type="text" class="form-control" name="tags" data-role="tagsinput">
                    </div>

                    <input type="submit" class="btn btn-primary" value="Submit">

                </form>
            </div>

        </div>
    </div>
@endsection
