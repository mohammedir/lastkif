<div id="view_event_model" class="modal">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content model-style">
            <div class="modal-header">
                <h6>View Event</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="">
                    {{ csrf_field() }}
                    @php
                        $image_link = 'images/bg_event.png';
                        $encrypted = Crypt::encryptString($image_link);
                    @endphp
                    <a href="{{url("view_image/".$encrypted)}}" target="_blank">
                        <img height="180" width="100%" src="{{asset('images/bg_event.png')}}"
                             style=" object-fit: cover;">
                    </a>
                    <div class="">
                        <div class="mt-3">
                            <strong>Title</strong>
                            <p class="form-control pt-3 pb-3 pl-2">First Event</p>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <strong>Start</strong>
                                <p class="form-control pt-3 pb-3 pl-2">16/12/2021</p>
                            </div>
                            <div class="col-md-6">
                                <strong>End</strong>
                                <p class="form-control pt-3 pb-3 pl-2">19/12/2021</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <strong>Type</strong>
                            <p class="form-control pt-3 pb-3 pl-2">External Event</p>
                        </div>
                        <div class="mt-3">
                            <strong>Link</strong>
                            <p><a target="_blank" class="btn-link" href="http://127.0.0.1:8000/en/events">http://127.0.0.1:8000/en/events&ensp;<i
                                            class="fas fa-external-link-square-alt"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="close" class="btn btn-danger" type="button" data-bs-dismiss="modal">Delete</button>
                <button class="btn btn-primary" data-dismiss="modal">Edit</button>
            </div>
        </div>
    </div>
</div>
