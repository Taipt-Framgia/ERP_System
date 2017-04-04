@extends('layouts.admin.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-heading">

            </div>
            <div class="box-body">
                {{ Form::open(['action' => ['DepartmentController@update', $department->id],'class' => 'form-horizontal']) }}
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        {{Form::label('name', trans('department.department_name'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                            {{Form::text('name', $department->name, ['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('parent_id', trans('department.parent_id'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                            {{Form::select('parent_id', $parentLists, $department->parent_id, ['class' => 'form-control', 'disabled'])}}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                        {{Form::label('address', trans('department.address'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                            {{Form::text('address', $department->address, ['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        {{Form::label('description', trans('department.description'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                            {{Form::textarea('description', $department->description, ['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('disk_path', trans('department.disk_path'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                            {{Form::text('disk_path', $department->disk_path, ['class' => 'form-control', 'readonly'])}}
                        </div>
                    </div>

            </div>
            <div class="box-footer">
                    {{Form::submit(trans('department.update'), ['class' => 'btn btn-primary col-sm-offset-2'])}}
            </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection