<div class="uk-card uk-card-default uk-card-body uk-width-1-5@s side_bar">
    <ul class="uk-nav uk-nav-default uk-nav-parent-icon" uk-nav="multiple: true">
        <li class="uk-active"><a href="{{ route('manage.dashboard') }}">
                <i class="fa fa-tachometer" aria-hidden="true"></i>

                Dashboard
            </a></li>
        <li class="">
            <a href="#">
                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                Administrator
            </a>
        </li>
        <li class="uk-parent">
            <a href="#">
                <i class="fa fa-users" aria-hidden="true"></i>
                Users
            </a>
            <ul class="uk-nav-sub">
                <li><a href="#">
                        <i class="fa fa-gears" aria-hidden="true"></i>
                        Manage Users
                    </a></li>
                <li><a href="#">
                        <i class="fa fa-shield" aria-hidden="true"></i>
                        Rules &amp; Permissions
                    </a></li>
            </ul>
        </li>
    </ul>
</div>