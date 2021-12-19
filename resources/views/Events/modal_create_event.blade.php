<div id="modal-add-event" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">{{--modal-dialog-scrollable--}}
        {{--{{--//TODO:: M*OOMEN S*. ALDAHDO*UH 12/15/2021--}}
        <div class="modal-content model-style">
            <div class="container pt-3">
                <div class="modal-header mb-1">
                    <h3><i class="far fa-calendar-plus"></i>&nbsp;Create Event</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body alerts">
                    <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
                        <li id="step-1" class="nav-item" role="presentation">
                            <button class="nav-link active" id="step-1-tab" data-toggle="tab" data-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Event Information
                            </button>
                        </li>
                        <li id="step-2" class="nav-item" role="presentation">
                            <button class="nav-link" id="step-2-tab" data-toggle="tab" data-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">More details
                            </button>
                        </li>
                    </ul>
                    {{csrf_field()}}
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="step-1-tab">
                            <div id="page-1">
                                <div class="card">
                                    <div class="card-body">
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
                                                    <input
                                                        id="event_key" name="event_key" type="hidden"
                                                        placeholder="English Title (Required)">

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
                                            {{--//TODO:: MO*OMEN S. ALDAHD**OUH 12/15/2021--}}
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
                                                                <option value="0">Category 11</option>
                                                                <option value="1">Category 2</option>
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
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="step-2-tab">
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
                                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                                <button class="nav-link active" id="nav-organizer-tab"
                                                                        data-toggle="tab" data-target="#nav-home"
                                                                        type="button"
                                                                        role="tab" aria-controls="nav-home"
                                                                        aria-selected="true">Organizer details
                                                                </button>
                                                                <button class="nav-link" id="nav-manager-tab"
                                                                        data-toggle="tab"
                                                                        data-target="#nav-profile"
                                                                        type="button"
                                                                        role="tab" aria-controls="nav-profile"
                                                                        aria-selected="false">Manager details
                                                                </button>
                                                                <button class="nav-link" id="nav-attachments-tab"
                                                                        data-toggle="tab"
                                                                        data-target="#nav-contact"
                                                                        type="button"
                                                                        role="tab" aria-controls="nav-contact"
                                                                        aria-selected="false">Attachments
                                                                </button>
                                                            </div>
                                                        </nav>
                                                        <div class="tab-content mt-2 alert-secondary p-3"
                                                             id="nav-tabContent">
                                                            <div class="tab-pane fade show active" id="nav-home"
                                                                 role="tabpanel"
                                                                 aria-labelledby="nav-organizer-tab">
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
                                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                                                 aria-labelledby="nav-manager-tab">
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
                                                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                                                 aria-labelledby="nav-attachments-tab">

                                                                <div class="alert alert-light">
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               id="sponsors-image">{{--flexSwitchCheckDefault--}}
                                                                        <label class="form-check-label"
                                                                               for="sponsors-image">Sponsors
                                                                            image (.JPEG, .JPG, .PNG)</label>
                                                                        <br>

                                                                    </div>
                                                                    <input type='file' name="file_img"
                                                                           id="sponsors_image_upload"
                                                                           accept=".pdf,.jpg, .png, image/jpeg, image/png"/>
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
                                                                           class="dropify"
                                                                           accept=".pdf,.jpg, .png, image/jpeg, image/png"/>
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
                                                                    <input type='file' id="photo_gallery_upload"
                                                                           class="dropify"
                                                                           accept=".pdf,.jpg, .png, image/jpeg, image/png"/>
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
                                                                    <input type='file' id="video_gallery_upload"
                                                                           class="dropify"
                                                                           accept=".pdf,.jpg, .png, image/jpeg, image/png"/>
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
                    <button id="submit_event" class="btn btn-primary">CREATE
                    </button>{{--data-bs-dismiss="modal"--}}
                </div>
            </div>

        </div>
    </div>
</div>
