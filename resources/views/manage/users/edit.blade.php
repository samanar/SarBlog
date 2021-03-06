@extends('layouts.manage')

@section ('content')
    <div id="app">
        <div class="uk-container uk-container-center m-t-10">

            <div class="uk-width-1-1@s uk-align-center register_form">

                <h3>
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Edit User
                </h3>

                <form class="uk-form-stacked uk-width-5-6@s" role="form" method="POST"
                      action="{{ route('users.update' , $user->id) }}">
                    {{ method_field("PUT") }}
                    {{ csrf_field() }}
                    <div class="uk-grid-divider" uk-grid>
                        <div class="uk-width-2-3@s">
                            <div>
                                <label class="uk-form-label">Name</label>
                                <input id="name" type="text"
                                       class="uk-input{{ $errors->has('name') ? ' uk-form-danger' : '' }}" name="name"
                                       value="{{ $user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <div class="uk-alert-danger" uk-alert>
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label">Email Address</label>
                                <input id="email" type="email"
                                       class="uk-input{{ $errors->has('email') ? ' uk-form-danger' : '' }}"
                                       name="email"
                                       v-model="email"
                                       required>

                                @if ($errors->has('email'))
                                    <div class="uk-alert-danger" uk-alert>
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label">Password</label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    <label><input class="uk-radio" type="radio" name="password_type"
                                                  value="keep" v-model="password_type">
                                        Do Not Change Password
                                    </label>
                                    <div class="uk-margin-small-top">
                                        <label><input class="uk-radio" type="radio" name="password_type"
                                                      value="auto" v-model="password_type">
                                            Auto Generate New Password
                                        </label>
                                    </div>
                                    <div class="uk-margin-small-top">
                                        <label><input class="uk-radio" type="radio" name="password_type"
                                                      value="manuall" v-model="password_type">
                                            Manually Set New Password
                                        </label>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <input type="text" name="password" id="password"
                                           class="uk-input{{ $errors->has('password') ? ' uk-form-danger' : '' }}"
                                           v-if="password_type != 'keep'"
                                           v-model="password"
                                           :readonly="password_type == 'auto'">

                                    @if ($errors->has('password'))
                                        <div class="uk-alert-danger" uk-alert>
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-1-3@s">
                            <div class="uk-margin">
                                <div class="uk-grid uk-grid-small uk-child-width-1-1@s" uk-grid>
                                    <h3>Assign Roles</h3>
                                    @foreach($roles as $role)
                                        <label>
                                            <input type="checkbox" class="uk-checkbox" value="{{ $role->id }}"
                                                   name="roles[]"
                                                   v-model="roles"> {{ $role->display_name }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <button class="uk-button uk-button-primary" type="submit" name="button">Edit User</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
@endsection


@push('scripts')
    <script>
        var app = new Vue({
                el: "#app",
                data: {
                    password_type: 'keep',
                    roles: {!! $user->roles()->pluck('id') !!},
                    email: '{{ $user->email }}',
                    password: ''
                },
                watch: {
                    password_type: function () {
                        if (this.password_type == "auto") {
                            if (this.email.includes("@")) {
                                if (this.email.indexOf("@") < this.email.length - 1) {
                                    this.password = this.email.split('@')[0];
                                } else if (this.email.indexOf("@") == this.email.length - 1) {
                                    this.password = this.email.replace("@", "");
                                }
                            } else {
                                this.password = this.email;
                            }
                        }
                    },
                    email: function () {
                        if (this.password_type == "auto") {
                            if (this.email.includes("@")) {
                                if (this.email.indexOf("@") < this.email.length - 1) {
                                    this.password = this.email.split('@')[0];
                                } else if (this.email.indexOf("@") == this.email.length - 1) {
                                    this.password = this.email.replace("@", "");
                                }
                            } else {
                                this.password = this.email;
                            }
                        }
                    }
                }
            })
        ;
    </script>
@endpush
