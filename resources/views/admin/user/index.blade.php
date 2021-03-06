@extends('admin.admin_template')

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $page_title }}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div id="users_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="users" class="table table-bordered table-striped hover dataTable" role="grid"
                               aria-describedby="users_info" data-form="deleteForm">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="users" rowspan="1" colspan="1"
                                    aria-sort="ascending" aria-label="ID: activate to sort column ascending" style="width: 5px;">ID
                                </th>
                                @if(!Auth::user()->isClientAdmin())
                                <th class="sorting" tabindex="0" aria-controls="users" rowspan="1" colspan="1"
                                    aria-label="Type: activate to sort column descending"
                                    style="width: 30px;">Type
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="users" rowspan="1" colspan="1"
                                    aria-label="Full Name: activate to sort column ascending" style="width: 120px;">Company
                                </th>
                                @endif
                                <th class="sorting" tabindex="0" aria-controls="users" rowspan="1" colspan="1"
                                    aria-label="Full Name: activate to sort column ascending" style="width: 60px;">Contact
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="users" rowspan="1" colspan="1"
                                    aria-label="Active: activate to sort column ascending" style="width: 30px;">E-Mail
                                </th>
                                <th rowspan="1" colspan="1" style="width: 3px;">R
                                </th>
                                <th rowspan="1" colspan="1" style="width: 3px;">S
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="users" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending" style="width: 50px;">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr role="row" class="odd"  data-href="{{URL::to('/admin/user/' . $user->id)}}">
                                    <td class="sorting_1">{{ $user->id }}</td>
                                    @if(!Auth::user()->isClientAdmin())
                                    <td>{{ isset($user->entity) ? ucfirst($user->entity->type) : '' }}</td>
                                    <td>{{ $user->entity->name }}</td>
                                    @endif
                                    <td>{{ $user->full_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->recipients->count() }}</td>
                                    <td>{{ $user->fax_id ? 1 : 0 }}</td>
                                    <td>
                                        {{ link_to_action('Admin\UserController@show', $title = 'Show',
                                            $parameters = array($user->id),
                                            $attributes = array('class' => 'btn btn-xs btn-success')) }}
                                        {{ link_to_action('Admin\UserController@edit', $title = 'Edit',
                                            $parameters = array($user->id),
                                            $attributes = array('class' => 'btn btn-xs btn-info')) }}
                                        {!! Form::open(['method' => 'DELETE','action' => ['Admin\UserController@destroy', $user->id],'class' => 'form-delete','style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger delete', 'name' => 'delete_modal']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix no-border">
            <a class="btn btn-large btn-info pull-right" href="/admin/user/create"> <i class="fa fa-plus"></i> Create
                User</a>
        </div>
    </div>




@endsection
