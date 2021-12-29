<div id="view_event_model" class="modal">
    <div class="modal-dialog  ">
        <div class="modal-content model-style">
            <div class="modal-header">
                <h6>{{trans('events.Event-Information')}}</h6>
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
                        <img id="event_image" height="180" width="100%" src=""
                             style=" object-fit: cover;">
                    </a>
                    <div class="">
                        <div class="mt-3">
                            <strong>{{trans('events.Title')}}</strong>
                            <p id="event_title" class="form-control pt-3 pb-3 pl-2">First Event</p>
                        </div>
                        <div class="mt-3">
                            <strong>{{trans('events.Description')}}</strong>
                            <p id="event_description" class="form-control pt-3 pb-3 pl-2">Description Event</p>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <strong>{{trans('events.Start')}}</strong>
                                <p id="event_start" class="form-control pt-3 pb-3 pl-2">16/12/2021</p>
                            </div>
                            <div class="col-md-6">
                                <strong>{{trans('events.End')}}</strong>
                                <p id="event_end" class="form-control pt-3 pb-3 pl-2">19/12/2021</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <strong>{{trans('events.Type')}}</strong>
                            <p id="event_type" class="form-control pt-3 pb-3 pl-2">External Event</p>
                        </div>
                        <div class="mt-3">
                            <strong>{{trans('events.Url')}}</strong>
                            <p><a id="event_link" target="_blank" class="btn-link"
                                                  href="http://127.0.0.1:8000/en/events">http://127.0.0.1:8000/en/events&ensp;<i
                                            class="fas fa-external-link-square-alt"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="delete_event" class="btn btn-danger" type="button" data-bs-dismiss="modal">{{trans('events.Delete')}}</button>
                <button id="edit_event" class="btn btn-primary" data-dismiss="modal">{{trans('events.Edit')}}</button>
            </div>
        </div>
    </div>
</div>
