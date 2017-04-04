@extends('layouts.admin.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-heading">

            </div>
            <div class="box-body">
                {{ Form::open(['action' => 'UserController@store','class' => 'form-horizontal']) }}
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        {{Form::label('email', trans('language.email'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                            {{Form::text('email', '', ['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        {{Form::label('password', trans('language.password'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                            {{Form::password('password', ['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        {{Form::label('password_confirmation', trans('language.password_confirmation'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                            {{Form::password('password_confirmation', ['class' => 'form-control'])}}
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