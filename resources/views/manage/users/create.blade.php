@extends('layouts.manage')

@section ('content')
    <div id="app">

        <div class="uk-width-1-1@s uk-align-center register_form">

            <h2>
                <i class="fa fa-plus" aria-hidden="true"></i>
                Create New User
            </h2>

            <form class="uk-form-stacked uk-width-5-6@s" role="form" method="POST" action="{{ route('users.store') }}">

                {{ csrf_field() }}

                <div>
                    <label class="uk-form-label">Name</label>
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
                    <label class="uk-form-label">Email Address</label>
                    <input id="email" type="email"
                           class="uk-input{{ $errors->has('email') ? ' uk-form-danger' : '' }}" name="email"
                           value="{{ old('email') }}"
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
                    <input type="text" name="password" id="password"
                           v-model="password"
                           class="uk-input{{ $errors->has('password') ? ' uk-form-danger' : '' }}"
                           required>

                    @if ($errors->has('password'))
                        <div class="uk-alert-danger" uk-alert>
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <div class="uk-margin">
                    <input class="uk-checkbox" type="checkbox" name="auto_generate"
                           v-model="auto_password">
                    Auto generate password ?
                </div>

                <div class="uk-margin">
                    <button class="uk-button uk-button-primary" type="submit" name="button">Create User</button>
                </div>

            </form>

        </div>

    </div>
    <div class="uk-container uk-container-center m-t-10">
    </div>
@endsection


@push('scripts')
    <script>
        var app = new Vue({
            el: "#app",
            data: {
                email: '',
                auto_password: true,
                password: ''
            }
            , watch: {
                email: function () {
                    if (this.auto_password) {
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
                auto_password: function () {
                    if (this.auto_password) {
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
        });
    </script>
@endpush
