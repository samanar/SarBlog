@extends('layouts.manage')

@section('content')
    <div class="uk-child-width-1-2@s m-t-10" uk-grid>
        <div class="">
            <h2><i class="fa fa-gears" aria-hidden="true"></i> Manage Users</h2>
        </div>
        <div class="p-r-30">
            <a href="{{ route("users.create") }}"
               class="uk-button uk-button-secondary uk-align-right@s">
                <i class="fa fa-plus" aria-hidden="true"></i> Create new user</a>
        </div>
    </div>
    <div class="uk-container m-t-40 m-b-30">
        <table class="uk-table uk-table-middle uk-table-divider uk-table-hover
        uk-table-responsive uk-table-small">
            <thead>
            <tr class="uk-text-center">
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date Created</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->toFormattedDateString() }}</td>
                    <td>
                        <a href="{{ route("users.edit" , $user->id) }}"
                           class="uk-button uk-button-small uk-button-default">
                            Edit
                        </a>
                        <a href="{{ route("users.show" , $user->id) }}"
                           class="uk-button uk-button-small uk-button-primary">
                            Show
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $users->links() }}
@endsection