/*start Project Setting and edit*/
$(function () {
    let banner = "";
    let hall_type = 0;
    let data_external_type = $('#data-external-type');
    let data_internal_type = $('#data-internal-type');
    $(document).ready(function () {
        $("#name_ar").focus();
        create_hall();
        selectEventType();
    });

    function selectEventType() {
        $('#hall_type').click(function () {
            hall_type = $('#hall_type').val().toString();
            switch (hall_type) {
                case "0":
                    console.log(hall_type)
                    data_internal_type.hide();
                    data_external_type.attr('style', 'display:block !important');
                    break;
                case "1":
                    console.log(hall_type)
                    data_internal_type.attr('style', 'display:block !important');
                    data_external_type.hide();
                    break;
            }
        });
    }

    function create_hall() {
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

        $('#create-halls').click(function () {
            let hall_url = "";
            let description_ar = "";
            let description_en = "";
            let widget_name_en = "";
            let widget_name_ar = "";
            let widget_value = "";
            const name_ar = $('#name_ar').val();
            const name_en = $('#name_en').val();
            if (hall_type === 0) {//Internal
                hall_url = $('#url').val();
                console.log("url:" + hall_url)
            } else { //External
                description_ar = $('#description_ar').val();
                description_en = $('#description_en').val();
                widget_name_en = $('#widget_name_en').val();
                widget_name_ar = $('#widget_name_ar').val();
                widget_value = $('#widget_value').val();
            }
            console.log(hall_type, name_ar, name_en, hall_url, description_ar, description_en, widget_name_en, widget_name_ar, widget_value)
            $.ajax({
                type: "POST",
                url: "/halls/store",
                data: {
                    _token: $("input[name=_token]").val(),
                    action: "create",
                    name_ar: name_ar,
                    name_en: name_en,
                    hall_url: hall_url,
                    description_ar: description_ar,
                    description_en: description_en,
                    widget_name_en: widget_name_en,
                    widget_name_ar: widget_name_ar,
                    widget_value: widget_value,
                    type: hall_type,
                },
                success: function (response) {
                    if ($.isEmptyObject(response.error)) {
                        name_ar_error.css('display', 'none');
                        name_en_error.css('display', 'none');
                        url_error.css('display', 'none');
                        description_ar_error.css('display', 'none');
                        description_en_error.css('display', 'none');
                        $('#name_ar').val("");
                        $('#name_en').val("");
                        $('#url').val("");
                        $('#description_ar').val("");
                        $('#description_en').val("");
                        $('#widget_name_en').val("");
                        $('#widget_name_ar').val("");
                        $('#widget_value').val("");
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
});
