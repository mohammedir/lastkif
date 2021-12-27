@extends('layouts.master')
@section('css')
    {{--{{--//TODO:: MOOM*EN S. ALDAHDO*UH 12/15/2021--}}
@section('title')
    Edit Manager
@stop
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="mt-3">
                        <div class="card-header alert alert-light">
                            <input type="hidden" id="language" value="{{config('app.locale')}}">
                            <strong><i class="far fa-caret-square-right"></i> {{trans("customusers.Manager-Details")}}</strong>
                            <div class="mt-4">
                                <ul class="ul-project" style="list-style-type: none; margin: 0; padding: 0">
                                    <li>
                                        <input type="hidden" id="user-id" name="user-id" value="{{$customuser->id}}">
                                    </li>
                                    <br>
                                    <li>
                                        <div>
                                            <div id="image_user_uploaded">
                                                <!-- uploadcustomuser/1639865270.jpg      -->
                                                <img class="user-image" width="70"
                                                     src="{{asset("uploadcustomuser/$customuser->banner")}}">
                                            </div>
                                            <br>
                                            <p>{{trans("customusers.agent-banner-ratio-manager")}}</p>
                                            <form class="hidden-image-upload">
                                                {{csrf_field()}}
                                                <input name="_token" type="hidden"
                                                       value="5lgtt8AgbeF3lprptj8HNXVPceRhoJbqBeErBI1k">
                                                <input id="old_banner" name="old_banner" type="hidden"
                                                       value="{{$customuser->banner}}">
                                                <input class="" id="banner" name="banner" type="file"
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
                                                    <p>{{trans("customusers.Name-ar")}}<strong class="text-danger">*</strong></p>
                                                </div>
                                                <input class="form-control" id="name_ar" type="text"
                                                       value="{{@$customuser->getTranslation('name', 'ar')}}">
                                                <p id="name_ar_error" class="text-danger"
                                                   style="display: none"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <p>{{trans("customusers.Name-en")}}<strong class="text-danger">*</strong></p>
                                                </div>
                                                <input class="form-control" id="name_en" type="text"
                                                       value="{{@$customuser->getTranslation('name', 'en')}}">
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
                                                    <p>{{trans("customusers.Position-ar")}}<strong class="text-danger">*</strong></p>
                                                </div>
                                                <input class="form-control" id="position_ar" type="text"
                                                       value="{{@$customuser->getTranslation('position', 'ar')}}">
                                                <p id="position_ar_error" class="text-danger"
                                                   style="display: none"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <p>{{trans("customusers.Position-en")}}<strong class="text-danger">*</strong></p>
                                                </div>
                                                <input class="form-control" id="position_en" type="text"
                                                       value="{{@$customuser->getTranslation('position', 'en')}}">
                                                <p id="position_en_error" class="text-danger"
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
                                            <input class="form-control" id="email" type="email"
                                                   value="{{$customuser->email}}">
                                        </div>
                                    </li>
                                    <br>
                                    <li>
                                        <div>
                                            <div>
                                                <p>{{trans("customusers.Phone")}} </p>
                                            </div>
                                            <input class="form-control" id="phone" type="text"
                                                   value="{{$customuser->phone}}">
                                        </div>
                                    </li>
                                    <br>
                                    <li>
                                        <div>
                                            <div>
                                                <p>{{trans("customusers.Extension-number")}}</p>
                                            </div>
                                            <input class="form-control" id="extension_number" type="text"
                                                   value="{{@$customuser->extension_number}}">
                                        </div>
                                    </li>
                                    <br>
<!--                                    <li>
                                        <div>
                                            <p>
                                                <i class="las la-hand-pointer text-primary"></i>{{trans("customusers.Exhibition-manager")}}<strong class="text-danger">*</strong>
                                            </p>
                                            <div class=""
                                                 style=" margin: 0">
                                                <div class="form-group col-md-4"
                                                     style=" margin: 0; padding: 0">
                                                    <select class="alert alert-secondary col-md-12"
                                                            id="exhibition_manager">
                                                        <option value="0">exhibition manager 1</option>
                                                        <option value="1">exhibition manager 2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <p id="exhibition_manager_error" class="text-danger"
                                               style="display: none"></p>
                                        </div>
                                    </li>-->
                                    <br>
                                    <li>
                                        <div>
                                            <p>
                                                <i class="las la-hand-pointer text-primary"></i>{{trans("customusers.Exhibition-manager")}}<strong class="text-danger">*</strong>
                                            </p>
                                            <!--                                                <input id="tags_tag" name="tags_tag" class="form-control" type="text">-->
                                            <input id="exhibition_manager" type="text" name="keywords"
                                                   class="form-control"
                                                   value="{{@$customuser->exhibition_manager}}"
                                                   data-role="tagsinput"/>
                                            <p id="exhibition_manager_error" class="text-danger"
                                               style="display: none"></p>
                                            <style type="text/css">
                                                .bootstrap-tagsinput {
                                                    width: 100%;
                                                    border-color: #f6f7f8;
                                                    height: 50px;
                                                    background-color: #f6f7f8;
                                                    padding-top: 10px;
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
                                    <br>
                                    <br>
                                    <li class="text-center">
                                        <button id="update-manager" class="btn btn-primary"><i
                                                class="lar la-save"></i> {{trans("customusers.Save")}}
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    {{--Section Remove project--}}
                   {{-- <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="row alert alert-danger text-dark"
                                     style=" margin: 0; padding-left:0; padding-right: 0">
                                    <div class="col-md-10">
                                        <p class="pt-2"><i class="fas fa-exclamation-triangle"></i>&nbsp;
                                            {{trans("customusers.Remove")}}<strong> {{$customuser->name}} </strong>{{trans("customusers.Manager")}}
                                        </p>
                                    </div>
                                    <div class="col-md-2">
                                        <button id="remove-manager"
                                                class="btn btn-danger float-right"><strong>{{trans("customusers.Remove-Now")}}</strong>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="hidden" value="0" id="is_user_page">
                    </div>--}}
                </div>


            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@section('js')
    @include('moom.modal_alert')
    <script src="{{asset('js/edit_managers.js')}}" defer></script> {{--Must add defer to active js file--}}
@endsection
{{--{{--//TODO:: M*OOMEN S*. ALDAHDO*UH 12/15/2021--}}
