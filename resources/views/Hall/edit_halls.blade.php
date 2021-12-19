@extends('layouts.master')
@section('css')
    {{--{{--//TODO:: MOOM*EN S. ALDAHDO*UH 12/15/2021--}}
@section('title')
    Edit Hall
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <!--<h1 class="fs-1">EDIT AGENTS</h1>-->
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
                            <div class="card-header alert alert-light">
                                <input id="hall_id" type="hidden" value="{{$hall->id}}">
                                <input id="hall_type_hidden" type="hidden" value="{{$hall->type}}">
                                <strong><i class="far fa-caret-square-right"></i> Hall Details</strong>
                                <div class="mt-4">
                                    <ul class="ul-project" style="list-style-type: none; margin: 0; padding: 0">
                                        <li>
                                            <input type="hidden" id="user-id" name="user-id">
                                        </li>
                                        <br>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div>
                                                        <h6><strong class="text-danger">*</strong> Name (Arabic)</h6>
                                                    </div>
                                                    <input class="form-control" id="name_ar" type="text"
                                                           value="{{@$hall->getTranslation('name', 'ar')}}">
                                                    <p id="name_ar_error" class="text-danger"
                                                       style="display: none"></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div>
                                                        <h6><strong class="text-danger">*</strong> Name (English)</h6>
                                                    </div>
                                                    <input class="form-control" id="name_en" type="text"
                                                           value="{{@$hall->getTranslation('name', 'en')}}">
                                                    <p id="name_en_error" class="text-danger"
                                                       style="display: none"></p>
                                                </div>
                                            </div>
                                        </li>
                                        <br>
                                        <li>
                                            <div>
                                                <h6>
                                                    <i class="las la-hand-pointer text-primary"></i>Hall type
                                                </h6>
                                                <div class=""
                                                     style=" margin: 0">
                                                    <div class="form-group col-md-6"
                                                         style=" margin: 0; padding: 0">
                                                        <select class="alert alert-secondary " id="hall_type">
                                                            <option value="0">External Hall</option>
                                                            <option value="1">Internal Hall</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <p id="type_error" class="text-danger"
                                                   style="display: none"></p>
                                            </div>
                                        </li>
                                        <div class="data-depend-type">
                                            <div id="data-external-type">
                                                <ul class="list-group-item" style="list-style-type: none">
                                                    <li>
                                                        <div>
                                                            <strong>
                                                                <i class="las la-link text-primary"></i><strong
                                                                    class="text-danger">*</strong>Link
                                                            </strong>
                                                            <div class="input-group rounded-md  ">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-link"></i></span>
                                                                <input
                                                                    class="form-control col-md-12"
                                                                    id="url" name="url" type="url"
                                                                    placeholder="URL (required)"
                                                                    value="{{@$hall->url}}">
                                                            </div>
                                                            <p id="url_error" class="text-danger"
                                                               style="display: none"></p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div id="data-internal-type" class="d-none">
                                                <ul class="list-group-item" style="list-style-type: none">
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div>
                                                                    <h6><strong class="text-danger">*</strong>
                                                                        Description
                                                                        (Arabic)
                                                                    </h6>
                                                                </div>
                                                                <textarea rows="3" class="form-control"
                                                                          id="description_ar"
                                                                          type="text">{{@$hall->getTranslation('description', 'ar')}}</textarea>
                                                                <p id="description_ar_error" class="text-danger"
                                                                   style="display: none"></p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div>
                                                                    <h6><strong class="text-danger">*</strong>
                                                                        Description
                                                                        (English)
                                                                    </h6>
                                                                </div>
                                                                <textarea rows="3" class="form-control"
                                                                          id="description_en"
                                                                          type="text">{{@$hall->getTranslation('description', 'en')}}</textarea>
                                                                <p id="description_en_error" class="text-danger"
                                                                   style="display: none"></p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <br>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <h6>Hall gallery widget Name(English)</h6>
                                                                <input class="form-control" id="widget_name_en"
                                                                       type="text"
                                                                       value="{{@$hall->widget->getTranslation('title', 'en')}}">
                                                                <p id="widget_name_en_error" class="text-danger"
                                                                   style="display: none"></p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h6>Hall gallery widget Name(Arabic)</h6>
                                                                <input class="form-control" id="widget_name_ar"
                                                                       type="text"
                                                                       value="{{@$hall->widget->getTranslation('title', 'ar')}}">
                                                                <p id="widget_name_ar_error" class="text-danger"
                                                                   style="display: none"></p>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <!-- Page Value-->
                                                        <div class="form-group">
                                                            <h6>Hall gallery widget</h6>
                                                            <textarea class="form-control"
                                                                      id="widget_value"
                                                                      rows="10">{{@$hall->widget->value}}</textarea>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
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
                                                    {{$hall->status ? 'checked' : ''}}>
                                            </div>
                                        </li>
                                        <br>
                                        <br>
                                        <li>
                                            <button id="update-halls" class="btn btn-primary float-right"><i
                                                    class="lar la-save"></i> Update
                                            </button>
                                        </li>
                                    </ul>
                                </div>
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
                                            Remove<strong> {{@$hall->name}} </strong>Hall!
                                        </p>
                                    </div>
                                    <div class="col-md-2">
                                        <button id="remove-halls"
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
    <script src="{{asset('js/edit_halls.js')}}" defer></script> {{--Must add defer to active js file--}}
@endsection
{{--{{--//TODO:: M*OOMEN S*. ALDAHDO*UH 12/15/2021--}}
