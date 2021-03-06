$(document).ready(() => {
    $(".js-select2").select2({
        ajax: {
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data, params) {
            console.log(data);
            // parse the results into the format expected by Select2
            // since we are using custom formatting functions we do not need to
            // alter the remote JSON data, except to indicate that infinite
            // scrolling can be used
            params.page = params.page || 1;

            return {
                    results: data.items,
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
        cache: true
        },
        escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: function (data) {
            if (data.id === '') { // adjust for custom placeholder values
                return 'Custom styled placeholder text';
            }

            return data.name;
        }, // omitted for brevity, see the source of this page
        templateSelection: template // omitted for brevity, see the source of this page
    });

    function template(data, container)
    {
        return data.name;
    }
});