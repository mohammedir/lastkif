$(function () {
    const table = $('#annual-reports-table');
    const language = $('#language').val();
    let a_report_id = 0;
    let banner = "";
    let pdf = "";
    let banner_width = 0;
    let banner_height = 0;
    //Edit report
    $(document).ready(function () {
        get_special_reports();
        create_annual_report();
        upload_image();
        upload_pdf();

        $('#create_new_annual_report').click(function () {
            $('#create_annual_report').modal('show');
        });

        $('#edit_annual_report #edit_a_report').click(function () {
            update_annual_report(a_report_id);
        });

        /*Table Actions*/
        $(document).on('click', '#edit', function () {
            var id = $(this).data('id');
            a_report_id = id;
            edit_annual_report(id);
        });

        $(document).on('click', '#delete', function () {
            var id = $(this).data('id');
            confirm_delete(id);

        });
    });

    function upload_image() {
        $('#banner').on('change', function (ev) {
            $('#banner_error').css('display', 'none');
            var filedata = ev.target.files[0];
            if (filedata) {
                //---image preview
                var reader = new FileReader();
                reader.onload = function (ev) {
                    $('#user-image').attr('src', "http://127.0.0.1:8000/uploadreportsimage/" + ev.target.result);
                };
                reader.readAsDataURL(this.files[0]);

                /*Image diminutions*/
                var tmpImg = new Image();
                tmpImg.src = window.URL.createObjectURL(filedata);
                tmpImg.onload = function () {
                    banner_width = tmpImg.naturalWidth;
                    banner_height = tmpImg.naturalHeight;
                }
                //if (banner_width === 2000 || banner_height === 1000) {
                console.log(banner_width + "::" + banner_height);
                $('#banner_error').css('display', 'none');
                //upload
                let bannerUpload = new FormData();
                bannerUpload.append('file', this.files[0]);
                $.ajax({
                    url: "/" + language + '/annualreports/upload/image',
                    data: bannerUpload,
                    headers: {
                        'X-CSRF-Token': $('form.hidden-image-upload [name="_token"]').val()
                    },
                    dataType: 'json',
                    async: false,
                    type: 'post',
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response['success']) {
                            banner = response.banner;
                            //$('#image_user_uploaded img').attr('src', "{{asset(uploadcustomuser/" + banner + ")}}");
                            $('#image_user_uploaded img').attr('src', "http://127.0.0.1:8000/uploadreportsimage/" + banner);
                            $('#banner_error').html(response.success);
                            //$('#banner_error').css('color', '#002e80');
                            $('#banner_error').removeClass("text-danger");
                            $('#banner_error').addClass("text-primary");
                            $('#banner_error').css('display', 'block');
                        } else {
                            printErrorMsg(response.error);
                        }
                    }
                });
                /*} else {
                    console.log(banner_width + ":error:" + banner_height);
                    $('#banner_error').html('The valid diminutions must be 2:1, 2000*1000 px');
                    $('#banner_error').css('display', 'block');
                    $('#banner_error').addClass("text-danger");
                }*/
            } else {
                $('#banner_error').html("Failed to upload, try again");
                $('#banner_error').css('display', 'block');
                $('#banner_error').addClass("text-danger");
            }

            function printErrorMsg(msg) {
                if (msg['banner']) {
                    $('#banner_error').html(msg['banner']);
                    $('#banner_error').css('display', 'block');
                    $('#banner_error').addClass("text-danger");
                } else {
                    $('#banner_error').css('display', 'none');
                }
            }
        });
    }

    function upload_pdf() {
        $('#pdf').on('change', function (ev) {
            $('#pdf_error').css('display', 'none');
            var filedata = ev.target.files[0];
            if (filedata) {
                //---image preview
                var reader = new FileReader();
                reader.readAsDataURL(this.files[0]);

                $('#pdf_error').css('display', 'none');
                //upload
                let pdfUpload = new FormData();
                pdfUpload.append('file', this.files[0]);
                $.ajax({
                    url: "/" + language + '/annualreports/upload/pdf',
                    data: pdfUpload,
                    headers: {
                        'X-CSRF-Token': $('form.hidden-image-upload [name="_token"]').val()
                    },
                    dataType: 'json',
                    async: false,
                    type: 'post',
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response['success']) {
                            pdf = response.pdf;
                            $('#pdf_error').html(response.success);
                            $('#pdf_error').removeClass("text-danger");
                            $('#pdf_error').addClass("text-primary");
                            $('#pdf_error').css('display', 'block');
                        } else {
                            printErrorMsg(response.error);
                        }
                    }
                });
            } else {
                $('#pdf_error').html("Failed to upload, try again");
                $('#pdf_error').css('display', 'block');
                $('#pdf_error').addClass("text-danger");
            }

            function printErrorMsg(msg) {
                if (msg['pdf']) {
                    $('#pdf_error').html(msg['pdf']);
                    $('#pdf_error').css('display', 'block');
                    $('#banner_error').addClass("text-danger");
                } else {
                    $('#pdf_error').css('display', 'none');
                }
            }
        });
    }

    function confirm_delete(id) {
        $('#confirm-remove-modal').modal('show');
        $(document).on('click', '#confirm_delete', function () {
            delete_a_report(id);
        });
    }

    function delete_a_report(id) {
        $.ajax({
            type: "DELETE",
            url: "/" + language + "/annualreports/delete/" + id,
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

    function edit_annual_report(id) {
        const year_name_input = $('#edit_annual_report #year_name');
        $.ajax({
            type: "GET",
            url: "/" + language + "/annualreports/edit/" + id,
            data: {
                _token: $("input[name=_token]").val(),
            },
            success: function (response) {
                $('#edit_annual_report').modal('show');
                const a_report = response;
                year_name_input.val(a_report.year_name);
                a_report_id = a_report.id;
                banner = a_report.banner;
                pdf = a_report.pdf;
                console.log(pdf);
                $('#edit_annual_report #pdf_form a').attr('href', "http://127.0.0.1:8000/uploadreportspdf/" + a_report.pdf);
                $('#edit_annual_report #image_user_uploaded img').attr('src', "http://127.0.0.1:8000/uploadreportsimage/" + a_report.banner);
            }
        });
    }

    function get_special_reports() {
        table.DataTable({
            ajax: {
                "url": "annualreports",
                "type": 'GET',
            },
            columns: [
                {
                    name: 'id',
                }, {
                    data: 'year_name',
                    name: 'year_name',
                }, {
                    data: 'banner',
                    name: 'banner',
                }, {
                    data: 'pdf',
                    name: 'pdf',
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

    function create_annual_report() {
        const banner_error = $('#banner_error');
        const year_name_error = $('#year_name_error');
        const pdf_error = $('#pdf_error');
        banner_error.css('display', 'none');
        year_name_error.css('display', 'none');
        pdf_error.css('display', 'none');

        $('#create_a_report').click(function () {
            //const banner = $('#banner').val();
            const year_name = $('#year_name').val();
            $.ajax({
                type: "POST",
                url: "/" + language + "/annualreports/store",
                data: {
                    _token: $("input[name=_token]").val(),
                    action: "create",
                    banner: banner,
                    year_name: year_name,
                    pdf: pdf,
                },
                success: function (response) {
                    if ($.isEmptyObject(response.error)) {
                        banner_error.css('display', 'none');
                        year_name_error.css('display', 'none');
                        pdf_error.css('display', 'none');
                        $('#year_name').val("");
                        $('#banner').val("");
                        $('#pdf').val("");
                        banner = "";
                        pdf = "";
                        table.DataTable().ajax.reload();
                        $('#create_annual_report').modal('hide');
                        $('#successfully-save').modal('show');
                    } else {
                        printErrorMsg(response.error);
                    }
                }
            });

            /*{{--//TODO:: -- MOOMEN S. ALDAH/DOUH -- 12/10/2021--}}*/
            function printErrorMsg(msg) {
                if (msg['year_name']) {
                    year_name_error.html(msg['year_name']);
                    year_name_error.css('display', 'block');
                } else {
                    year_name_error.css('display', 'none');
                }
                if (msg['pdf']) {
                    pdf_error.html(msg['pdf']);
                    pdf_error.css('display', 'block');
                } else {
                    pdf_error.css('display', 'none');
                }
                if (msg['banner']) {
                    banner_error.html(msg['banner']);
                    banner_error.css('display', 'block');
                } else {
                    banner_error.css('display', 'none');
                }
            }
        });
    }

    function update_annual_report(id) {
        const banner_error = $('#edit_annual_report #banner_error');
        const year_name_error = $('#edit_annual_report #year_name_error');
        const pdf_error = $('#edit_annual_report #pdf_error');
        banner_error.css('display', 'none');
        year_name_error.css('display', 'none');
        pdf_error.css('display', 'none');

        const year_name = $('#edit_annual_report #year_name').val();
        $.ajax({
            type: "POST",
            url: "/" + language + "/annualreports/update/" + id,
            data: {
                _token: $("input[name=_token]").val(),
                action: "update",
                banner: banner,
                year_name: year_name,
                pdf: pdf,
            },
            success: function (response) {
                if ($.isEmptyObject(response.error)) {
                    banner_error.css('display', 'none');
                    year_name_error.css('display', 'none');
                    pdf_error.css('display', 'none');
                    table.DataTable().ajax.reload();
                    $('#edit_annual_report').modal('hide');
                    $('#successfully-save').modal('show');
                } else {
                    printErrorMsg(response.error);
                }
            }
        });

        /*{{--//TODO:: -- MOOMEN S. ALDAH/DOUH -- 12/10/2021--}}*/
        function printErrorMsg(msg) {
            if (msg['year_name']) {
                year_name_error.html(msg['year_name']);
                year_name_error.css('display', 'block');
            } else {
                year_name_error.css('display', 'none');
            }
            if (msg['pdf']) {
                pdf_error.html(msg['pdf']);
                pdf_error.css('display', 'block');
            } else {
                pdf_error.css('display', 'none');
            }
            if (msg['banner']) {
                banner_error.html(msg['banner']);
                banner_error.css('display', 'block');
            } else {
                banner_error.css('display', 'none');
            }
        }
    }
});
