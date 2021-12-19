@extends('layouts.master')
@section('css')
    {{--{{--//TODO:: MOOM*EN S. ALDAHDO*UH 12/15/2021--}}
@section('title')
    Edit Manager
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <!--                <h1 class="fs-1">EDIT AGENTS</h1>-->
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Halls</a></li>
                    <li class="breadcrumb-item active">Hall</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
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
                            <strong><i class="far fa-caret-square-right"></i> Manager Details</strong>
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
                                            <p>manager banner ratio 2:1 (.jpeg, .png, .jpg)</p>
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
                                                    <h6><strong class="text-danger">*</strong> Name Arabic</h6>
                                                </div>
                                                <input class="form-control" id="name_ar" type="text"
                                                       value="{{$customuser->name}}">
                                                <p id="name_ar_error" class="text-danger"
                                                   style="display: none"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <h6><strong class="text-danger">*</strong> Name English</h6>
                                                </div>
                                                <input class="form-control" id="name_en" type="text"
                                                       value="{{$customuser->name}}">
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
                                                    <h6><strong class="text-danger">*</strong> Country Arabic</h6>
                                                </div>
                                                <input class="form-control" id="country_ar" type="text"
                                                       value="{{$customuser->country}}">
                                                <p id="country_ar_error" class="text-danger"
                                                   style="display: none"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <h6><strong class="text-danger">*</strong> Country English</h6>
                                                </div>
                                                <input class="form-control" id="country_en" type="text"
                                                       value="{{$customuser->country}}">
                                                <p id="country_en_error" class="text-danger"
                                                   style="display: none"></p>
                                            </div>
                                        </div>
                                    </li>
                                    <br>
                                    <li>
                                        <div>
                                            <div>
                                                <h6>Email (optional)</h6>
                                            </div>
                                            <input class="form-control" id="email" type="email"
                                                   value="{{$customuser->email}}">
                                        </div>
                                    </li>
                                    <br>
                                    <li>
                                        <div>
                                            <div>
                                                <h6>Phone (optional)</h6>
                                            </div>
                                            <input class="form-control" id="phone" type="text"
                                                   value="{{$customuser->phone}}">
                                        </div>
                                    </li>
                                    <br>
                                    <li>
                                        <div>
                                            <div>
                                                <h6>Website name (optional)</h6>
                                            </div>
                                            <input class="form-control" id="website_name" type="text"
                                                   value="{{$customuser->website_name}}">
                                        </div>
                                    </li>
                                    <br>
                                    <li>
                                        <div>
                                            <div>
                                                <h6>Website URL (optional)</h6>
                                            </div>
                                            <input class="form-control" id="website_url" type="url"
                                                   value="{{$customuser->website_url}}">
                                        </div>
                                    </li>
                                    <br>
                                    <li>
                                        <div>
                                            <div>
                                                <h6>Location (optional)</h6>
                                            </div>
                                            <input class="form-control" id="location" type="text"
                                                   value="{{$customuser->location}}">
                                        </div>
                                    </li>
                                    <br>
                                    <li>
                                        <div>
                                            <h4>
                                                <i class="las la-toggle-off text-primary"></i>&nbsp;Status
                                            </h4>
                                        </div>
                                        <div class="form-check form-switch" style="padding: 0;margin: 0">
                                            <input id="status" class="toggle-class" type="checkbox"
                                                   data-onstyle="success"
                                                   data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                                   data-off="Inactive" data-size="xs"
                                                {{$customuser->status ? 'checked' : ''}}>
                                        </div>
                                    </li>
                                    <br>
                                    <br>
                                    <li>
                                        <button id="update-manager" class="btn btn-primary float-right"><i
                                                class="lar la-save"></i> Save
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    {{--Section Remove project--}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="row alert alert-danger text-dark"
                                     style=" margin: 0; padding-left:0; padding-right: 0">
                                    <div class="col-md-10">
                                        <p class="pt-2"><i class="fas fa-exclamation-triangle"></i>&nbsp;
                                            Remove<strong> {{$customuser->name}} </strong>Manager!
                                        </p>
                                    </div>
                                    <div class="col-md-2">
                                        <button id="remove-manager"
                                                class="btn btn-danger float-right"><strong>Remove Now</strong>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="hidden" value="0" id="is_user_page">
                    </div>
                </div>

                @include('moom.modal_alert')
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script src="{{asset('js/edit_managers.js')}}" defer></script> {{--Must add defer to active js file--}}
@endsection
{{--{{--//TODO:: M*OOMEN S*. ALDAHDO*UH 12/15/2021--}}
