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
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        createEvent();
        selectEventType();
    });

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

    function createEvent(calendar) {
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
                        title_ar_error.css('display', 'none');
                        title_en_error.css('display', 'none');
                        description_en_error.css('display', 'none');
                        description_ar_error.css('display', 'none');
                        organizer_ar_name_error.css('display', 'none');
                        organizer_en_name_error.css('display', 'none');
                        manager_ar_name_error.css('display', 'none');
                        manager_en_name_error.css('display', 'none');
                        url_error.css('display', 'none');
                        $('#successfully-modal').modal('show');
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
});
