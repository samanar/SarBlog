@extends('layouts.manage')

@section('content')
    <div id="app">

        <div class="uk-width-1-1@s uk-align-center register_form">

            <h2>
                <i class="fa fa-plus" aria-hidden="true"></i>
                Create New Permission
            </h2>

            <form class="uk-form-stacked uk-width-5-6@s" role="form" method="POST"
                  action="{{ route('permissions.store') }}">

                {{ csrf_field() }}

                <div class="uk-margin uk-child-width-auto uk-grid">
                    <label for="">
                        <input type="radio" name="permission_type" value="basic" v-model="permissionType">
                        Basic Permission
                    </label>
                    <label for="">
                        <input type="radio" name="permission_type" value="crud" v-model="permissionType">
                        CRUD Permission
                    </label>
                </div>

                {{--  form for basic permission type  --}}
                <div v-if="permissionType == 'basic'">
                    <div class="uk-margin">
                        <label class="uk-form-label">Name (slug)</label>
                        <input id="name" type="text"
                               class="uk-input{{ $errors->has('name') ? ' uk-form-danger' : '' }}" name="name"
                               value="{{ old('name') }}" required autofocus>

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
                               value="{{ old('display_name') }}"
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
                               required>

                        @if ($errors->has('description'))
                            <div class="uk-alert-danger" uk-alert>
                                {{ $errors->first('description') }}
                            </div>
                        @endif
                    </div>
                </div>

                {{--  form for crud permission type --}}
                <div class="m-b-50" v-if="permissionType == 'crud'">


                    <div class="uk-margin">
                        <label class="uk-form-label">Resource</label>
                        <input type="text" name="resource" id="resource"
                               v-model="resource"
                               placeholder="Enter Resource name"
                               class="uk-input{{ $errors->has('resource') ? ' uk-form-danger' : '' }}"
                               required>

                        @if ($errors->has('resource'))
                            <div class="uk-alert-danger" uk-alert>
                                {{ $errors->first('resource') }}
                            </div>
                        @endif
                    </div>
                    <div class="uk-grid uk-grid-medium uk-grid-divider" uk-grid>
                        <div class="uk-width-1-4@s p-t-15">
                            <div class="uk-child-width-1-1\@s uk-grid-medium" uk-grid>
                                <label><input class="uk-checkbox " type="checkbox"
                                              name="crud[]"
                                              value="create"
                                              v-model="crud"> Create </label>
                                <label><input class="uk-checkbox" type="checkbox"
                                              name="crud[]"
                                              value="read"
                                              v-model="crud"> Read </label>
                                <label><input class="uk-checkbox" type="checkbox"
                                              name="crud[]"
                                              value="update"
                                              v-model="crud"> Update </label>
                                <label><input class="uk-checkbox" type="checkbox"
                                              name="crud[]"
                                              value="delete"
                                              v-model="crud"> Delete </label>
                            </div>

                        </div>
                        <div class="uk-width-3-4@s">
                            <div class="uk-overflow-auto">
                                <table class="uk-table uk-table-small uk-table-divider">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Display Name</th>
                                        <th>Description</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-if="resource.length < 2">
                                        <td colspan="3" class="uk-text-center uk-text-danger">
                                            Resource input can not be empty and should be at least three characters long
                                        </td>
                                    </tr>
                                    <tr v-for="item in crud" v-if="resource.length >= 3">
                                        <td v-text="create_crud_name(item)"></td>
                                        <td v-text="create_curd_display_name(item)"></td>
                                        <td v-text="create_crud_description(item)"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="uk-margin">
                    <button class="uk-button uk-button-primary" type="submit" name="button">Create Permission</button>
                </div>

            </form>

        </div>

    </div>
    <div class="uk-container uk-container-center m-t-10">
    </div>

    @push('scripts')
        <script>
            var app = new Vue({
                el: "#app",
                data: {
                    permissionType: 'basic',
                    resource: '',
                    crud: ['create', 'read', 'update', 'delete']
                },
                methods: {
                    create_crud_name: function (name) {
                        return name.toLowerCase() + "-" + this.resource.toLowerCase();
                    },
                    create_curd_display_name: function (name) {
                        return name.substr(0, 1).toUpperCase() + name.substr(1).toLowerCase() + ' ' +
                            this.resource.substr(0, 1).toUpperCase() + this.resource.substr(1).toLowerCase();
                    },
                    create_crud_description: function (name) {
                        return "Allow a user to " + name.toUpperCase() + " " +
                            this.resource.substr(0, 1).toUpperCase() + this.resource.substr(1).toLowerCase();
                    }
                }

            });
        </script>
    @endpush

@endsection