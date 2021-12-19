@extends('layouts.master')
@section('css')

@section('title')
    Create Agent
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    {{--//TODO:: MO*OMEN S. ALDAHDOU*H 12/15/2021--}}
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">Page Title</li>
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
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="mt-3">
                        <div class="card-header alert alert-light">
                            <strong><i class="far fa-caret-square-right"></i> Agent Details</strong>
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
                                            <p>agent banner ratio 2:1 (.jpeg, .png, .jpg)</p>
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
                                                    <h6><strong class="text-danger">*</strong> Name Arabic</h6>
                                                </div>
                                                <input class="form-control" id="name_ar" type="text">
                                                <p id="name_ar_error" class="text-danger"
                                                   style="display: none"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <h6><strong class="text-danger">*</strong> Name English</h6>
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
                                                    <h6><strong class="text-danger">*</strong> Country Arabic</h6>
                                                </div>
                                                <input class="form-control" id="country_ar" type="text">
                                                <p id="country_ar_error" class="text-danger"
                                                   style="display: none"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <h6><strong class="text-danger">*</strong> Country English</h6>
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
                                                <h6>Email (optional)</h6>
                                            </div>
                                            <input class="form-control" id="email" type="email">
                                        </div>
                                    </li>
                                    <br>
                                    <li>
                                        <div>
                                            <div>
                                                <h6>Phone (optional)</h6>
                                            </div>
                                            <input class="form-control" id="phone" type="text">
                                        </div>
                                    </li>
                                    <br>
                                    <li>
                                        <div>
                                            <div>
                                                <h6>Website name (optional)</h6>
                                            </div>
                                            <input class="form-control" id="website_name" type="text">
                                        </div>
                                    </li>
                                    <br>
                                    <li>
                                        <div>
                                            <div>
                                                <h6>Website URL (optional)</h6>
                                            </div>
                                            <input class="form-control" id="website_url" type="url">
                                        </div>
                                    </li>
                                    <br>
                                    <li>
                                        <div>
                                            <div>
                                                <h6>Location (optional)</h6>
                                            </div>
                                            <input class="form-control" id="location" type="text">
                                        </div>
                                    </li>
                                    <br>
                                    <br>
                                    <li>
                                        <button id="create-agents" class="btn btn-primary float-right"><i
                                                class="lar la-save"></i> Create
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('moom.modal_alert')
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script src="{{ asset('js/create_agents.js') }}" defer></script>
@endsection
