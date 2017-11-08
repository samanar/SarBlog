@extends('layouts.manage')

@section('content')
    <div class="uk-child-width-1-2@s m-t-10" uk-grid>
        <div class="">
            <h2><i class="fa fa-plus" aria-hidden="true"></i> Create New Posts</h2>
        </div>
    </div>

    <div class="uk-container">
        <form class="uk-form-stacked" role="form" method="POST"
              action="{{ route('posts.store') }}">

            {{ csrf_field() }}

            <div class="uk-margin">
                <label for="" class="uk-form-label">Title</label>
                <input type="text" class="uk-input{{ $errors->has('title') ? ' uk-form-danger' : '' }}"
                       name="title" placeholder="Enter Title" required>

                @if ($errors->has('title'))
                    <div class="uk-alert-danger" uk-alert>
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>

            <div class="uk-margin">
                <label for="" class="uk-form-label">Slug</label>
                <input type="text" class="uk-input{{ $errors->has('slug') ? ' uk-form-danger' : '' }} "
                       name="slug" placeholder="Enter Title" required>

                @if ($errors->has('slug'))
                    <div class="uk-alert-danger" uk-alert>
                        {{ $errors->first('slug') }}
                    </div>
                @endif
            </div>

            <div class="uk-margin">
                <label for="" class="uk-form-label">Excerpt</label>
                <textarea name="excerpt" id="excerpt"
                          class="uk-textarea{{ $errors->has('excerpt') ? ' uk-form-danger' : '' }}" rows="4"
                          placeholder="Enter Excerpt" ></textarea>

                @if ($errors->has('excerpt'))
                    <div class="uk-alert-danger" uk-alert>
                        {{ $errors->first('excerpt') }}
                    </div>
                @endif
            </div>

            <div class="uk-margin">
                <label for="" class="uk-form-label">Content</label>
                <textarea name="content" id="editor"></textarea>
            </div>
        </form>

    </div>
    </div>
@endsection

@push('scripts')
    {{--<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>--}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endpush