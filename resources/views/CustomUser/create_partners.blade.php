@extends('layouts.master')
@section('css')

@section('title')
    {{trans("customusers.Create-Partner")}}
@stop
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="mt-3">
                        <div class="card-header alert alert-light">
                            <input type="hidden" id="language" value="{{config('app.locale')}}">
                            <strong><i class="far fa-caret-square-right"></i> {{trans("customusers.Partner-Details")}}
                            </strong>
                            <div class="mt-4">
                                <ul class="ul-project" style="list-style-type: none; margin: 0; padding: 0">
                                    <li>
                                        <input type="hidden" id="user-id" name="user-id">
                                    </li>
                                    <br>
                                    <li>
                                        <div>
                                            <div id="image_user_uploaded">
                                                <!-- uploadcustomuser/1639865270.jpg      -->
                                                <img class="user-image" width="70"
                                                     src="{{asset("images/user.png")}}">
                                            </div>
                                            <br>
                                            <p>{{trans("customusers.partner-banner-ratio")}}</p>
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
                                    </li>
                                    <br>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <p>{{trans("customusers.Name-ar")}}<strong
                                                                class="text-danger">*</strong></p>
                                                </div>
                                                <input class="form-control" id="name_ar" type="text">
                                                <p id="name_ar_error" class="text-danger"
                                                   style="display: none"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <p>{{trans("customusers.Name-en")}}<strong
                                                                class="text-danger">*</strong></p>
                                                </div>
                                                <input class="form-control" id="name_en" type="text">
                                                <p id="name_en_error" class="text-danger"
                                                   style="display: none"></p>
                                            </div>
                                        </div>
                                    </li>
                                    <br>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <p>{{trans("customusers.Country-ar")}}<strong
                                                                class="text-danger">*</strong></p>
                                                </div>
                                                <input class="form-control" id="country_ar" type="text">
                                                <p id="country_ar_error" class="text-danger"
                                                   style="display: none"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <p>{{trans("customusers.Country-en")}}<strong
                                                                class="text-danger">*</strong></p>
                                                </div>
                                                <input class="form-control" id="country_en" type="text">
                                                <p id="country_en_error" class="text-danger"
                                                   style="display: none"></p>
                                            </div>
                                        </div>
                                    </li>
                                    <br>
                                    <li>
                                        <div>
                                            <div>
                                                <p>{{trans("customusers.Email")}} </p>
                                            </div>
                                            <input class="form-control" id="email" type="email">
                                        </div>
                                    </li>
                                    <br>
                                    <li>
                                        <div id="phone_div">
                                            <div>
                                                <p>{{trans("customusers.Phone")}} </p>
                                            </div>
                                            <!--<input class="form-control" id="phone" type="text">-->
                                            <input id="phone" type="text" name="keywords"
                                                   class="form-control"
                                                   value="{{ old('keywords') }}"/>
                                            <p id="phone_error" class="text-primary d-none">{{trans('customusers.phone_length')}}</p>
                                            <style type="text/css">
                                                .bootstrap-tagsinput {
                                                    width: 100%;
                                                    border-color: rgba(246, 247, 248, 0);
                                                    height: 50px;
                                                    background-color: #f6f7f8;
                                                    padding-top: 15px;
                                                }

                                                .bootstrap-tagsinput .tag {
                                                    margin-right: 2px;
                                                    color: white !important;
                                                    background-color: #007bff;
                                                    padding: .2em .6em .3em;
                                                    font-size: 100%;
                                                    font-weight: 700;
                                                    vertical-align: baseline;
                                                    border-radius: .25em;
                                                }
                                            </style>
                                        </div>
                                    </li>
                                    <br>
                                    <li>
                                        <div>
                                            <div>
                                                <p>{{trans("customusers.Website-name")}}</p>
                                            </div>
                                            <input class="form-control" id="website_name" type="text">
                                        </div>
                                    </li>
                                    <br>
                                    <li>
                                        <div>
                                            <div>
                                                <p>{{trans("customusers.Website-URL")}}</p>
                                            </div>
                                            <input class="form-control" id="website_url" type="url">
                                        </div>
                                    </li>
                                    <br>
                                    <li>
                                        <div>
                                            <div>
                                                <p>{{trans("customusers.Location")}} </p>
                                            </div>
                                            <input class="form-control" id="location" type="text">
                                        </div>
                                    </li>
                                    <br>
                                    <br>
                                    <li class="text-center">
                                        <button id="create-partners" class="btn btn-primary"><i
                                                    class="lar la-save"></i> {{trans("customusers.Create")}}
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
@endsection

@section('js')
    @include('moom.modal_alert')
    <script src="{{ asset('js/create_partners.js') }}" defer></script>
@endsection
