@extends('admin.admin_template')

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Company</h3>
    </div>

    <!-- form start -->
    @if (count($errors) > 0)
        <div class="box-body">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    @if(!isset($settings))
        {!! Form::open(['action' => ['Admin\Company\SettingController@store',$company->id], 'class' => 'form-horizontal']) !!}
        @include('admin.company.settings.form')
        {!! Form::close() !!}
    @else
        {!! Form::model($settings, ['method' => 'PATCH','action' => ['Admin\Company\SettingController@update', $company->id],
            'class' => 'form-horizontal']) !!}
            <div class="box-body">
                @include('admin.company.settings.form')
            </div>
        {!! Form::close() !!}
    @endif
</div>
@endsection