$(function () {
    let event_type = 0;
    let event_key = "";
    const table = $('#events_table');
    //const csrfToken = document.head.querySelector("[name=csrf-token][content]").content
    let data_external_type_update = $('#data-external-type');
    let data_internal_type_update = $('#data-internal-type');
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
    let event_id = $('#event_id').val();
    let language = $('#language').val();
    /*Input*/
    let title_ar_input = $('#title_ar');
    let title_en_input = $('#title_en');
    let description_ar_input = $('#description_ar');
    let description_en_input = $('#description_en');
    let location_input = $('#location');
    let category_input = $('#category');
    let start_input = $('#start');
    let end_input = $('#end');
    let event_type_input = $('#event_type');

    let sponsors_image_input_upload = $('#sponsors-image-upload');
    let sponsors_image_input = $('#sponsors-image');
    let details_image_input = $('#details-image');
    let photo_image_input = $('#photo-image');
    let video_image_input = $('#video-image');
    let banner_input = $('.user-image');

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

    let sponsors_image_upload = $('#sponsors_image_upload');
    let details_image_upload = $('#details_image_upload');
    let photo_gallery_upload = $('#photo_gallery_upload');
    let video_gallery_upload = $('#video_gallery_upload');
    let sponsors_list_images = $('#sponsors_list_images');
    var sponsors_image_body_update = sponsors_list_images.html();
    /*Fill data*/


    /*Errors*/
    let title_ar_error = $('#title_ar_error');
    let title_en_error = $('#title_en_error');
    let description_en_error = $('#description_en_error');
    let description_ar_error = $('#description_ar_error');
    let start_error = $('#start_error');
    let url_error = $('#url_error');
    let organizer_ar_name_error = $('#organizer_ar_name_error');
    let organizer_en_name_error = $('#organizer_en_name_error');
    let manager_ar_name_error = $('#manager_ar_name_error');
    let manager_en_name_error = $('#manager_en_name_error');

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        selectEventTypeUpdate();
        upload_image_update();
        tabs_controler();
        remove_image_click();
        updateEvent(event_id);
        checkImageTypeUpdate();
        get_event_details(event_id);
        get_users_details(event_id);
    });

    function get_event_details(event_id) {
        //getEventData(id)
        $.ajax({
            method: "get",
            url: "/events/show/" + event_id,
            dataType: "json",
            data: {
                _token: $("input[name=_token]").val(),
            },
            success: function (event) {
                console.log(event.title);
                title_ar_input.val(event.title);
                title_en_input.val(event.title);
                description_ar_input.val(event.description['ar']);
                description_en_input.val(event.description['en']);
                location_input.val(event.location);
                category_input.val(event.category_fk_id);
                start_input.val(moment(event.start).format("YYYY-MM-DD"));
                end_input.val(moment(event.end).format("YYYY-MM-DD"));
                event_type_input.val(event.type);
                if (event.sponsors_image != null) {
                    sponsors_image_upload.removeClass("d-none")
                    /*Get logos sponsor*/
                    get_sponsor_images(event_id);
                    sponsors_image_input.prop('checked', true);
                }
                if (event.details_image != null) {
                    details_image_upload.removeClass("d-none")
                    //details_image_upload.val(viewImage(event.details_image));
                    details_image_input.prop('checked', true);
                    /*Get details_image*/
                    //var view_image_uploaded = $('#view_image_uploaded')
                    // $('#view_image_uploaded').attr('src', "{{asset(uploadsevents/" + event.details_image + ")}}");
                    $('#view_image_uploaded').attr('src', "http://127.0.0.1:8000/uploadsevents/" + event.details_image);
                }
                if (event.photo_gallery != null) {
                    photo_gallery_upload.removeClass("d-none")
                    photo_gallery_upload.val(event.photo_gallery);
                    photo_image_input.prop('checked', true);
                    //photo_image_input.val(event.photo_image);
                }
                if (event.video_gallery != null) {
                    video_gallery_upload.removeClass("d-none")
                    video_gallery_upload.val(event.video_gallery);
                    video_image_input.prop('checked', true);
                    //video_image_input.val(event.video_image);
                }

                event_external_link_input.val(event.url);
                //banner_input.attr('src', "{{asset(uploadsevents/" + event.banner + ")}}");
                banner_input.attr('src', "http://127.0.0.1:8000/uploadsevents/" + event.banner);
                switch (event.type) {
                    case 0:
                        console.log(event.type);
                        data_internal_type_update.hide();
                        data_external_type_update.attr('style', 'display:block !important');
                        break;
                    case 1:
                        console.log(event.type);
                        data_internal_type_update.attr('style', 'display:block !important');
                        data_external_type_update.hide();
                        break;
                }
            }
        });
    }

    function get_sponsor_images(event_id) {
        $.ajax({
            method: "get",
            url: "/events/" + event_id + "/sponsor/images",
            data: {
                _token: $("input[name=_token]").val(),
            },
            success: function (images) {
                console.log(images.length);
                for (let i = 0; i < images.length; i++) {
                    var image_id = images[i]['id'];
                    var image = images[i]['image'];
                    sponsors_image_body_update = sponsors_list_images.html();
                    sponsors_list_images.html(sponsors_image_body_update + sponsorLogsFetch(image_id, image));
                }
            }
        });
    }

    function get_users_details(event_id) {
        /*Get event user data*/
        $.ajax({
            method: "get",
            url: "/events/users/" + event_id,
            dataType: "json",
            data: {
                _token: $("input[name=_token]").val(),
            },
            success: function (eventUsers) {
                $.each(eventUsers, function (i) {
                    console.log(eventUsers[i]);
                    if (eventUsers[i].type == 0) {
                        organizer_ar_name_input.val(eventUsers[i].name['ar']);
                        organizer_en_name_input.val(eventUsers[i].name['en']);
                        organizer_phone_input.val(eventUsers[i].phone);
                        organizer_email_input.val(eventUsers[i].email);
                        organizer_website_name_input.val(eventUsers[i].website_name);
                        organizer_website_url_input.val(eventUsers[i].website_url);
                    } else {
                        manager_ar_name_input.val(eventUsers[i].name['ar']);
                        manager_en_name_input.val(eventUsers[i].name['en']);
                        manager_phone_input.val(eventUsers[i].phone);
                        manager_email_input.val(eventUsers[i].email);
                    }
                });
            }
        });
    }

    function updateEvent(id) {
        console.log(id);
        eventUpdateDetailsErrorSwitchTab();
        sponsors_list_images.html("");
        $('#update_event').click(function () {
            /*Input field*/
            let title_en = title_en_input.val();
            let title_ar = title_ar_input.val();
            let description_en = description_en_input.val();
            let description_ar = description_ar_input.val();
            let event_start = start_input.val();
            let event_end = end_input.val();
            let location = location_input.val();
            let category = category_input.val();
            let event_key = title_en + title_ar + description_en + description_ar + event_start + event_end + location + category;
            $('#event_key').val(event_key)
            event_type = event_type_input.val();
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

            switch (event_type) {
                case "0":
                    event_external_link = event_external_link_input.val();
                    break;
                case "1":
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
            console.log(banner);
            $.ajax({
                type: "POST",
                url: "/events/updateevent/" + id,
                data: {
                    _token: $("input[name=_token]").val(),
                    action: "update",
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
                        eventUpdateUserErrorSwitchTab();
                        printErrorMsg(response['user_error']);
                    } else if (response['success']) {
                        //$(').modal('toggle');
                        console.log("sssssss");
                        $('#successfully-event-modal').modal('show');
                        title_ar_error.css('display', 'none');
                        title_en_error.css('display', 'none');
                        description_en_error.css('display', 'none');
                        title_ar_error.css('display', 'none');
                        description_ar_error.css('display', 'none');
                        organizer_ar_name_error.css('display', 'none');
                        organizer_en_name_error.css('display', 'none');
                        manager_ar_name_error.css('display', 'none');
                        manager_en_name_error.css('display', 'none');
                    }
                }

            });

            function printErrorMsg(msg) {
                if (msg['event_external_link']) {
                    eventUpdateMoreDetailsErrorSwitchTab();
                    url_error.html(msg['event_external_link']);
                    url_error.css('display', 'block');
                } else {
                    url_error.css('display', 'none');
                }
                if (msg['manager_ar_name']) {
                    orgnizerUpdateErrorSwitchTab();
                    manager_ar_name_error.html(msg['manager_ar_name']);
                    manager_ar_name_error.css('display', 'block');
                } else {
                    manager_ar_name_error.css('display', 'none');
                }
                if (msg['manager_en_name']) {
                    orgnizerUpdateErrorSwitchTab();
                    manager_en_name_error.html(msg['manager_en_name']);
                    manager_en_name_error.css('display', 'block');
                } else {
                    manager_en_name_error.css('display', 'none');
                }
                if (msg['organizer_ar_name']) {
                    managerUpdateErrorSwitchTab();
                    organizer_ar_name_error.html(msg['organizer_ar_name']);
                    organizer_ar_name_error.css('display', 'block');
                } else {
                    organizer_ar_name_error.css('display', 'none');
                }
                if (msg['organizer_en_name']) {
                    managerUpdateErrorSwitchTab();
                    organizer_en_name_error.html(msg['organizer_en_name']);
                    organizer_en_name_error.css('display', 'block');
                } else {
                    organizer_en_name_error.css('display', 'none');
                }
                if (msg['title_ar']) {
                    eventUpdateDetailsErrorSwitchTab();
                    title_ar_error.html(msg['title_ar']);
                    title_ar_error.css('display', 'block');
                } else {
                    title_ar_error.css('display', 'none');
                }
                if (msg['title_en']) {
                    eventUpdateDetailsErrorSwitchTab();
                    title_en_error.html(msg['title_en']);
                    title_en_error.css('display', 'block');
                } else {
                    title_en_error.css('display', 'none');
                }
                if (msg['event_start']) {
                    eventUpdateDetailsErrorSwitchTab();
                    start_error.html(msg['event_start']);
                    start_error.css('display', 'block');
                } else {
                    start_error.css('display', 'none');
                }
                if (msg['description_ar']) {
                    eventUpdateDetailsErrorSwitchTab();
                    description_ar_error.html(msg['description_ar']);
                    description_ar_error.css('display', 'block');
                } else {
                    description_ar_error.css('display', 'none');
                }
                if (msg['description_en']) {
                    eventUpdateDetailsErrorSwitchTab();
                    description_en_error.html(msg['description_en']);
                    description_en_error.css('display', 'block');
                } else {
                    description_en_error.css('display', 'none');
                }
            }
        });


    }

    function remove_image_click() {
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

    function remove_image(id) {
        let item_list = $('#' + id);
        $.ajax({
            type: "DELETE",
            url: "/events/sponsor/image/delete/" + id,
            data: {
                _token: $("input[name=_token]").val()
            },
            success: function (response) {
                if (response['success']) {
                    /*refresh images body*/
                    console.log(item_list)
                    item_list.remove();
                    //sponsors_list_images.html("");
                    //var sponsors_image_body_update = sponsors_list_images.html();
                } else if (response['error']) {

                }
            }
        });
    }

    function upload_image_update() {
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
                    url: '/events/upload/image',
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

    function selectEventTypeUpdate() {
        $('#event_type').on('change', function () {
            event_type = $('#event_type').val().toString();
            switch (event_type) {
                case "0":
                    data_internal_type_update.hide();
                    data_external_type_update.attr('style', 'display:block !important');
                    break;
                case "1":
                    data_internal_type_update.attr('style', 'display:block !important');
                    data_external_type_update.hide();
                    break;
            }
        });
    }

    /*Multi images*/

    /*Check*/
    //let sponsors_list_images = $('#sponsors_list_images');
    let sponsors_image_body = sponsors_list_images.html();

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
                    url: '/events/upload/image',
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

    /*Edit event*/
    function eventUpdateMoreDetailsErrorSwitchTab() {
        $("#step-1-tab").removeClass("active show");  // this deactivates the home tab
        $("#step-2-tab").addClass("active show");
        $("#homeUpdate").removeClass("active show");  // this deactivates the home tab
        $("#profileUpdate").addClass("active show");
    }

    function eventUpdateDetailsErrorSwitchTab() {
        $("#step-1-tab").addClass("active show");  // this deactivates the home tab
        $("#step-2-tab").removeClass("active show");
        $("#homeUpdate").addClass("active show");  // this deactivates the home tab
        $("#profileUpdate").removeClass("active show");
    }

    function eventUpdateUserErrorSwitchTab() {
        $("#step-1-tab").removeClass("active show");  // this deactivates the home tab
        $("#step-2-tab").addClass("active show");
        $("#homeUpdate").removeClass("active show");  // this deactivates the home tab
        $("#profileUpdate").addClass("active show");
    }

    function orgnizerUpdateErrorSwitchTab() {
        $("#nav-manager-tab-update").addClass("active show");
        $("#nav-home-update").removeClass("active show");  // this deactivates the home tab
        $("#nav-organizer-tab-update").removeClass("active show");  // this deactivates the home tab
        $("#nav-profile-update").addClass("active show");
    }

    function managerUpdateErrorSwitchTab() {
        $("#nav-organizer-tab-update").addClass("active show");  // this deactivates the home tab
        $("#nav-manager-tab-update").removeClass("active show");
        $("#nav-home-update").addClass("active show");  // this deactivates the home tab
        $("#nav-profile-update").removeClass("active show");
    }

    /*Multi images*/
    /*Check*/
    let sponsors_list_images_update = $('#sponsors_list_images');

    function checkImageTypeUpdate() {
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

        /*let sponsors_image_upload = $('#sponsors_image_upload');
        let details_image_upload = $('#details_image_upload');
        let photo_gallery_upload = $('#photo_gallery_upload');
        let video_gallery_upload = $('#video_gallery_upload');
*/
        let details_image_upload_error = $('#details_image_upload_error');
        upload_sponsor_image_update(sponsors_image_upload);
        upload_details_image(details_image_upload, details_image_upload_error);
        /*Sponsor*/
        sponsors_image_input.click(function () {
            sponsors_image_body_update = sponsors_list_images.html();
            if (sponsors_image_input.is(':checked')) {
                sponsors_image_upload.removeClass("d-none");
                sponsors_image_status = 1;
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

    function upload_sponsor_image_update(button_upload) {
        let sponsors_image_upload_error = $('#sponsors_image_upload_error');
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
                    url: '/events/upload/image',
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
                            sponsors_image_upload_error.removeClass("text-danger");
                            sponsors_image_upload_error.addClass("text-primary");
                            sponsors_image_upload_error.css('display', 'block');
                            sponsors_image_body_update = sponsors_list_images_update.html();
                            sponsors_list_images_update.html(sponsors_image_body_update + ifSuccessUploadSponsorLogUpdateBody(banner));
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
                    url: '/events/upload/image',
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

    function sponsorLogsFetch(image_id, image) {
        return "<li class=\"mr-3 mt-3 mb-3\"\n" +
            "                                                                                    style=\"float: left;\">\n" +
            "                                                                                    <ul id=" + image_id + " style=\"list-style-type: none;margin: 0;padding: 0;\">\n" +
            "                                                                                        <li>\n" +
            "                                                                                            <img id=\"sponsors_list_images_items\"\n" +
            "                                                                                                 class=\"mr-2\" height=\"60\"\n" +
            "                                                                                                 src=\"http://127.0.0.1:8000/uploadsevents/" + image + "\">\n" +
            "                                                                                        </li>\n" +
            "                                                                                        <li class='mt-1 mb-0'>\n" +
            "                                                                                            <button id='remove_image' data-id=" + image_id + " class=\" btn-danger btn btn-sm\"><i class='fa fa-trash'></i></button>\n" +
            "                                                                                        </li>\n" +
            "                                                                                    </ul>\n" +
            "                                                                                </li>";
    }
});
