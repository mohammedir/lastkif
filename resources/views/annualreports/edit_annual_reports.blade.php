{{--//TODO:: M/OOMEN S/. ALDAHDOU/H 12/15/2021--}}
<div id="edit_annual_report" class="modal">
    <div class="modal-dialog">
        <div class="modal-content model-style">
            <div class="modal-header">
                <h6>{{trans('annualreports.Edit Annual Report')}}</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="">
                    {{ csrf_field() }}
                    <div class="">
                        <div class="mt-3">
                            <div>
                                <div id="image_user_uploaded">
                                    <!-- uploadcustomuser/1639865270.jpg      -->
                                    <img class="user-image" height="130" width="100%"
                                         src="{{asset("images/report2.png")}}" style=" object-fit: cover;">
                                </div>
                                <br>
                                <p>{{trans('annualreports.Banner ratio 1:1 (square)')}} <strong
                                            class="text-danger">*</strong></p>
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
                        </div>
                        <div class="mt-3">
                            <p>{{trans('annualreports.Year name')}}<strong
                                        class="text-danger">*</strong></p>
                            <input id="year_name" class="form-control">
                            <p id="year_name_error" class="text-danger"
                               style="display: none"></p>
                        </div>
                        <div class="mt-3">
                            <p>{{trans('annualreports.PDF')}}<strong
                                        class="text-danger">*</strong></p>
                            <form id="pdf_form" class="hidden-pdf-upload">
                                {{csrf_field()}}
                                <a id="old_pdf" href="" class="btn btn-xs  btn-primary"><i class="fas fa-file-download"></i></a>
                                <input name="_token" type="hidden"
                                       value="5lgtt8AgbeF3lprptj8HNXVPceRhoJbqBeErBI1k">
                                <input id="pdf" class="form-control" type="file"
                                       accept="application/pdf,application/vnd.ms-excel">
                            </form>
                            <p id="pdf_error" class="text-danger"
                               style="display: none"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="edit_a_report" class="btn btn-primary" type="button"
                        data-bs-dismiss="modal">{{trans('annualreports.Save')}}</button>
            </div>
        </div>
    </div>
</div>
