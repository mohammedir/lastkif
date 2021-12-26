@extends('layouts.master')
@section('css')

@section('title')
    {{trans("customusers.Create-Provider")}}
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
                            <strong><i class="far fa-caret-square-right"></i> {{trans("customusers.Provider-Details")}}
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
                                            <p>{{trans("customusers.provider-banner-ratio")}}</p>
                                            <form class="hidden-image-upload">
                                                {{csrf_field()}}
                                                <input name="_token" type="hidden"
                                                       value="5lgtt8AgbeF3lprptj8HNXVPceRhoJbqBeErBI1k">
                                                <input class="" id="banner" name="banner" type="file"
                                                       value="Provider Banner"
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
                                                    <p>{{trans("customusers.Service-Name-ar")}}<strong
                                                                class="text-danger">*</strong></p>
                                                </div>
                                                <input class="form-control" id="name_ar" type="text">
                                                <p id="name_ar_error" class="text-danger"
                                                   style="display: none"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <p>{{trans("customusers.Service-Name-en")}}<strong
                                                                class="text-danger">*</strong>
                                                    </p>
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
                                                    <p>{{trans("customusers.Company-Name-ar")}}<strong
                                                                class="text-danger">*</strong></p>
                                                </div>
                                                <input class="form-control" id="company_ar" type="text">
                                                <p id="company_ar_error" class="text-danger"
                                                   style="display: none"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <p>{{trans("customusers.Company-Name-en")}}<strong
                                                                class="text-danger">*</strong>
                                                    </p>
                                                </div>
                                                <input class="form-control" id="company_en" type="text">
                                                <p id="company_en_error" class="text-danger"
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
                                        <div>
                                            <div>
                                                <p>{{trans("customusers.Phone")}} </p>
                                            </div>
                                            <input class="form-control" id="phone" type="text">
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

                                    <br>
                                    <li class="text-center">
                                        <button id="create-providers" class="btn btn-primary "><i
                                                    class="lar la-save"></i>{{trans("customusers.Create")}}
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
    <script src="{{ asset('js/create_providers.js') }}" defer></script>
@endsection
