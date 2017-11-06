@extends("layouts.manage")

@section('content')

    @include('manage.partials.tab')

    <ul class="uk-switcher">
        <li>
            @include("manage.permissions.index")
        <li>
            @include("manage.roles.index")
        </li>
    </ul>


@endsection