@extends('layouts.admin.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="col-sm-2">
                    <a href={{action('FilesController@index', ['path' => $parent_path])}} class="pull-left btn btn-flat btn-primary @if ($parent_path == '' && $current_path == null)disabled @endif">
                            {{ trans('file.back') }}
                    </a>
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-flat btn-primary create-folder" data-url={{action('FilesController@create')}} data-path="{{$current_path}}">
                        {{ trans('file.new_folder') }}
                    </button>
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-flat btn-primary upload-file" data-path={{$current_path}}>
                        {{ trans('file.upload_file') }}
                    </button>
                </div>
            </div>
            <div class="box-body">
                @if (count($folders) == 0 && count($files) == 0)
                    {{ trans('file.empty') }}
                @else
                    @foreach ($folders as $folder)
                        <div class="folder col-md-3">
                            <div class="col-md-10">
                                <a href={{action('FilesController@index', ['path' => $folder])}} class="thumbnail"> {{ str_replace($current_path . '/', '', $folder) }}
                                    <img src="http://placehold.it/350x150">
                                </a>
                            </div>
                            <div class="col-md-2">
                                <div class="dropdown">
                                    <span class="glyphicon glyphicon-cog dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    </span>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#" class="delete-folder">{{ trans('file.delete_folder') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @foreach ($files as $file)
                    <div class="file col-md-3">
                        <a href="#" class="thumbnail">{{ str_replace($current_path . '/', '', $file) }}
                            <img src="http://placehold.it/350x150">
                        </a>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    {!! Html::script('assets/js/files_manager.js') !!}
@stop