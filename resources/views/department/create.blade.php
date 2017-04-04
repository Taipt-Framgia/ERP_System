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
                        <div class="col-sm-5">
                            {{Form::text('name', '', ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                        {{Form::label('parent_id', trans('department.department_parent'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-5">
                            {{Form::select('parent_id', $parentLists, null,['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                        {{Form::label('address', trans('department.address'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-5">
                            {{Form::text('address', '', ['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        {{Form::label('description', trans('department.description'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-5">
                            {{Form::textarea('description', '', ['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('disk_path') ? 'has-error' : '' }}">
                        {{Form::label('disk_path', trans('department.disk_path'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-5">
                            {{Form::text('disk_path', '', ['class' => 'form-control'])}}
                        </div>
                    </div>
            </div>
            <div class="box-footer">
                {{Form::submit(trans('department.create'), ['class' => 'btn btn-primary col-sm-offset-2'])}}
                <a href class="btn btn-primary">{{ trans('department.create_continue') }}</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection