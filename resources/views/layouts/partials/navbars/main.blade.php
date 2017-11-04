<nav class="uk-navbar-container uk-navbar-transparent uk-margin-bottom" uk-navbar="mode: click">

    <div class="uk-navbar-left">
        <div class="uk-navbar-nav">
            <li><a href="/" class="uk-navbar-item uk-logo">
                    <img src="{{ asset('images/logo.png') }}" alt="logo">
                    &nbsp;Sar Blog
                </a>
            </li>
            <li class="uk-visible@s"><a href="" class="uk-navbar-item">Discuss</a></li>
            <li class="uk-visible@s"><a href="" class="uk-navbar-item">Tutorial</a></li>
            <li class="uk-visible@s"><a href="" class="uk-navbar-item">Forum</a></li>
        </div>
    </div>

    @guest
        <div class="uk-navbar-right">
            <div class="uk-hidden@s uk-navbar-toggle" uk-navbar-toggle-icon type="button"
                 uk-toggle="target: #offcanvas-nav-default">
            </div>
            <div class="uk-navbar-nav">
                <li class="uk-visible@s"><a href="{{ route('login') }}" class="uk-navbar-item">
                        Login
                        &nbsp;
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                    </a></li>
                <li class="uk-visible@s"><a href="{{ route('register') }}" class="uk-navbar-item">
                        Register
                        &nbsp;
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a></li>
            </div>
        </div>
    @endguest
    @auth
        <div class="uk-navbar-right">
            <div class="uk-hidden@s uk-navbar-toggle" uk-navbar-toggle-icon type="button"
                 uk-toggle="target: #offcanvas-nav-default">
            </div>
            <ul class="uk-navbar-nav uk-visible@s m-r-15">
                <li>
                    <a href="#">{{ Auth::user()->name }}</a>
                    <div uk-dropdown>
                        <ul class="uk-nav uk-dropdown-nav">
                            <li >
                                <a href="">
                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                    profile
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-bell" aria-hidden="true"></i>
                                    Notifications
                                </a>
                            </li>
                            <li>
                                <a href="{{ route("manage.index") }}">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    Manage
                                </a>
                            <li class="uk-nav-divider"></li>
                            <li >
                                <a href="" class="logout">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    @endauth

</nav>


<div class="uk-offcanvas-content">

    <div id="offcanvas-nav-default" uk-offcanvas="overlay: true; flip: true; mode: push;">
        <div class="uk-offcanvas-bar uk-flex uk-flex-column">
            <ul class="uk-nav uk-nav-default uk-nav-center uk-margin-auto-vertical">
                <li><a href="#">Discuss</a></li>

                <li><a href="#">Tutorial</a></li>

                <li><a href="#">Forum</a></li>

                <li><a href="#">Active</a></li>
                <div class="uk-nav-divider"></div>
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>

                    <li><a href="{{ route('register') }}">Register</a></li>
                @endguest
                @auth
                    <li><a href="">Profile</a></li>

                    <li><a href="" class="logout">Logout</a></li>
                @endauth
            </ul>

        </div>
    </div>
</div>


<form action="{{ route("logout") }}" method="POST" class="uk-hidden" id="logout_form" name="logout_form">
    {{ csrf_field() }}
    <input type="submit" name="submit" value="submit" id="logout_form_submit">
</form>

@push('scripts')
    <script>
        $('document').ready(function () {
            $(".logout").click(function (event) {
                event.preventDefault();
                $("#logout_form_submit").click();
            });
        });

    </script>
@endpush