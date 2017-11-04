@extends('layouts.manage')

@section ('content')
    <div class="uk-container uk-container-center p-b-50 p-t-15">
        <div class="uk-child-width-1-2@s m-t-10" uk-grid>
            <div class="">
                <h2>
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                    User Details
                </h2>
            </div>
            <div class="p-r-30">
                <a href="{{ route("users.edit" , $user->id) }}"
                   class="uk-button uk-button-secondary uk-align-right@s">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Edit User</a>
            </div>
        </div>

        <hr>
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-4@s">
                Name :
            </div>
            <div class="uk-width-3-4@s">
                {{ $user->name }}
            </div>
            <div class="uk-width-1-4@s">
                Email :
            </div>
            <div class="uk-width-3-4@s">
                {{ $user->email }}
            </div>
            <div class="uk-width-1-4@s">
                Join Date :
            </div>
            <div class="uk-width-3-4@s">
                {{ $user->created_at->toFormattedDateString() }}
            </div>
            <div class="uk-width-1-4@s">
                Membership age :
            </div>
            <div class="uk-width-3-4@s">
                {{ $user->created_at->diffForHumans() }}
            </div>
        </div>
    </div>


@endsection