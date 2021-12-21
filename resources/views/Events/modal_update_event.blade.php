<div id="modal-update-event" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    {{--//TODO:: MOO*MEN S. ALD*/AHDOUH 12/15/2021--}}
    <div class="modal-dialog modal-lg">{{--modal-dialog-scrollable--}}
        <div class="modal-content model-style">
            <div class="container pt-3">
                <div class="modal-header mb-1">
                    <h3><i class="far fa-calendar-plus"></i>&nbsp;Update Event</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body alerts">
                    <ul class="nav nav-tabs mb-2" id="myTabUpdate" role="tablist">
                        <li id="step-1" class="nav-item" role="presentation">
                            <button class="nav-link active" id="step-1-tab" data-toggle="tab" data-target="#homeUpdate"
                                    type="button" role="tab" aria-controls="homeUpdate" aria-selected="true">Event
                                Information
                            </button>
                        </li>
                        <li id="step-2" class="nav-item" role="presentation">
                            <button class="nav-link" id="step-2-tab" data-toggle="tab" data-target="#profileUpdate"
                                    type="button" role="tab" aria-controls="profileUpdate" aria-selected="false">More
                                details
                            </button>
                        </li>
                    </ul>
                    {{csrf_field()}}
                    <div class="tab-content" id="myTabUpdateContent">
                        <div class="tab-pane fade show active" id="homeUpdate" role="tabpanel"
                             aria-labelledby="step-1-tab">
                            <div id="page-1">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- Upload Image-->
                                        <div>
                                            <div id="image_user_uploaded">
                                                <!-- uploadcustomuser/1639865270.jpg      -->
                                                <img class="user-image" width="70"
                                                     src="{{asset("images/event.png")}}">
                                            </div>
                                            <br>
                                            <p>event banner ratio 2:1 (.jpeg, .png, .jpg)</p>
                                            <form class="hidden-image-upload">
                                                {{csrf_field()}}
                                                <input name="_token" type="hidden"
                                                       value="5lgtt8AgbeF3lprptj8HNXVPceRhoJbqBeErBI1k">
                                                <input class="" id="banner" name="banner" type="file"
                                                       value="Agent Banner"
                                                       accept="image/png, image/jpeg, image/jpg">
                                                <p id="banner_error" class="text-danger"
                                                   style="display: none"></p>
                                            </form>

                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <strong>
                                                        <i class="las la-signature text-primary"></i><strong
                                                            class="text-danger">*</strong>Title
                                                        (ar)
                                                    </strong>
                                                    <input
                                                        class="rounded-md col-md-12 alert alert-secondary"
                                                        id="title_ar" name="title_ar" type="text"
                                                        placeholder="Arabic Title (Required)">
                                                    <span id="title_ar_error" class="text-danger"
                                                          style="display: none"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <strong>
                                                        <i class="las la-signature text-primary"></i><strong
                                                            class="text-danger">*</strong>Title
                                                        (en)
                                                    </strong>
                                                    <input
                                                        class="rounded-md col-md-12 alert alert-secondary"
                                                        id="title_en" name="title_en" type="text"
                                                        placeholder="English Title (Required)">
                                                    <p id="title_en_error" class="text-danger"
                                                       style="display: none"></p>

                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <strong>
                                                <i class="las la-signature text-primary"></i>Description (ar)
                                            </strong>
                                            <textarea rows="2" placeholder="Arabic Description"
                                                      id="description_ar"
                                                      name="description_ar"
                                                      class="rounded-md col-md-12 alert alert-secondary"
                                                      type="text"></textarea>
                                            <p id="description_ar_error" class="text-danger"
                                               style="display: none"></p>

                                        </div>
                                        <div>
                                            <strong>
                                                <i class="las la-signature text-primary"></i>Description (en)
                                            </strong>
                                            <textarea rows="2" placeholder="English Description"
                                                      id="description_en"
                                                      name="description_en"
                                                      class="rounded-md col-md-12 alert alert-secondary"
                                                      type="text"></textarea>
                                            <p id="description_en_error" class="text-danger"
                                               style="display: none"></p>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <strong>
                                                        <i class="las la-signature text-primary"></i>Location
                                                    </strong>
                                                    <input
                                                        class="rounded-md col-md-12 alert alert-secondary"
                                                        id="location" name="location" type="text"
                                                        placeholder="Event Location">
                                                    <p id="location_error" class="text-danger"
                                                       style="display: none"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <strong>
                                                        <i class="las la-hand-pointer text-primary"></i>Event Category
                                                    </strong>
                                                    <div class=""
                                                         style=" margin: 0">
                                                        <div class="form-group col-md-12"
                                                             style=" margin: 0; padding: 0">
                                                            <select class="form-control " id="category">
                                                                @foreach($categories as $category)
                                                                    <option
                                                                        value="{{$category->id}}">{{$category->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <p id="category_error" class="text-danger"
                                                       style="display: none"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <strong>
                                                    <i class="las la-signature text-primary"></i><strong
                                                        class="text-danger">*</strong>Start
                                                </strong>
                                                <input
                                                    class="rounded-md col-md-12 alert alert-secondary"
                                                    id="start" name="start" type="datetime-local"
                                                    placeholder="Start (Required)">
                                                <p id="start_error" class="text-danger"
                                                   style="display: none"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>
                                                    <i class="las la-signature text-primary"></i><strong
                                                        class="text-danger">*</strong>End
                                                </strong>
                                                <input
                                                    class="rounded-md col-md-12 alert alert-secondary"
                                                    id="end" name="end" type="datetime-local"
                                                    placeholder="End (Required)">
                                                <p id="end_error" class="text-danger"
                                                   style="display: none"></p>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="profileUpdate" role="tabpanel" aria-labelledby="step-2-tab">
                            <div id="page-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <strong>
                                                <i class="las la-hand-pointer text-primary"></i>Event type
                                            </strong>
                                            <div class=""
                                                 style=" margin: 0">
                                                <div class="form-group col-md-6"
                                                     style=" margin: 0; padding: 0">
                                                    <select class="form-control " id="event_type">
                                                        <option value="0">External Event</option>
                                                        <option value="1">Internal Event</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <p id="type_error" class="text-danger"
                                               style="display: none"></p>
                                        </div>
                                        <br>
                                        <div class="data-depend-type">
                                            <div id="data-external-type" class="">
                                                <div class="card alert-secondary">
                                                    <div class="card-body">
                                                        <strong>
                                                            <i class="las la-link text-primary"></i><strong
                                                                class="text-danger">*</strong>Link
                                                        </strong>
                                                        <div class="input-group rounded-md  ">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-link"></i></span>
                                                            <input
                                                                class="form-control col-md-12"
                                                                id="url" name="url" type="url"
                                                                placeholder="URL (required)">
                                                        </div>
                                                        <p id="url_error" class="text-danger"
                                                           style="display: none"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="data-internal-type" class="d-none">
                                                <div class="card  text-dark">
                                                    <div class="card-body">
                                                        <nav>
                                                            <div class="nav nav-tabs" id="nav-tab-update"
                                                                 role="tablist">
                                                                <button class="nav-link active"
                                                                        id="nav-organizer-tab-update"
                                                                        data-toggle="tab" data-target="#nav-home-update"
                                                                        type="button"
                                                                        role="tab" aria-controls="nav-home-update"
                                                                        aria-selected="true">Organizer details
                                                                </button>
                                                                <button class="nav-link" id="nav-manager-tab-update"
                                                                        data-toggle="tab"
                                                                        data-target="#nav-profile-update"
                                                                        type="button"
                                                                        role="tab" aria-controls="nav-profile-update"
                                                                        aria-selected="false">Manager details
                                                                </button>
                                                                <button class="nav-link" id="nav-attachments-tab-update"
                                                                        data-toggle="tab"
                                                                        data-target="#nav-contact-update"
                                                                        type="button"
                                                                        role="tab" aria-controls="nav-contact-update"
                                                                        aria-selected="false">Attachments
                                                                </button>
                                                            </div>
                                                        </nav>
                                                        <div class="tab-content mt-2 alert-secondary p-3"
                                                             id="nav-tabContent">
                                                            <div class="tab-pane fade show active" id="nav-home-update"
                                                                 role="tabpanel"
                                                                 aria-labelledby="nav-organizer-tab-update">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div>
                                                                            <strong>
                                                                                <i class="las la-signature text-primary"></i><strong
                                                                                    class="text-danger">*</strong>Name
                                                                                (ar)
                                                                            </strong>
                                                                            <input
                                                                                class="rounded-md col-md-12 alert alert-light"
                                                                                id="organizer-ar-name"
                                                                                name="organizer-ar-name"
                                                                                type="text"
                                                                                placeholder="Arabic Organizer Name">
                                                                            <p id="organizer_ar_name_error"
                                                                               class="text-danger"
                                                                               style="display: none"></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div>
                                                                            <strong>
                                                                                <i class="las la-signature text-primary"></i><strong
                                                                                    class="text-danger">*</strong>Name
                                                                                (en)
                                                                            </strong>
                                                                            <input
                                                                                class="rounded-md col-md-12 alert alert-light"
                                                                                id="organizer-en-name"
                                                                                name="organizer-en-name"
                                                                                type="text"
                                                                                placeholder="English Organizer Name">
                                                                            <p id="organizer_en_name_error"
                                                                               class="text-danger"
                                                                               style="display: none"></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <strong>
                                                                        <i class="las la-signature text-primary"></i>Phone
                                                                    </strong>
                                                                    <input
                                                                        class="rounded-md col-md-12 alert alert-light"
                                                                        id="organizer-phone" name="organizer-phone"
                                                                        type="text"
                                                                        placeholder="Phone">
                                                                    <p id="organizer_phone_error"
                                                                       class="text-danger"
                                                                       style="display: none"></p>
                                                                </div>
                                                                <div>
                                                                    <strong>
                                                                        <i class="las la-signature text-primary"></i>Email
                                                                    </strong>
                                                                    <input
                                                                        class="rounded-md col-md-12 alert alert-light"
                                                                        id="organizer-email" name="organizer-email"
                                                                        type="email"
                                                                        placeholder="Phone">
                                                                    <p id="organizer_email_error"
                                                                       class="text-danger"
                                                                       style="display: none"></p>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div>
                                                                            <strong>
                                                                                <i class="las la-signature text-primary"></i>Website
                                                                                Name
                                                                            </strong>
                                                                            <input
                                                                                class="rounded-md col-md-12 alert alert-light"
                                                                                id="organizer-website-name"
                                                                                name="organizer-website-name"
                                                                                type="text"
                                                                                placeholder="Website Name">
                                                                            <p id="organizer_website_name_error"
                                                                               class="text-danger"
                                                                               style="display: none"></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div>
                                                                            <strong>
                                                                                <i class="las la-link text-primary"></i>Website
                                                                                URL
                                                                            </strong>
                                                                            <div class="input-group">
                                                                        <span class="input-group-text"><i
                                                                                class="fas fa-link"></i></span>
                                                                                <input
                                                                                    class="form-control col-md-12"
                                                                                    id="organizer-website-url"
                                                                                    name="organizer-website-url"
                                                                                    type="url"
                                                                                    placeholder="URL (required)">
                                                                            </div>
                                                                            <p id="organizer_website_url_error"
                                                                               class="text-danger"
                                                                               style="display: none"></p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="tab-pane fade" id="nav-profile-update"
                                                                 role="tabpanel"
                                                                 aria-labelledby="nav-manager-tab-update">
                                                                {{--Start manager--}}
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div>
                                                                            <strong>
                                                                                <i class="las la-signature text-primary"></i><strong
                                                                                    class="text-danger">*</strong>Name
                                                                                (ar)
                                                                            </strong>
                                                                            <input
                                                                                class="rounded-md col-md-12 alert alert-light"
                                                                                id="manager-ar-name"
                                                                                name="manager-ar-name"
                                                                                type="text"
                                                                                placeholder="Arabic Manger Name">
                                                                            <p id="manager_ar_name_error"
                                                                               class="text-danger"
                                                                               style="display: none"></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div>
                                                                            <strong>
                                                                                <i class="las la-signature text-primary"></i><strong
                                                                                    class="text-danger">*</strong>Name
                                                                                (en)
                                                                            </strong>
                                                                            <input
                                                                                class="rounded-md col-md-12 alert alert-light"
                                                                                id="manager-en-name"
                                                                                name="manager-en-name"
                                                                                type="text"
                                                                                placeholder="English Manager Name">
                                                                            <p id="manager_en_name_error"
                                                                               class="text-danger"
                                                                               style="display: none"></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <strong>
                                                                        <i class="las la-signature text-primary"></i>Phone
                                                                    </strong>
                                                                    <input
                                                                        class="rounded-md col-md-12 alert alert-light"
                                                                        id="manager-phone" name="manager-phone"
                                                                        type="text"
                                                                        placeholder="Phone">
                                                                    <p id="manager_phone_error"
                                                                       class="text-danger"
                                                                       style="display: none"></p>
                                                                </div>
                                                                <div>
                                                                    <strong>
                                                                        <i class="las la-signature text-primary"></i>Email
                                                                    </strong>
                                                                    <input
                                                                        class="rounded-md col-md-12 alert alert-light"
                                                                        id="manager-email" name="manager-email"
                                                                        type="email"
                                                                        placeholder="Email">
                                                                    <p id="manager_email_error" class="text-danger"
                                                                       style="display: none"></p>
                                                                </div>
                                                                {{--End manager--}}
                                                            </div>
                                                            <div class="tab-pane fade" id="nav-contact-update"
                                                                 role="tabpanel"
                                                                 aria-labelledby="nav-attachments-tab-update">

                                                                <div class="alert alert-light">
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               id="sponsors-image">{{--flexSwitchCheckDefault--}}
                                                                        <label class="form-check-label"
                                                                               for="sponsors-image">Sponsors
                                                                            logos (.JPEG, .JPG, .PNG)</label>
                                                                        <br>
                                                                    </div>
                                                                    <input type='file' name="file_img"
                                                                           class="mt-2 d-none"
                                                                           id="sponsors_image_upload"
                                                                           accept=".pdf,.jpg, .png, image/jpeg, image/png"/>
                                                                    <div>
                                                                        <ul id="sponsors_list_images"
                                                                            style="list-style-type: none;margin: 0;padding: 0;overflow: hidden">
                                                                            {{--@foreach($sponsor_images as $image)
                                                                                <li class="mr-3 mt-3 mb-3"
                                                                                    style="float: left;">
                                                                                    <ul style="list-style-type: none;margin: 0;padding: 0;overflow: hidden">
                                                                                        <li style="float: left;">
                                                                                            <img id="sponsors_list_images_items"
                                                                                                 class="mr-2" width="40"
                                                                                                 src="{{asset("uploadsevents/$image->image")}}">
                                                                                        </li>
                                                                                        <li style="float: left;">
                                                                                            <button data-id="image_id" class="btn btn-sm">Remove</button>
                                                                                        </li>
                                                                                    </ul>
                                                                                </li>
                                                                            @endforeach--}}
                                                                        </ul>
                                                                    </div>
                                                                    <p id="sponsors_image_upload_error"
                                                                       class="text-danger"
                                                                       style="display: none"></p>
                                                                </div>

                                                                <div class="alert alert-light">
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               id="details-image">
                                                                        <label class="form-check-label"
                                                                               for="details-image">Details
                                                                            image (.JPEG, .JPG, .PNG)</label>
                                                                        <br>

                                                                    </div>
                                                                    <input type='file' id="details_image_upload"
                                                                           class="mt-2 d-none"
                                                                           accept=".pdf,.jpg, .png, image/jpeg, image/png"/>
                                                                    <img id="view_image_uploaded" width="70"
                                                                         src="{{asset("images/event.png")}}">
                                                                    <p id="details_image_upload_error"
                                                                       class="text-danger"
                                                                       style="display: none"></p>
                                                                </div>
                                                                <div class="alert alert-light">
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               id="photo-image">
                                                                        <label class="form-check-label"
                                                                               for="photo-image">Photo
                                                                            gallery (.JPEG, .JPG, .PNG)</label>
                                                                        <br>

                                                                    </div>
                                                                    <textarea class="form-control mt-2 d-none"
                                                                              id="photo_gallery_upload"
                                                                              rows="5"></textarea>
                                                                    <p id="photo_gallery_upload_error"
                                                                       class="text-danger"
                                                                       style="display: none"></p>
                                                                </div>
                                                                <div class="alert alert-light">
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               id="video-image">
                                                                        <label class="form-check-label"
                                                                               for="video-image">Video
                                                                            gallery (.JPEG, .JPG, .PNG)</label>
                                                                        <br>
                                                                    </div>
                                                                    <textarea class="form-control mt-2 d-none"
                                                                              id="video_gallery_upload"
                                                                              rows="5"></textarea>
                                                                    <p id="video_gallery_upload_error"
                                                                       class="text-danger"
                                                                       style="display: none"></p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button id="delete_event" class="btn btn-danger">DELETE</button>{{--data-bs-dismiss="modal"--}}
                    <button id="update_event" class="btn btn-primary">UPDATE</button>{{--data-bs-dismiss="modal"--}}
                </div>
            </div>

        </div>
    </div>
</div>
{{--//TODO:: MOOM/EN S. ALDAHDOU/H 12/15//2021--}}
