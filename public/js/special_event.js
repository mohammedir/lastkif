$(function () {
    const table = $('#special_events-table');
    const language = $('#language').val();
    let s_event_id = 0;
    //Edit event
    $(document).ready(function () {
        get_special_events();
        create_special_event();

        $('#create_new_s_event').click(function () {
            $('#create_special_event').modal('show');
        });

        $('#edit_special_event #edit_s_event').click(function () {
            console.log(s_event_id)
            update_s_event(s_event_id);
        });

        /*Table Actions*/
        $(document).on('click', '#edit', function () {
            var id = $(this).data('id');
            s_event_id = id;
            edit_s_event(id);
        });

        $(document).on('click', '#delete', function () {
            var id = $(this).data('id');
            confirm_delete(id);

        });


    });

    function confirm_delete(id) {
        $('#confirm-remove-modal').modal('show');
        $(document).on('click', '#confirm_delete', function () {
            delete_s_event(id);
        });
    }

    function delete_s_event(id) {
        $.ajax({
            type: "DELETE",
            url: "/" + language + "/specialevents/delete/" + id,
            data: {
                _token: $("input[name=_token]").val()
            },
            success: function (response) {
                if (response['success']) {
                    // $('#successfully-save').modal('show');
                    table.DataTable().ajax.reload();
                } else if (response['error']) {
                    $('#something-wrong').modal('show');
                }
            }
        });
    }

    function edit_s_event(id) {
        const name_ar_input = $('#edit_special_event #name_ar');
        const name_en_input = $('#edit_special_event #name_en');
        const url_input = $('#edit_special_event #url');
        $.ajax({
            type: "GET",
            url: "/" + language + "/specialevents/edit/" + id,
            data: {
                _token: $("input[name=_token]").val(),
            },
            success: function (response) {
                $('#edit_special_event').modal('show');
                const s_event = response;
                name_ar_input.val(s_event.name['ar']);
                name_en_input.val(s_event.name['en']);
                url_input.val(s_event.url);
                s_event_id = s_event.id;
            }
        });
    }

    function update_s_event(id) {
        const name_ar_input = $('#edit_special_event #name_ar');
        const name_en_input = $('#edit_special_event #name_en');
        const url_input = $('#edit_special_event #url');
        const name_ar = name_ar_input.val();
        const name_en = name_en_input.val();
        const url = url_input.val();
        const name_ar_error = $('#edit_special_event #name_ar_error');
        const name_en_error = $('#edit_special_event #name_en_error');
        const url_error = $('#edit_special_event #url_error');
        name_ar_error.css('display', 'none');
        name_en_error.css('display', 'none');
        url_error.css('display', 'none');
        $.ajax({
            type: "POST",
            url: "/" + language + "/specialevents/update/" + id,
            data: {
                _token: $("input[name=_token]").val(),
                action: "update",
                name_ar: name_ar,
                name_en: name_en,
                url: url,
            },
            success: function (response) {
                if ($.isEmptyObject(response.error)) {
                    name_ar_error.css('display', 'none');
                    name_en_error.css('display', 'none');
                    url_error.css('display', 'none');
                    table.DataTable().ajax.reload();
                    $('#edit_special_event').modal('hide');
                    $('#successfully-save').modal('show');
                } else {
                    printErrorMsg(response.error);
                }
            }
        });

        /*{{--//TODO:: -- MOOMEN S. ALDAH/DOUH -- 12/10/2021--}}*/
        function printErrorMsg(msg) {
            if (msg['name_ar']) {
                name_ar_error.html(msg['name_ar']);
                name_ar_error.css('display', 'block');
            } else {
                name_ar_error.css('display', 'none');
            }
            if (msg['name_en']) {
                name_en_error.html(msg['name_en']);
                name_en_error.css('display', 'block');
            } else {
                name_en_error.css('display', 'none');
            }
            if (msg['url']) {
                url_error.html(msg['url']);
                url_error.css('display', 'block');
            } else {
                url_error.css('display', 'none');
            }
        }
    }


    function get_special_events() {
        table.DataTable({
            ajax: {
                "url": "specialevents",
                "type": 'GET',
            },
            columns: [
                {
                    name: 'id',
                }, {
                    data: 'name',
                    name: 'name',
                }, {
                    data: 'url',
                    name: 'url',
                }, {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            "columnDefs": [{
                "render": function (data, type, full, meta) {
                    return meta.row + 1; // adds id to serial no
                },
                "targets": 0
            }],
        });
    }

    function create_special_event() {
        const name_ar_error = $('#name_ar_error');
        const name_en_error = $('#name_en_error');
        const url_error = $('#url_error');
        name_ar_error.css('display', 'none');
        name_en_error.css('display', 'none');
        url_error.css('display', 'none');

        $('#create_s_event').click(function () {
            //const banner = $('#banner').val();
            const name_ar = $('#name_ar').val();
            const name_en = $('#name_en').val();
            const url = $('#url').val();
            $.ajax({
                type: "POST",
                url: "/" + language + "/specialevents/store",
                data: {
                    _token: $("input[name=_token]").val(),
                    action: "create",
                    name_ar: name_ar,
                    name_en: name_en,
                    url: url,
                },
                success: function (response) {
                    if ($.isEmptyObject(response.error)) {
                        name_ar_error.css('display', 'none');
                        name_en_error.css('display', 'none');
                        url_error.css('display', 'none');
                        $('#name_ar').val("");
                        $('#name_en').val("");
                        $('#url').val("");
                        table.DataTable().ajax.reload();
                        $('#create_special_event').modal('hide');
                        $('#successfully-save').modal('show');
                    } else {
                        printErrorMsg(response.error);
                    }
                }
            });

            /*{{--//TODO:: -- MOOMEN S. ALDAH/DOUH -- 12/10/2021--}}*/
            function printErrorMsg(msg) {
                if (msg['name_ar']) {
                    name_ar_error.html(msg['name_ar']);
                    name_ar_error.css('display', 'block');
                } else {
                    name_ar_error.css('display', 'none');
                }
                if (msg['name_en']) {
                    name_en_error.html(msg['name_en']);
                    name_en_error.css('display', 'block');
                } else {
                    name_en_error.css('display', 'none');
                }
                if (msg['url']) {
                    url_error.html(msg['url']);
                    url_error.css('display', 'block');
                } else {
                    url_error.css('display', 'none');
                }
            }
        });
    }
});
