<!DOCTYPE html>
<html>
<head>
    @include('layouts.admin.includes.styles')
    <title>{{ trans('auth.reset_password') }}</title>
</head>
<body class="content">
    <div class="col-md-6 col-md-offset-3 mt50">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3>{{ trans('auth.reset_password') }}</h3>
                @include('layouts.admin.includes.notice_messages')
            </div>
            <div class="box-body">
                {{ Form::open(['action' => 'Auth\ResetPasswordController@reset','class' => 'form-horizontal']) }}
                    {{Form::hidden('token', $token)}}
                    <div class="form-group">
                        {{Form::label('email', trans('auth.label.username'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                            {{Form::email('email', '', ['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('password', trans('auth.label.password'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                            {{Form::password('password', ['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('password_confirmation', trans('auth.label.password_confirm'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                            {{Form::password('password_confirmation', ['class' => 'form-control'])}}
                        </div>
                    </div>
            </div>
            <div class="box-footer">
                    {{Form::submit(trans('auth.reset_password'), ['class' => 'btn btn-primary col-sm-offset-2'])}}
            </div>
                {{ Form::close() }}

        </div>
    </div>
    @include('layouts.admin.includes.scripts')
</body>
</html>