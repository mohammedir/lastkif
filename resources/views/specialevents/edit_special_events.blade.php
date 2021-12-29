{{--//TODO:: M/OOMEN S/. ALDAHDOU/H 12/15/2021--}}
<div id="edit_special_event" class="modal">
    <div class="modal-dialog">
        <div class="modal-content model-style">
            <div class="modal-header">
                <h6>{{trans('specialevents.Edit Special Events')}}</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="">
                    {{ csrf_field() }}
                    <div class="">
                        <div class="mt-3">
                            <p>{{trans('specialevents.Name (AR)')}}<strong
                                        class="text-danger">*</strong></p>
                            <input id="name_ar" class="form-control">
                            <p id="name_ar_error" class="text-danger"
                               style="display: none"></p>
                        </div>
                        <div class="mt-3">
                            <p>{{trans('specialevents.Name (EN)')}}<strong
                                        class="text-danger">*</strong></p>
                            <input id="name_en" class="form-control">
                            <p id="name_en_error" class="text-danger"
                               style="display: none"></p>
                        </div>
                        <div class="mt-3">
                            <p>{{trans('specialevents.URL')}}<strong
                                        class="text-danger">*</strong></p>
                            <input id="url" class="form-control">
                            <p id="url_error" class="text-danger"
                               style="display: none"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="edit_s_event" class="btn btn-primary"
                        type="button">{{trans('specialevents.Save')}}</button>
            </div>
        </div>
    </div>
</div>
