<!DOCTYPE html>
<html>
<head>
    @include('layouts.admin.includes.styles')
    <title>{{ trans('auth.login') }}</title>
</head>
<body class="content">
    <div class="col-md-6 col-md-offset-3 mt50">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3>{{ trans('auth.login') }}</h3>
                @include('layouts.admin.includes.notice_messages')
            </div>
            <div class="box-body">
                {{ Form::open(['action' => 'Auth\LoginController@login','class' => 'form-horizontal']) }}
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
                        <div class="col-sm-offset-2 col-sm-3">
                            <div class="checkbox">
                                <label>
                                    {{Form::checkbox('remember', null, null, ['id' => 'remember_me'])}}
                                    {{Form::label('remember_me', trans('auth.label.remember_me'))}}
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="checkbox">
                                <a href={{action('Auth\ForgotPasswordController@showLinkRequestForm')}}>{{ trans('language.forgot_password') }}</a>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="box-footer">
                    {{Form::submit(trans('auth.login'), ['class' => 'btn btn-primary col-sm-offset-2'])}}
                    <a href={{action('Auth\RegisterController@register')}} class="btn btn-primary">{{ trans('auth.register') }}</a>
            </div>
                {{ Form::close() }}

        </div>
    </div>
    @include('layouts.admin.includes.scripts')
</body>
</html>