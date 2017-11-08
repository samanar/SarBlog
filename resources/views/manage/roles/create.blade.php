@extends('layouts.manage')

@section ('content')
    <div class="uk-width-1-1@s uk-align-center register_form m-b-30">

        <h2>
            <i class="fa fa-plus" aria-hidden="true"></i>
            Create New Role
        </h2>

        <form class="uk-form-stacked uk-width-5-6@s" role="form" method="POST"
              action="{{ route('roles.store') }}">

            {{ csrf_field() }}

            <div class="uk-margin">
                <label class="uk-form-label">Name (can not be edited) </label>
                <input id="name" type="text"
                       class="uk-input{{ $errors->has('name') ? ' uk-form-danger' : '' }}"
                       name="name"
                       required>

                @if ($errors->has('name'))
                    <div class="uk-alert-danger" uk-alert>
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">Display Name</label>
                <input id="display_namae" type="text"
                       class="uk-input{{ $errors->has('display_name') ? ' uk-form-danger' : '' }}"
                       name="display_name"
                       required>

                @if ($errors->has('display_name'))
                    <div class="uk-alert-danger" uk-alert>
                        {{ $errors->first('display_name') }}
                    </div>
                @endif
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">Description</label>
                <input type="text" name="description" id="description"
                       class="uk-input{{ $errors->has('description') ? ' uk-form-danger' : '' }}"
                >

                @if ($errors->has('description'))
                    <div class="uk-alert-danger" uk-alert>
                        {{ $errors->first('description') }}
                    </div>
                @endif
            </div>

            <h2>Permissions</h2>

            <div class="uk-child-width-1-1@s uk-grid-small" uk-grid>
                @foreach($permissions as $permission)
                    <div>
                        <label>
                            <input class="uk-checkbox" type="checkbox" name="permissions[]"
                                   value="{{ $permission->id }}"
                                   v-model="permission_selected"
                            >
                            {{ $permission->display_name }} ( {{ $permission->description }} )
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="uk-margin">
                <button class="uk-button uk-button-primary" type="submit" name="button">Edit Role</button>
            </div>


        </form>
    </div>

@endsection
