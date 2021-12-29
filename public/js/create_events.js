$(function () {
    let event_type = "0";
    let event_key = "";
    const table = $('#events_table');
    //const csrfToken = document.head.querySelector("[name=csrf-token][content]").content
    let data_external_type = $('#data-external-type');
    let data_internal_type = $('#data-internal-type');
    let data_external_type_update = $('#modal-update-event #data-external-type');
    let data_internal_type_update = $('#modal-update-event #data-internal-type');
    let calendarEl = document.getElementById('calendar');
    let calendar;
    let banner = "";
    let banner_width = 0;
    let banner_height = 0;
    let sponsor_list_uploaded = [];
    let details_image = "";
    /*Table*/
    let calender_events_status = 0;
    let events_table_section = $('#events_table_section');
    let events_calender_section = $('#events_calender_section');
    let language = $('#language').val();
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        createEvent();
        selectEventType();
        upload_image();
        tabs_controler();
        remove_image();
        checkImageType();
        selectDate();
    });

    function selectDate(){
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;

        // or instead:
        // var maxDate = dtToday.toISOString().substr(0, 10);

        //alert(maxDate);
        console.log(maxDate);
        $('#start').attr('min', maxDate);
        $('#end').attr('min', maxDate);
    }

    function remove_image() {
        $(document).on('click', '#remove_image', function () {
            var id = $(this).data('id');
            remove_image(id);
        });
    }

    function tabs_controler() {
        $('.toggle-class').change(function () {
            calender_events_status = $(this).prop('checked') === true ? 1 : 0;
            //console.log(calender_events_status);
            switch (calender_events_status) {
                case 0:
                    console.log("type 0");
                    events_table_section.addClass("d-none");
                    events_calender_section.removeClass("d-none");
                    //prepareCalender();
                    calendar.refetchEvents();
                    break;
                case 1:
                    console.log("type 1")
                    events_table_section.removeClass("d-none");
                    events_calender_section.addClass("d-none");
                    table.DataTable().ajax.reload();
                    break;
            }
        });
    }

    function upload_image() {
        $('#banner').on('change', function (ev) {
            $('#banner_error').css('display', 'none');
            var filedata = ev.target.files[0];
            if (filedata) {
                //---image preview
                var reader = new FileReader();
                reader.onload = function (ev) {
                    $('#user-image').attr('src', "http://127.0.0.1:8000/uploadsevents/" + ev.target.result);
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
                    url: "/" + language +'/events/upload/image',
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
                            $('#image_user_uploaded img').attr('src', "http://127.0.0.1:8000/uploadsevents/" + banner);
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

    function selectEventType() {
        $('#event_type').on('change', function () {
            event_type = $('#event_type').val().toString();
            switch (event_type) {
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

    function eventDetailsErrorSwitchTab() {
        $("#step-1-tab").addClass("active show");  // this deactivates the home tab
        $("#step-2-tab").removeClass("active show");
        $("#home").addClass("active show");  // this deactivates the home tab
        $("#profile").removeClass("active show");
    }

    function eventMoreDetailsErrorSwitchTab() {
        $("#step-1-tab").removeClass("active show");  // this deactivates the home tab
        $("#step-2-tab").addClass("active show");
        $("#home").removeClass("active show");  // this deactivates the home tab
        $("#profile").addClass("active show");
    }

    function eventUserErrorSwitchTab() {
        $("#step-1-tab").removeClass("active show");  // this deactivates the home tab
        $("#step-2-tab").addClass("active show");
        $("#home").removeClass("active show");  // this deactivates the home tab
        $("#profile").addClass("active show");
    }

    function orgnizerErrorSwitchTab() {
        $("#nav-manager-tab").addClass("active show");
        $("#nav-organizer-tab").removeClass("active show");  // this deactivates the home tab
        $("#nav-profile").addClass("active show");
        $("#nav-home").removeClass("active show");  // this deactivates the home tab
    }

    function managerErrorSwitchTab() {
        $("#nav-organizer-tab").addClass("active show");  // this deactivates the home tab
        $("#nav-manager-tab").removeClass("active show");
        $("#nav-home").addClass("active show");  // this deactivates the home tab
        $("#nav-profile").removeClass("active show");
    }

    function createEvent() {
        $('#modal-add-event').modal('show');
        eventDetailsErrorSwitchTab();
        /*Data*/
        let event_external_link_input = $('#url');
        let organizer_ar_name_input = $('#organizer-ar-name');
        let organizer_en_name_input = $('#organizer-en-name');
        let organizer_phone_input = $('#organizer-phone');
        let organizer_email_input = $('#organizer-email');
        let organizer_website_name_input = $('#organizer-website-name');
        let organizer_website_url_input = $('#organizer-website-url');
        let manager_ar_name_input = $('#manager-ar-name');
        let manager_en_name_input = $('#manager-en-name');
        let manager_phone_input = $('#manager-phone');
        let manager_email_input = $('#manager-email');
        let sponsors_image_input = $('#sponsors-image');
        let details_image_input = $('#details_image_upload');
        let photo_image_input = $('#photo_gallery_upload');
        let video_image_input = $('#video_gallery_upload');

        /*Errors*/
        let title_ar_error = $('#title_ar_error');
        let title_en_error = $('#title_en_error');
        let description_en_error = $('#description_en_error');
        let description_ar_error = $('#description_ar_error');
        let start_error = $('#start_error');
        let end_error = $('#end_error');
        let location_error = $('#location_error');
        let category_error = $('#category_error');
        let type_error = $('#type_error');
        let url_error = $('#url_error');
        let organizer_ar_name_error = $('#organizer_ar_name_error');
        let organizer_en_name_error = $('#organizer_en_name_error');
        let organizer_phone_error = $('#organizer_phone_error');
        let organizer_email_error = $('#organizer_email_error');
        let organizer_website_name_error = $('#organizer_website_name_error');
        let organizer_website_url_error = $('#organizer_website_url_error');
        let manager_ar_name_error = $('#manager_ar_name_error');
        let manager_en_name_error = $('#manager_en_name_error');
        let manager_phone_error = $('#manager_phone_error');
        let manager_email_error = $('#manager_email_error');
        let sponsors_image_upload_error = $('#sponsors_image_upload_error');
        let details_image_upload_error = $('#details_image_upload_error');
        let photo_gallery_upload_error = $('#photo_gallery_upload_error');
        let video_gallery_upload_error = $('#video_gallery_upload_error');
        $('#submit_event').click(function () {
            /*Input field*/
            let title_en = $('#title_en').val();
            let title_ar = $('#title_ar').val();
            let description_en = $('#description_en').val();
            let description_ar = $('#description_ar').val();
            let event_start = $('#start').val();
            let event_end = $('#end').val();
            let location = $('#location').val();
            let category = $('#category').val();
            //event_key = title_en + title_ar + description_en + description_ar + event_start + event_end + location + category;
            $('#event_key').val(event_key)
            event_type = $('#event_type').val();
            let event_external_link = "";
            let organizer_ar_name = "";
            let organizer_en_name = "";
            let organizer_phone = "";
            let organizer_email = "";
            let organizer_website_name = "";
            let organizer_website_url = "";
            let manager_ar_name = "";
            let manager_en_name = "";
            let manager_phone = "";
            let manager_email = "";
            let sponsors_image = "";
            let photo_image = "";
            let video_image = "";
            // console.log(event_type);
            switch (event_type) {
                case "0":
                    event_external_link = event_external_link_input.val();
                    break;
                case "1":
                    /*{{--//TODO:: M**OOMEN S. A**LDAHDOUH 12/15/2021--}}*/
                    organizer_ar_name = organizer_ar_name_input.val();
                    organizer_en_name = organizer_en_name_input.val();
                    organizer_phone = organizer_phone_input.val();
                    organizer_email = organizer_email_input.val();
                    organizer_website_name = organizer_website_name_input.val();
                    organizer_website_url = organizer_website_url_input.val();
                    manager_ar_name = manager_ar_name_input.val();
                    manager_en_name = manager_en_name_input.val();
                    manager_phone = manager_phone_input.val();
                    manager_email = manager_email_input.val();
                    sponsors_image = sponsors_image_input.val();
                    photo_image = photo_image_input.val();
                    video_image = video_image_input.val();
                    break;
            }
            /*event_key = event_key + event_external_link + organizer_ar_name + organizer_en_name + organizer_phone + organizer_email
                + organizer_website_name + organizer_website_url + manager_ar_name + manager_en_name + manager_phone + manager_email;*/
            $.ajax({
                type: "POST",
                url: "store",
                data: {
                    _token: $("input[name=_token]").val(),
                    action: "create",
                    //event_key: event_key,
                    title_en: title_en,
                    title_ar: title_ar,
                    event_start: event_start,
                    event_end: event_end,
                    description_en: description_en,
                    description_ar: description_ar,
                    location: location,
                    category: category,
                    event_type: event_type,
                    sponsors_image: sponsor_list_uploaded,
                    details_image: details_image,
                    photo_image: photo_image,
                    video_image: video_image,
                    event_external_link: event_external_link,
                    organizer_ar_name: organizer_ar_name,
                    organizer_en_name: organizer_en_name,
                    organizer_phone: organizer_phone,
                    organizer_email: organizer_email,
                    organizer_website_name: organizer_website_name,
                    organizer_website_url: organizer_website_url,
                    manager_ar_name: manager_ar_name,
                    manager_en_name: manager_en_name,
                    manager_phone: manager_phone,
                    manager_email: manager_email,
                    banner: banner,
                },
                success: function (response) {
                    /*Reset values*/
                    if (response['error']) {
                        printErrorMsg(response['error']);
                    } else if (response['user_error']) {
                        eventUserErrorSwitchTab();
                        printErrorMsg(response['user_error']);
                    } else if (response['success']) {
                        eventDetailsErrorSwitchTab();
                        $('#user-image img').attr('src', "http://127.0.0.1:8000/public/images/add-event.png");
                        $('#banner_error').css('display', 'none');
                        title_ar_error.css('display', 'none');
                        title_en_error.css('display', 'none');
                        description_en_error.css('display', 'none');
                        description_ar_error.css('display', 'none');
                        organizer_ar_name_error.css('display', 'none');
                        organizer_en_name_error.css('display', 'none');
                        manager_ar_name_error.css('display', 'none');
                        manager_en_name_error.css('display', 'none');
                        url_error.css('display', 'none');
                        $('#successfully-event-modal').modal('show');
                        $('#title_en').val("");
                        $('#title_ar').val("");
                        $('#description_en').val("");
                        $('#description_ar').val("");
                        $('#start').val("");
                        $('#end').val("");
                        $('#location').val("");
                        //$('#category').val(0);
                        $('#event_type').val(0);
                        event_type = 0;
                        banner = "";
                        data_internal_type.hide();
                        data_external_type.attr('style', 'display:block !important');
                        event_external_link_input.val("");
                        organizer_ar_name_input.val("");
                        organizer_en_name_input.val("");
                        organizer_phone_input.val("");
                        organizer_email_input.val("");
                        organizer_website_name_input.val("");
                        organizer_website_url_input.val("");
                        manager_ar_name_input.val("");
                        manager_en_name_input.val("");
                        manager_phone_input.val("");
                        manager_email_input.val("");
                        sponsors_image_input.val("");
                        details_image_input.val("");
                        photo_image_input.val("");
                        video_image_input.val("");
                        title_en = "";
                        title_ar = "";
                        event_start = "";
                        event_end = "";
                        description_en = "";
                        description_ar = "";
                        location = "";
                        category = "";
                        event_type = "";
                        event_external_link = "";
                        organizer_ar_name = "";
                        organizer_en_name = "";
                        organizer_phone = "";
                        organizer_email = "";
                        organizer_website_name = "";
                        organizer_website_url = "";
                        manager_ar_name = "";
                        manager_en_name = "";
                        manager_phone = "";
                        manager_email = "";
                        sponsors_image = "";
                        details_image = "";
                        photo_image = "";
                        video_image = "";
                        //$('#modal-add-event').modal('toggle');
                        //calendar.refetchEvents();
                    }
                }

            });

            function printErrorMsg(msg) {
                if (msg['event_external_link']) {
                    eventMoreDetailsErrorSwitchTab();
                    url_error.html(msg['event_external_link']);
                    url_error.css('display', 'block');
                } else {
                    url_error.css('display', 'none');
                }
                if (msg['manager_ar_name']) {
                    orgnizerErrorSwitchTab();
                    manager_ar_name_error.html(msg['manager_ar_name']);
                    manager_ar_name_error.css('display', 'block');
                } else {
                    manager_ar_name_error.css('display', 'none');
                }
                if (msg['manager_en_name']) {
                    orgnizerErrorSwitchTab();
                    manager_en_name_error.html(msg['manager_en_name']);
                    manager_en_name_error.css('display', 'block');
                } else {
                    manager_en_name_error.css('display', 'none');
                }
                if (msg['organizer_ar_name']) {
                    managerErrorSwitchTab();
                    organizer_ar_name_error.html(msg['organizer_ar_name']);
                    organizer_ar_name_error.css('display', 'block');
                } else {
                    organizer_ar_name_error.css('display', 'none');
                }
                if (msg['organizer_en_name']) {
                    managerErrorSwitchTab();
                    organizer_en_name_error.html(msg['organizer_en_name']);
                    organizer_en_name_error.css('display', 'block');
                } else {
                    organizer_en_name_error.css('display', 'none');
                }
                if (msg['title_ar']) {
                    eventDetailsErrorSwitchTab();
                    title_ar_error.html(msg['title_ar']);
                    title_ar_error.css('display', 'block');
                } else {
                    title_ar_error.css('display', 'none');
                }
                if (msg['title_en']) {
                    eventDetailsErrorSwitchTab();
                    title_en_error.html(msg['title_en']);
                    title_en_error.css('display', 'block');
                } else {
                    title_en_error.css('display', 'none');
                }
                if (msg['event_start']) {
                    eventDetailsErrorSwitchTab();
                    start_error.html(msg['event_start']);
                    start_error.css('display', 'block');
                } else {
                    start_error.css('display', 'none');
                }
                if (msg['description_ar']) {
                    eventDetailsErrorSwitchTab();
                    description_ar_error.html(msg['description_ar']);
                    description_ar_error.css('display', 'block');
                } else {
                    description_ar_error.css('display', 'none');
                }
                if (msg['description_en']) {
                    eventDetailsErrorSwitchTab();
                    description_en_error.html(msg['description_en']);
                    description_en_error.css('display', 'block');
                } else {
                    description_en_error.css('display', 'none');
                }
            }
        });
    }

    /*Check*/
    let sponsors_list_images = $('#sponsors_list_images');
    let sponsors_image_body = sponsors_list_images.html();

    function checkImageType() {
        let sponsors_image_status = 0;
        let details_image_status = 0;
        let photo_image_status = 0;
        let video_image_status = 0;

        let sponsors_image_results = "";
        let details_image_results = "";
        let photo_image_results = "";
        let video_image_results = "";

        let sponsors_image_input = $('#sponsors-image');
        let details_image_input = $('#details-image');
        let photo_image_input = $('#photo-image');
        let video_image_input = $('#video-image');

        let sponsors_image_upload = $('#sponsors_image_upload');
        let details_image_upload = $('#details_image_upload');
        let photo_gallery_upload = $('#photo_gallery_upload');
        let video_gallery_upload = $('#video_gallery_upload');

        let details_image_upload_error = $('#details_image_upload_error');

        /*Sponsor*/
        sponsors_image_input.click(function () {
            sponsors_image_body = sponsors_list_images.html();
            if (sponsors_image_input.is(':checked')) {
                sponsors_image_upload.removeClass("d-none");
                sponsors_image_status = 1;
                upload_sponsor_image(sponsors_image_upload);
            } else {
                sponsors_image_upload.addClass("d-none");
                sponsors_image_status = 0;
                sponsor_list_uploaded = [];
            }
            console.log(sponsors_image_status);
        })
        /*Details image*/
        details_image_input.click(function () {
            if (details_image_input.is(':checked')) {
                details_image_upload.removeClass("d-none");
                details_image_status = 1;
                upload_details_image(details_image_upload, details_image_upload_error);
            } else {
                details_image_upload.addClass("d-none");
                details_image_status = 0;
            }
            console.log(details_image_status);
        })
        /*Photo gallery */
        photo_image_input.click(function () {
            if (photo_image_input.is(':checked')) {
                photo_gallery_upload.removeClass("d-none");
                photo_image_status = 1;
            } else {
                photo_gallery_upload.addClass("d-none");
                photo_image_status = 0;
            }
            console.log(photo_image_status);
        })
        /*Video gallery*/
        video_image_input.click(function () {
            if (video_image_input.is(':checked')) {
                video_gallery_upload.removeClass("d-none");
                video_image_status = 1;
            } else {
                video_gallery_upload.addClass("d-none");
                video_image_status = 0;
            }
            console.log(video_image_status);
        })
    }

    function upload_sponsor_image(button_upload) {
        let sponsors_image_upload_error = $('#sponsors_image_upload_error');

        let photo_gallery_upload_error = $('#photo_gallery_upload_error');
        let video_gallery_upload_error = $('#video_gallery_upload_error');
        button_upload.on('change', function (ev) {
            var filedata = ev.target.files[0];
            if (filedata) {

                //---image preview
                var reader = new FileReader();
                reader.onload = function (ev) {
                    //$('#user-image').attr('src', ev.target.result);
                };
                reader.readAsDataURL(this.files[0]);
                //upload
                let bannerUpload = new FormData();
                bannerUpload.append('file', this.files[0]);
                $.ajax({
                    url:"/" + language + '/events/upload/image',
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
                            sponsor_list_uploaded.push(banner);
                            sponsors_image_upload_error.html(response.success);
                            //$('#banner_error').css('color', '#002e80');
                            sponsors_image_upload_error.removeClass("text-danger");
                            sponsors_image_upload_error.addClass("text-primary");
                            sponsors_image_upload_error.css('display', 'block');
                            sponsors_image_body = sponsors_list_images.html();
                            sponsors_list_images.html(sponsors_image_body + ifSuccessUploadSponsorLogUpdateBody(banner));
                        } else {
                            printErrorMsg(response.error);
                        }
                    }
                });
            } else {
                console.log(banner_width + ":error:" + banner_height);
                sponsors_image_upload_error.html('Failed to upload try again');
                sponsors_image_upload_error.css('display', 'block');
            }

            function printErrorMsg(msg) {
                if (msg['banner']) {
                    sponsors_image_upload_error.html(msg['banner']);
                    sponsors_image_upload_error.css('display', 'block');
                } else {
                    sponsors_image_upload_error.css('display', 'none');
                }
            }
        });
    }

    /*Update part*/
    /*Multi images*/

    /*Check*/
    let sponsors_list_images_update = $('#modal-update-event #sponsors_list_images');
    let sponsors_image_body_update = sponsors_list_images_update.html();

    function upload_details_image(button_upload, error_p) {
        button_upload.on('change', function (ev) {
            var filedata = ev.target.files[0];
            if (filedata) {
                //---image preview
                var reader = new FileReader();
                reader.onload = function (ev) {
                    //$('#user-image').attr('src', ev.target.result);
                };
                reader.readAsDataURL(this.files[0]);
                //upload
                let bannerUpload = new FormData();
                bannerUpload.append('file', this.files[0]);
                $.ajax({
                    url:"/" + language + '/events/upload/image',
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
                            details_image = response.banner;
                            error_p.html(response.success);
                            error_p.removeClass("text-danger");
                            error_p.addClass("text-primary");
                            error_p.css('display', 'block');
                            $('#view_image_uploaded').attr('src', "http://127.0.0.1:8000/uploadsevents/" + details_image);
                        } else {
                            printErrorMsg(response.error);
                        }
                    }
                });
            } else {
                error_p.html("Failed to upload, try again");
                error_p.css('display', 'block');
            }

            function printErrorMsg(msg) {
                if (msg['banner']) {
                    error_p.html(msg['banner']);
                    error_p.css('display', 'block');
                } else {
                    error_p.css('display', 'none');
                }
            }
        });
    }

    function ifSuccessUploadSponsorLogUpdateBody(image) {
        console.log(image);
        return "<li class=\"mr-3 mt-3 mb-3\"\n" +
            "                                                                                style=\"float: left;\">\n" +
            "                                                                                <img id=\"sponsors_list_images_items\"\n" +
            "                                                                                     class=\"mr-2\" height=\"60\"\n" +
            "                                                                                     src=\"http://127.0.0.1:8000/uploadsevents/" + image + "\">\n" +
            "                                                                            </li>";
    }
});
