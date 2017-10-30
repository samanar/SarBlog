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
                <li class="uk-visible@s"><a href="{{ route('login') }}" class="uk-navbar-item">Login</a></li>
                <li class="uk-visible@s"><a href="{{ route('register') }}" class="uk-navbar-item">Register</a></li>
            </div>
        </div>
    @endguest
    @auth
        <div class="uk-navbar-right">
            <div class="uk-hidden@s uk-navbar-toggle" uk-navbar-toggle-icon type="button"
                 uk-toggle="target: #offcanvas-nav-default">
            </div>
            <ul class="uk-navbar-nav uk-visible@s">
                <li>
                    <a href="#">{{ Auth::user()->name }}</a>
                    <div uk-dropdown>
                        <ul class="uk-nav uk-dropdown-nav">
                            <li class="uk-text-center">
                                <a href="">profile</a>
                            </li>
                            <li class="uk-text-center">
                                <a href="" class="logout">Logout</a>
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

@push('javascripts')
    <script>
        $('document').ready(function () {
            $(".logout").click(function (event) {
                event.preventDefault();
                $("#logout_form_submit").click();
            });
        });

    </script>
@endpush