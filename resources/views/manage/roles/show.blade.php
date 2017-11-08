@extends('layouts.manage')

@section ('content')
    <div class="uk-container uk-container-center p-b-50 p-t-15">
        <div class="uk-child-width-1-2@s m-t-10" uk-grid>
            <div class="">
                <h2>
                    <i class="fa fa-shield" aria-hidden="true"></i>
                    Role Details
                </h2>
            </div>
            <div>
                <div class="p-r-30">
                    <a href="{{ route("roles.edit" , $role->id) }}"
                       class="uk-button uk-button-secondary uk-align-right@s">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        Edit role
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-4@s">
                Name :
            </div>
            <div class="uk-width-3-4@s">
                {{ $role->name }}
            </div>
            <div class="uk-width-1-4@s">
                Display Name :
            </div>
            <div class="uk-width-3-4@s">
                {{ $role->display_name }}
            </div>
            <div class="uk-width-1-4@s">
                Description :
            </div>
            <div class="uk-width-3-4@s">
                {{ $role->description }}
            </div>
            <div class="uk-width-1-4@s">
                Created At :
            </div>
            <div class="uk-width-3-4@s">
                {{ $role->created_at->toFormattedDateString() }}
            </div>
        </div>
        <h3>Permissions</h3>
        <ul class="uk-list uk-list-bullet">
            @foreach($role->permissions as $permission)
                <li>{{ $permission->display_name }} ( {{ $permission->description }} )</li>
            @endforeach
        </ul>
    </div>

@endsection