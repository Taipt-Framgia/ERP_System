Dropzone.options.fileUploadForm = {
    init: function() {
        this.on("success",  function(file, data) {
            swal('file upload success');
            location.reload();
        })
        .on('error', function(file, data) {
            swal('something wrong');
            location.reload();
        });
    },
    maxFiles: 1,
}
$(document).ready(() => {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.create-folder').on('click', (e) => {
        let createFolder = $('.create-folder');
        let url = createFolder.data('url');
        let currentPath = createFolder.data('path');
        let title = createFolder.data('title');
        let placeholder = createFolder.data('placeholder');
        let inputError = createFolder.data('input-error');

        swal({
            title: title,
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: placeholder
        },
        function(inputValue){
            if (inputValue === false) return false;

            if (inputValue === "") {
                swal.showInputError(inputError);

                return false;
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: {folderName: inputValue, currentPath: currentPath},
            })
            .done(function(data) {
                swal(data.message)
                if (data.status == 1) {
                    location.reload();
                }
            })
            .fail(function(data) {
                swal(data.responseText);
            });
        });
    });

    $('.delete-folder').on('click', (e) => {
        e.preventDefault();
        let deleteFolder = $(e.target);
        let url = deleteFolder.data('url');
        let path = deleteFolder.data('path');
        let title = deleteFolder.data('title');
        let text = deleteFolder.data('text');
        let type = deleteFolder.data('type');

        swal({
            title: title,
            text: text,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function(){
            $.ajax({
                url: url,
                type: 'POST',
                data: {path: path, type: type},
            })
            .done(function(data) {
                swal(data.message)
                if (data.status == 1) {
                    location.reload();
                }
            })
            .fail(function(data) {
                console.log(data);
                swal(data.responseText);
            });
        });
    });

    $('.upload-file').on('click', () => {
        $('#upload-file').modal('show');
    });

    $('.download-file').on('click', (e) => {
        e.preventDefault();
        let file = $(e.target).data('path');
        $('#download-form input[name ="path"]').val(file);
        $('#download-form').submit();
    });

})