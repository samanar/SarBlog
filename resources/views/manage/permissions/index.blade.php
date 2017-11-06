@extends("layouts.manage")

@section('content')

    @include('manage.permissions.partials.tab')

    <div class="uk-child-width-1-2@s m-t-10" uk-grid>
        <div class="">
            <h2><i class="fa fa-shield" aria-hidden="true"></i> Manage Permissions</h2>
        </div>
        <div class="p-r-30">
            <a href="{{ route("permissions.create") }}"
               class="uk-button uk-button-secondary uk-align-right@s">
                <i class="fa fa-plus" aria-hidden="true"></i> Create new Permission</a>
        </div>
    </div>
    <div class="uk-container m-t-40 m-b-30">
        <table class="uk-table uk-table-middle uk-table-divider uk-table-hover
        uk-table-responsive uk-table-small">
            <thead>
            <tr class="uk-text-center">
                <th>#</th>
                <th>Name</th>
                <th>Display Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->display_name }}</td>
                    <td>{{ $permission->description }}</td>
                    <td>
                        <a href="{{ route("permissions.edit" , $permission->id) }}"
                           class="uk-button uk-button-small uk-button-default">
                            Edit
                        </a>
                        <a href="{{ route("permissions.show" , $permission->id) }}"
                           class="uk-button uk-button-small uk-button-primary">
                            Show
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $permissions->links() }}
@endsection