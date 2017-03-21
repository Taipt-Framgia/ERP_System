<!DOCTYPE html>
<html>
<head>
    @include('layouts.admin.includes.styles')
    <title>{{ trans('language.login') }}</title>
</head>
<body class="content">
    <div class="col-md-6 col-md-offset-3 mt50">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3>{{ trans('language.login') }}</h3>
                @include('layouts.admin.includes.notice_messages')
            </div>
            <div class="box-body">
                {{ Form::open(['action' => 'Auth\LoginController@login','class' => 'form-horizontal']) }}
                    <div class="form-group">
                        {{Form::label('email', trans('language.label.username'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                            {{Form::email('email', '', ['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('password', trans('language.label.password'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                            {{Form::password('password', ['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    {{Form::checkbox('remember_me', null, null, ['id' => 'remember_me'])}}
                                    {{Form::label('remember_me', trans('language.label.remember_me'))}}
                                </label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="box-footer">
                    {{Form::submit(trans('language.login'), ['class' => 'btn btn-primary col-sm-offset-2'])}}
                    <a href={{action('Auth\RegisterController@register')}} class="btn btn-primary">{{ trans('language.register') }}</a>
            </div>
                {{ Form::close() }}

        </div>
    </div>
    @include('layouts.admin.includes.scripts')
</body>
</html>