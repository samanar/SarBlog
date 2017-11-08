<div class="uk-card uk-card-default uk-card-body uk-width-1-5@s side_bar ">
    <ul class="uk-nav uk-nav-default uk-nav-parent-icon"
        uk-nav="multiple: true; targets : .uk-parent;">
        <li
                @if(isset($class) && $class =="dashboard")
                class="uk-active"
                @endif
        >
            <a href="{{ route('manage.dashboard') }}">
                <i class="fa fa-tachometer" aria-hidden="true"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                Administrator
            </a>
        </li>
        <li class="uk-parent @if(isset($class) && ($class == "create_posts" || $class == "list_posts"))
                uk-active uk-open @endif">
            <a href="#">
                <i class="fa fa-wordpress" aria-hidden="true"></i>
                Posts
            </a>
            <ul class="uk-nav-sub">
                <li>
                    <a
                            @if(isset($class) && $class == "create_posts")
                            style="color : black;"
                            @endif
                            href="{{ route("posts.create") }}">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Create New Post
                    </a>
                </li>
                <li>
                    <a
                            @if(isset($class) && $class == "list_posts")
                            style="color : black;"
                            @endif
                            href="{{ route("posts.index") }}">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        Manage Posts
                    </a>
                </li>
            </ul>
        </li>
        <li class="uk-parent @if(isset($class) && ($class == "users" || $class == "roles" || $class == "permissions"))
                uk-active uk-open @endif">
            <a href="#">
                <i class="fa fa-users" aria-hidden="true"></i>
                Users
            </a>
            <ul class="uk-nav-sub">
                <li>
                    <a
                            @if(isset($class) && $class == "users")
                            style="color : black;"
                            @endif
                            href="{{ route("users.index") }}">
                        <i class="fa fa-gears" aria-hidden="true"></i>
                        Manage Users
                    </a>
                </li>
                <li>
                    <a
                            @if(isset($class) && ($class == "roles" || $class == "permissions"))
                            style="color : black;"
                            @endif
                            href="{{ route("permission_role") }}">
                        <i class="fa fa-shield" aria-hidden="true"></i>
                        Roles &amp; Permissions
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>