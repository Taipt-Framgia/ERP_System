$(document).ready(() => {
    $('.create-folder').on('click', () => {
        let url = $('.create-folder').data('url');
        let currentPath = $('.create-folder').data('path');

        swal({
            title: "An input!",
            text: "Write something interesting:",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "Write something"
        },
        function(inputValue){
            if (inputValue === false) return false;

            if (inputValue === "") {
                swal.showInputError("You need to write something!");
                return false
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

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
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
        });
    });

    $('.delete-folder').on('click', () => {
        let url = $('.create-folder').data('url');
        let currentPath = $('.create-folder').data('path');

        swal({
            title: "An input!",
            text: "Write something interesting:",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "Write something"
        },
        function(inputValue){
            if (inputValue === false) return false;

            if (inputValue === "") {
                swal.showInputError("You need to write something!");
                return false
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

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
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
        });
    });
})