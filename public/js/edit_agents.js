/*start Project Setting and edit*/
$(function () {
    //let status = $('.toggle-class').prop('checked') === true ? 1 : 0;
    const user_id = document.getElementById('user-id').value;
    let banner = $('#old_banner').val();
    console.log(banner);
    let banner_width = 0;
    let banner_height = 0;
    let banner_response = 0;
    let language = $('#language').val();
    $(document).ready(function () {
        /*Project settings*/
        $('#update-agents').click(function () {
            edit_user();
        });

        /*$('.toggle-class').change(function () {
            status = $(this).prop('checked') === true ? 1 : 0;
        })*/

        $('#remove-agents').click(function () {
            delete_user()
        });

        upload_image();
    })

    function upload_image() {
        $('#banner').on('change', function (ev) {
            console.log("here inside");
            var filedata = ev.target.files[0];
            if (filedata) {
                //---image preview
                var reader = new FileReader();
                /*reader.onload = function (ev) {
                    $('#user-image').attr('src', ev.target.result);
                };*/
                //reader.readAsDataURL(this.files[0]);
                /*Image diminutions*/
                var tmpImg = new Image();
                tmpImg.src = window.URL.createObjectURL(filedata);
                tmpImg.onload = function () {
                    banner_width = tmpImg.width;
                    banner_height = tmpImg.height;
                }
                /// preview end
                //upload
                let check_dim = banner_height * 2;
                console.log(banner_width + "::" + banner_height);
                //if (check_dim === banner_width) {
                console.log(check_dim);
                let bannerUpload = new FormData();
                bannerUpload.append('file', this.files[0]);
                console.log(bannerUpload);
                const language = $('#language').val();
                $.ajax({
                    url: "/" + language + '/customusers/upload/image',
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
                        banner_response = response;
                        if (response['success']) {
                            banner_width = 0;
                            banner_height = 0;
                            banner = response.banner;
                            $('#image_user_uploaded img').attr('src', "http://127.0.0.1:8000/uploadcustomuser/" + banner);
                            $('#banner_error').html(response.success);
                            //$('#banner_error').css('color', '#002e80');
                            $('#banner_error').removeClass("text-danger");
                            $('#banner_error').addClass("text-primary");
                            $('#banner_error').css('display', 'block');
                        } else {
                            banner_width = 0;
                            banner_height = 0;
                            printErrorMsg(response.error);
                        }
                    }
                });
                /*} else {
                    //Error diminutions
                    banner_width = 0;
                    banner_height = 0;
                    if (language == "en")
                        $('#banner_error').html("The image dimensions must be in 2:1");
                    else
                        $('#banner_error').html("أبعاد الصورة يجب أن تكون 2:1");
                    $('#banner_error').addClass("text-danger");
                    $('#banner_error').removeClass("text-primary");
                    $('#banner_error').css('display', 'block');
                }*/
            } else {
                banner_width = 0;
                banner_height = 0;
                if (language == "en")
                    $('#banner_error').html("Failed to upload, try again");
                else
                    $('#banner_error').html("فشل تحميل الصورة حاول مرة أخرى");
                $('#banner_error').addClass("text-danger");
                $('#banner_error').removeClass("text-primary");
                $('#banner_error').css('display', 'block');
            }

            function printErrorMsg(msg) {
                if (msg['banner']) {
                    $('#banner_error').html(msg['banner']);
                    $('#banner_error').addClass("text-danger");
                    $('#banner_error').removeClass("text-primary");
                    $('#banner_error').css('display', 'block');
                } else {
                    $('#banner_error').css('display', 'none');
                }
            }
        });
    }

    function edit_user() {
        const id = $('#user-id').val();
        const name_ar = $('#name_ar').val();
        const name_en = $('#name_en').val();
        const country_ar = $('#country_ar').val();
        const country_en = $('#country_en').val();
        const email = $('#email').val();
        const phone = $('#phone').val();
        const website_name = $('#website_name').val();
        const website_url = $('#website_url').val();
        const location = $('#location').val();
        console.log(name_ar, name_en, country_ar, country_en, email, phone, website_name, website_url, location);
        const banner_error = $('#banner_error');
        const name_ar_error = $('#name_ar_error');
        const name_en_error = $('#name_en_error');
        const country_ar_error = $('#country_ar_error');
        const country_en_error = $('#country_en_error');
        banner_error.css('display', 'none');
        name_ar_error.css('display', 'none');
        name_en_error.css('display', 'none');
        country_ar_error.css('display', 'none');
        country_en_error.css('display', 'none');
        $.ajax({
            method: "POST",
            url: "/" + language + "/customusers/update/agents/" + id,
            data: {
                _token: $("input[name=_token]").val(),
                action: "update",
                id: id,
                banner: banner,
                name_ar: name_ar,
                name_en: name_en,
                country_ar: country_ar,
                country_en: country_en,
                email: email,
                phone: phone,
                website_name: website_name,
                website_url: website_url,
                location: location,
            },
            success: function (response) {
                if ($.isEmptyObject(response.error)) {
                    banner_error.css('display', 'none');
                    name_ar_error.css('display', 'none');
                    name_en_error.css('display', 'none');
                    country_ar_error.css('display', 'none');
                    country_en_error.css('display', 'none');
                    $('#successfully-save #message').html(response.success);
                    $('#successfully-save').modal('show');
                    /*setTimeout(function () {
                        window.location.href = "/customusers/agents/0";
                    }, 1000);*/
                } else {
                    printErrorMsg(response.error);
                }

                /*{{--//TODO:: -- MOOMEN S. ALDAH/DOUH -- 12/10/2021--}}*/
                function printErrorMsg(msg) {
                    if (msg['banner']) {
                        banner_error.html(msg['banner']);
                        banner_error.css('display', 'block');
                    } else {
                        banner_error.css('display', 'none');
                    }
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
                    if (msg['country_ar']) {
                        country_ar_error.html(msg['country_ar']);
                        country_ar_error.css('display', 'block');
                    } else {
                        country_ar_error.css('display', 'none');
                    }
                    if (msg['country_en']) {
                        country_en_error.html(msg['country_en']);
                        country_en_error.css('display', 'block');
                    } else {
                        country_en_error.css('display', 'none');
                    }
                }
            }
        });
    }

    function delete_user() {
        $.ajax({
            type: "DELETE",
            url: "/customusers/delete/" + user_id,
            data: {
                _token: $("input[name=_token]").val()
            },
            success: function (response) {
                if (response['success']) {
                    $('#successfully-remove').modal('show');
                    $('#successfully-remove #message').html(response['success']);
                    setTimeout(function () {
                        location.href = "/customusers/agents/0";
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
