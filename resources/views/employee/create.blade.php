@extends('layouts.admin.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-heading">

            </div>
            <div class="box-body">
                {{ Form::open(['action' => 'EmployeeController@store','class' => 'form-horizontal']) }}
                    <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                        {{Form::label('first_name', trans('language.employee_first_name'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                            {{Form::text('first_name', '', ['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                        {{Form::label('last_name', trans('language.employee_last_name'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                            {{Form::text('last_name', '', ['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('date_of_birth') ? 'has-error' : '' }}">
                        {{Form::label('date_of_birth', trans('language.employee_dob'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                            {{Form::date('date_of_birth', '', ['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                        {{Form::label('address', trans('language.address'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                            {{Form::text('address', '', ['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('position') ? 'has-error' : '' }}">
                        {{Form::label('position', trans('language.position'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                            {{Form::text('position', '', ['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        {{Form::label('description', trans('language.description'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                            {{Form::textarea('description', '', ['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                        {{Form::label('phone', trans('language.phone'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                            {{Form::text('phone', '', ['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('department_id') ? 'has-error' : '' }}">
                        {{Form::label('department_id', trans('language.department'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                            {{Form::select('department_id', [], null, ['class' => 'js-select2 col-sm-2 control-label', 'data-ajax--url' => action('DepartmentController@apiDepartment')])}}
                        </div>
                    </div>
            </div>
            <div class="box-footer">
                    {{Form::submit(trans('language.create'), ['class' => 'btn btn-primary col-sm-offset-2'])}}
                    <a href={{action('Auth\RegisterController@register')}} class="btn btn-primary">{{ trans('language.create_continue') }}</a>
            </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    {{Html::script('assets\js\employee.js')}}
@stop