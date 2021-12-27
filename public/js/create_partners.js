/*start Project Setting and edit*/
$(function () {
    let banner = "";
    let banner_width = 0;
    let banner_height = 0;
    let banner_response = 0;
    let phone_error = $('#phone_error');
    let is_error_phone = false;
    let language = $('#language').val();
    $(document).ready(function () {
        $("#name_ar").focus();
        create_user();
        upload_image();
        tags();
    });

    function tags() {
        /*$('#phone_div input').tagsinput({
            maxTags: 4
        });*/
        $('#phone_div input').on('change', function (event) {
            var $element = $(event.target);
            $element.tagsinput({
                maxTags: 4
            });
            // event.tagsinput(4);
            var $container = $element.closest('.example');
            if (!$element.data('tagsinput'))
                return;

            var val = $element.val();
            if (val === null)
                val = "null";
            var items = $element.tagsinput('items');
            console.log(items);
            console.log(val);

            if (items.length === 4) {
                phone_error.removeClass("d-none");
            } else {
                phone_error.addClass("d-none");
                //$('#phone').val(val);
            }

            is_error_phone = 0;
            for (let i = 0; i < items.length; i++) {
                if (items.length > 0) {
                    if (items[i].length < 7 || items[i].length > 10) {
                        is_error_phone = is_error_phone + 1;
                        //console.log(items[i] + "length" + i);
                        //console.log(is_error_phone);
                        phone_error.removeClass("d-none");
                        phone_error.addClass("text-danger");
                        if (language === "en")
                            phone_error.html("The phone number length must be 8-10!");
                        else
                            phone_error.html("يجب أن يكون طول الرقم المدخل بين 8-10 أرقام!");
                        //$element.tagsinput('remove', items[4]);
                    } else if (!$.isNumeric(items[i])) {
                        console.log("asd");
                        phone_error.removeClass("d-none");
                        phone_error.addClass("text-danger");
                        if (language === "en")
                            phone_error.html("the phone must be number not contain alpha!");
                        else
                            phone_error.html("غير مسموح إدخال حروف فقط أرقام!");
                        //$element.tagsinput('remove', items[4]);
                        is_error_phone = is_error_phone + 1;
                    }
                }
            }

            $('code', $('pre.val', $container)).html(($.isArray(val) ? JSON.stringify(val) : "\"" + val.replace('"', '\\"') + "\""));
            $('code', $('pre.items', $container)).html(JSON.stringify($element.tagsinput('items')));
        }).trigger('change');
    }

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

    function create_user() {
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
        $('#create-partners').click(function () {
            if (is_error_phone > 0) {
                phone_error.removeClass("d-none");
                phone_error.addClass("text-danger");
                phone_error.html("the phone number length must be 8-10");
                return;
            }
            //const banner = $('#banner').val();
            const name_ar = $('#name_ar').val();
            const name_en = $('#name_en').val();
            const country_ar = $('#country_ar').val();
            const country_en = $('#country_en').val();
            const email = $('#email').val();
            const phone = $('#phone').val();
            console.log(phone);
            const website_name = $('#website_name').val();
            const website_url = $('#website_url').val();
            const location = $('#location').val();
            $.ajax({
                type: "POST",
                url: "/" + language + "/customusers/store/partners",
                data: {
                    _token: $("input[name=_token]").val(),
                    action: "create",
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
                    type: 1,
                },
                success: function (response) {
                    if ($.isEmptyObject(response.error)) {
                        banner_error.css('display', 'none');
                        name_ar_error.css('display', 'none');
                        name_en_error.css('display', 'none');
                        country_ar_error.css('display', 'none');
                        country_en_error.css('display', 'none');
                        $('#banner').val("");
                        $('#name_ar').val("");
                        $('#name_en').val("");
                        $('#country_ar').val("");
                        $('#country_en').val("");
                        $('#email').val("");
                        $('#website_name').val("");
                        $('#website_url').val("");
                        $('#location').val("");
                        $('#successfully-save #message').html(response.success);
                        $('#successfully-save').modal('show');
                        is_error_phone = 0;
                        $('#phone').tagsinput('removeAll');
                        /*setTimeout(function () {
                            window.location.href = "/customusers/partners/1";
                        }, 1000);*/
                    } else {
                        printErrorMsg(response.error);
                    }
                }
            });

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
        });
    }
});
