$(function () {
    let status = $('.toggle-class').prop('checked') === true ? 1 : 0;
    var hall_id = $('#hall_id').val();
    var hall_type = $('#hall_type_hidden').val();
    let data_external_type = $('#data-external-type');
    let data_internal_type = $('#data-internal-type');
    $(document).ready(function () {
        $('#hall_type').val(hall_type);
        switch (hall_type) {
            case "0":
                data_internal_type.hide();
                data_external_type.attr('style', 'display:block !important');
                break;
            case "1":
                data_internal_type.attr('style', 'display:block !important');
                data_external_type.hide();
                break;
        }

        $('.toggle-class').change(function () {
            status = $(this).prop('checked') === true ? 1 : 0;
        })

        $('#remove-halls').click(function () {
            delete_hall()
        });

        edit_hall();
        selectEventType();
    });

    function selectEventType() {
        $('#hall_type').click(function () {
            hall_type = $('#hall_type').val().toString();
            switch (hall_type) {
                case "0":
                    data_internal_type.hide();
                    data_external_type.attr('style', 'display:block !important');
                    break;
                case "1":
                    data_internal_type.attr('style', 'display:block !important');
                    data_external_type.hide();
                    break;
            }
        });
    }

    function edit_hall() {
        let hall_url = "";
        let description_ar = "";
        let description_en = "";
        let widget_name_en = "";
        let widget_name_ar = "";
        let widget_value = "";
        let hall_url_input = $('#url');
        let description_ar_input = $('#description_ar');
        let description_en_input = $('#description_en');
        let widget_name_en_input = $('#widget_name_en');
        let widget_name_ar_input = $('#widget_name_ar');
        let widget_value_input = $('#widget_value');

        const name_ar_error = $('#name_ar_error');
        const name_en_error = $('#name_en_error');
        const url_error = $('#url_error');
        const description_ar_error = $('#description_ar_error');
        const description_en_error = $('#description_en_error');
        name_ar_error.css('display', 'none');
        name_en_error.css('display', 'none');
        url_error.css('display', 'none');
        description_ar_error.css('display', 'none');
        description_en_error.css('display', 'none');

        $('#update-halls').click(function () {
            let name_ar = $('#name_ar').val();
            let name_en = $('#name_en').val();
            if (hall_type == 0) {//Internal
                hall_url = hall_url_input.val();
            } else { //External
                description_ar = description_ar_input.val();
                description_en = description_en_input.val();
                widget_name_en = widget_name_en_input.val();
                widget_name_ar = widget_name_ar_input.val();
                widget_value = widget_value_input.val();
            }
            console.log(status, name_ar, name_en, hall_url, description_ar, description_en, widget_name_en, widget_name_ar, widget_value, hall_type, hall_id);
            $.ajax({
                type: "POST",
                url: "/halls/update/" + hall_id,
                data: {
                    _token: $("input[name=_token]").val(),
                    action: "update",
                    name_ar: name_ar,
                    name_en: name_en,
                    hall_url: hall_url,
                    description_ar: description_ar,
                    description_en: description_en,
                    widget_name_en: widget_name_en,
                    widget_name_ar: widget_name_ar,
                    widget_value: widget_value,
                    status: status,
                    type: hall_type,
                },
                success: function (response) {
                    if ($.isEmptyObject(response.error)) {
                        name_ar_error.css('display', 'none');
                        name_en_error.css('display', 'none');
                        url_error.css('display', 'none');
                        description_ar_error.css('display', 'none');
                        description_en_error.css('display', 'none');
                        $('#successfully-save #message').html(response.success);
                        $('#successfully-save').modal('show');
                        /*setTimeout(function () {
                            window.location.href = "/halls";
                        }, 1000);*/
                    } else {
                        printErrorMsg(response.error);
                    }
                }
            });

            /*{{--//TODO:: -- MOOMEN S. ALDAH/DOUH -- 12/19/2021--}}*/
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
                if (msg['hall_url']) {
                    url_error.html(msg['hall_url']);
                    url_error.css('display', 'block');
                } else {
                    url_error.css('display', 'none');
                }
                if (msg['description_ar']) {
                    description_ar_error.html(msg['description_ar']);
                    description_ar_error.css('display', 'block');
                } else {
                    description_ar_error.css('display', 'none');
                }
                if (msg['description_en']) {
                    description_en_error.html(msg['description_en']);
                    description_en_error.css('display', 'block');
                } else {
                    description_en_error.css('display', 'none');
                }
            }
        });
    }

    function delete_hall() {
        $.ajax({
            type: "DELETE",
            url: "/halls/delete/" + hall_id,
            data: {
                _token: $("input[name=_token]").val()
            },
            success: function (response) {
                if (response['success']) {
                    $('#successfully-remove').modal('show');
                    $('#successfully-remove #message').html(response['success']);
                    setTimeout(function () {
                        location.href = "/halls";
                    }, 1000);
                    //table.DataTable().ajax.reload();
                } else if (response['error']) {
                    $('#something-wrong').modal('show');
                    $('#something-wrong #message').html(response['error']);
                }
            }
        });
    }

});
