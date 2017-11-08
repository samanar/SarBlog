@extends('layouts.manage')

@section ('content')
    <div id="app">
        <div class="uk-width-1-1@s uk-align-center register_form m-b-30">

            <h2>
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                Edit {{ $role->name }} Role
            </h2>

            <form class="uk-form-stacked uk-width-5-6@s" role="form" method="POST"
                  action="{{ route('roles.update' , $role->id) }}">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="uk-margin">
                    <label class="uk-form-label">Display Name</label>
                    <input id="display_namae" type="text"
                           class="uk-input{{ $errors->has('display_name') ? ' uk-form-danger' : '' }}"
                           name="display_name"
                           value="{{ $role->display_name }}"
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
                           value="{{ $role->description }}"
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
    </div>

@endsection

@push('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                permission_selected: {!! $role->permissions->pluck('id') !!} ,
            }
        });
    </script>
@endpush

