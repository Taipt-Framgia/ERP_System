<div class="example-modal">
    <div class="modal" id="upload-file">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">{{ trans('language.line') }}</h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(['action' => 'FilesController@uploadFile', 'class' => 'dropzone', 'id' => 'file-upload-form']) }}
                        {{ Form::hidden('path', $current_path) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>