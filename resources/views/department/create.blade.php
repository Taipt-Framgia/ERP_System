@extends('layouts.admin.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-heading">

            </div>
            <div class="box-body">
                {{ Form::open(['action' => 'DepartmentController@store','class' => 'form-horizontal']) }}
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    {{Form::label('name', trans('department.department_name'), ['class' => 'col-sm-2 control-label'])}}
                    <div class="col-sm-10">
                        {{Form::text('name', '', ['class' => 'form-control'])}}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                    {{Form::label('address', trans('department.address'), ['class' => 'col-sm-2 control-label'])}}
                    <div class="col-sm-10">
                        {{Form::text('address', '', ['class' => 'form-control'])}}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    {{Form::label('description', trans('department.description'), ['class' => 'col-sm-2 control-label'])}}
                    <div class="col-sm-10">
                        {{Form::textarea('description', '', ['class' => 'form-control'])}}
                    </div>
                </div>
            </div>
            <div class="box-footer">
                {{Form::submit(trans('department.create'), ['class' => 'btn btn-primary col-sm-offset-2'])}}
                <a href={{action('Auth\RegisterController@register')}} class="btn btn-primary">{{ trans('department.create_continue') }}</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection