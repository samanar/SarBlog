<div class="uk-child-width-1-2@s m-t-10" uk-grid>
    <div class="">
        <h2><i class="fa fa-shield" aria-hidden="true"></i> Manage Roles</h2>
    </div>
    <div class="p-r-30">
        <a href="{{ route("roles.create") }}"
           class="uk-button uk-button-secondary uk-align-right@s">
            <i class="fa fa-plus" aria-hidden="true"></i> Create new Role</a>
    </div>
</div>
<div class="uk-container m-t-40 m-b-30">
    <div class="uk-grid uk-flex-center uk-child-width-1-1@s" uk-grid>
        @foreach ($roles as $key => $value)
            <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-card-small uk-grid-collapse
             uk-child-width-1-2@s uk-margin @if($key % 2 == 1) uk-card-primary @endif"
                 uk-grid>
                <div class="uk-padding-small">
                    <div class="uk-card-title">
                        <h3>
                            {{ $value->display_name }}
                            <div class="uk-text-meta uk-text-primary">{{ $value->name }}</div>
                        </h3>
                    </div>
                    <p>
                        Description : {{ str_limit($value->description , 70) }}
                        <br>
                        <br>
                        <a class="uk-button uk-button-default uk-button-small"
                           href="{{ route("roles.show" , $value->id) }}">details</a>
                        <a class="uk-button uk-button-primary uk-button-small"
                           href="{{ route("roles.edit" , $value->id) }}">Edit</a>
                    </p>
                </div>
                <div class="uk-padding uk-column-1-2">
                    <ul class="uk-list uk-list-bullet ">
                        @foreach($value->permissions as $key2 => $value2)
                            @if($key2 >= 5)
                                <li> ... </li>
                                @break
                            @endif
                            <li>{{ $value2->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

        @endforeach
    </div>

</div>