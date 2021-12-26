{{--//TODO:: M/OOMEN S/. ALDAHDOU/H 12/15/2021--}}

<div id="something-wrong" class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content model-style">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <br>
                <!--                <p style="font-size: 80px;"><i class="far fa-times-circle fs-1"></i></p>-->
                <img height="120" src="{{asset("images/error.gif")}}">
                <br>
                <h6 id="message">{{trans("alert.failed")}}</h6>
                <br>
            </div>
        </div>
        <button class="btn btn-danger" data-bs-dismiss="modal">{{trans("alert.OK")}}</button>
        {{--<div class="modal-footer">
            <button id="close" class="btn" type="button" data-bs-dismiss="modal">Close</button>
        </div>--}}
    </div>
</div>

<div id="successfully-modal" class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content model-style">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <br>
                <!--                <p style="font-size: 80px;"><i class="far fa-check-circle"></i></p>-->
                <img height="120" src="{{asset("images/success2.gif")}}">
                <br>
                <h6>{{trans("alert.done")}}</h6>
                <br>
            </div>
            <button class="btn btn-primary" data-dismiss="modal">{{trans("alert.OK")}}</button>
        </div>
    </div>
</div>
{{--//TODO:: M/OOMEN S/. ALDAHDOU/H 12/15/2021--}}
<div id="successfully-save" class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content model-style">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <br>
                <!--                <p style="font-size: 80px;"><i class="far fa-check-circle fs-1"></i></p>-->
                <img height="120" src="{{asset("images/success2.gif")}}">
                <br>
                <h6 id="message">{{trans("alert.done")}}</h6>
                <br>
            </div>
            <button class="btn btn-primary" data-dismiss="modal">{{trans("alert.OK")}}</button>
            {{--<div class="modal-footer">
                <button id="close" class="btn" type="button" data-bs-dismiss="modal">Close</button>
            </div>--}}
        </div>
    </div>
</div>
{{--//TODO:: M/OOMEN S/. ALDAHDOU/H 12/15/2021--}}
<div id="successfully-remove" class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content model-style">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <br>
                <p style="font-size: 80px;"><i class="far fa-check-circle fs-1"></i></p>
                <h6 id="message">{{trans("alert.done")}}</h6>
                <br>
            </div>
            <button class="btn btn-danger" data-dismiss="modal">{{trans("alert.OK")}}</button>
            {{--<div class="modal-footer">
                <button id="close" class="btn" type="button" data-bs-dismiss="modal">Close</button>
            </div>--}}
        </div>
    </div>
</div>
{{--//TODO:: M/OOMEN S/. ALDAHDOU/H 12/15/2021--}}
<div id="confirm-remove-modal" class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content model-style">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <br>
                <!--                <p style="font-size: 80px;"><i class="fas fa-exclamation-triangle"></i></p>-->
                <img height="120" src="{{asset("images/error.gif")}}">
                <br>
                <h6 id="message">{{trans("alert.Confirm-delete")}}</h6>
                <br>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 ">
                    <button id="confirm_delete" class="btn btn-danger float-right"
                            data-dismiss="modal">{{trans("alert.confirm")}}</button>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary float-left" data-dismiss="modal">{{trans("alert.cancel")}}</button>
                </div>
            </div>
            {{--<div class="modal-footer">
                <button id="close" class="btn" type="button" data-bs-dismiss="modal">Close</button>
            </div>--}}
        </div>
    </div>
</div>
