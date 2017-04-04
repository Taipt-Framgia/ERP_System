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
                    <button class="btn btn-flat btn-primary create-folder" data-url={{action('FilesController@create')}} data-path="{{$current_path}}" data-title="{{ trans('language.input') }}" data-placeholder="{{ trans('language.file_name_placeholder') }}"" data-input-error="{{ trans('language.input_error') }}">
                        {{ trans('file.new_folder') }}
                    </button>
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-flat btn-primary upload-file" data-path="{{$current_path}}">
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
                                        <li><a href="" class="delete-folder" data-url={{action('FilesController@delete')}} data-path="{{$folder}}" data-title="{{ trans('language.delete') }}" data-text="{{ trans('language.delete_warning') }}" data-type="folder">{{ trans('file.delete_folder') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @foreach ($files as $file)
                    <div class="file col-md-3">
                        <div class="col-md-10">
                            <span class="thumbnail">{{ str_replace($current_path . '/', '', $file) }}
                                <img src="http://placehold.it/350x150">
                            </span>
                        </div>
                        <div class="col-md-2">
                            <div class="dropdown">
                                <span class="glyphicon glyphicon-cog dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                </span>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="" class="delete-folder" data-url="{{action('FilesController@delete')}}" data-path="{{$file}}" data-title="{{ trans('language.delete') }}" data-text="{{ trans('language.delete_warning') }}" data-type="file">{{ trans('file.delete_file') }}</a></li>
                                    <li><a href="" class="download-file" data-path="{{$file}}">{{ trans('file.download_file') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
<div>
    {{Form::open(['action' => "FilesController@downloadFile", 'id' => 'download-form'])}}
        {{Form::hidden('path', '')}}
    {{Form::close()}}
</div>
@include('elements.upload_file_modal')
@endsection
@section('script')
    {!! Html::script('assets/js/files_manager.js') !!}
@stop