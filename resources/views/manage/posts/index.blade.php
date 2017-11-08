@extends('layouts.manage')

@section('content')
    <div class="uk-child-width-1-2@s m-t-10" uk-grid>
        <div class="">
            <h2><i class="fa fa-list" aria-hidden="true"></i> Manage Posts</h2>
        </div>
        <div class="p-r-30">
            <a href="{{ route("posts.create") }}"
               class="uk-button uk-button-secondary uk-align-right@s">
                <i class="fa fa-plus" aria-hidden="true"></i> Create new Post</a>
        </div>
    </div>
@endsection