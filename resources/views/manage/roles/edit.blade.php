@extends('layouts.manage')

@section ('content')
    <div id="app">
        <div class="uk-container uk-container-center m-t-10">

            <div class="uk-width-1-1@s uk-align-center register_form">

                <h3>
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Edit Permission
                </h3>

                <form class="uk-form-stacked uk-width-5-6@s" role="form" method="POST"
                      action="{{ route('permissions.update' , $permission->id) }}">
                    {{ method_field("PUT") }}
                    {{ csrf_field() }}

                    <div>
                        <label class="uk-form-label">Name</label>
                        <input id="name" type="text"
                               class="uk-input{{ $errors->has('name') ? ' uk-form-danger' : '' }}" name="name"
                               value="{{ $permission->name }}" required autofocus>

                        @if ($errors->has('name'))
                            <div class="uk-alert-danger" uk-alert>
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label">Display Name</label>
                        <input id="display_name" type="text"
                               class="uk-input{{ $errors->has('display_name') ? ' uk-form-danger' : '' }}"
                               name="display_name"
                               value="{{ $permission->display_name }}"
                               required>

                        @if ($errors->has('display_name'))
                            <div class="uk-alert-danger" uk-alert>
                                {{ $errors->first('display_name') }}
                            </div>
                        @endif
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label">Description</label>
                        <input id="description" type="text"
                               class="uk-input{{ $errors->has('description') ? ' uk-form-danger' : '' }}"
                               name="description"
                               value="{{ $permission->description }}"
                               required>

                        @if ($errors->has('description'))
                            <div class="uk-alert-danger" uk-alert>
                                {{ $errors->first('description') }}
                            </div>
                        @endif
                    </div>


                    <div class="uk-margin">
                        <button class="uk-button uk-button-primary" type="submit" name="button">Edit User</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
@endsection

