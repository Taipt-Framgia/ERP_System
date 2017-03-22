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
                @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="box-body">
                {{ Form::open(['action' => 'Auth\ForgotPasswordController@sendResetLinkEmail','class' => 'form-horizontal']) }}
                    <div class="form-group">
                        {{Form::label('email', trans('auth.label.username'), ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                            {{Form::email('email', '', ['class' => 'form-control'])}}
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