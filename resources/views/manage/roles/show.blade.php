@extends('layouts.manage')

@section ('content')
    <div class="uk-container uk-container-center p-b-50 p-t-15">
        <div class="uk-child-width-1-2@s m-t-10" uk-grid>
            <div class="">
                <h2>
                    <i class="fa fa-shield" aria-hidden="true"></i>
                    Permission Details
                </h2>
            </div>
        </div>
        <hr>
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-4@s">
                Name :
            </div>
            <div class="uk-width-3-4@s">
                {{ $permission->name }}
            </div>
            <div class="uk-width-1-4@s">
                Display Name :
            </div>
            <div class="uk-width-3-4@s">
                {{ $permission->display_name }}
            </div>
            <div class="uk-width-1-4@s">
                Description :
            </div>
            <div class="uk-width-3-4@s">
                {{ $permission->description }}
            </div>
            <div class="uk-width-1-4@s">
                Created At :
            </div>
            <div class="uk-width-3-4@s">
                {{ $permission->created_at->toFormattedDateString() }}
            </div>
        </div>
    </div>

@endsection