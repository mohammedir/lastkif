@extends('layouts.master')
@section('css')

@section('title')
    Create Hall
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
                                                <input class="form-control" id="name_ar" type="text">
                                                <p id="name_ar_error" class="text-danger"
                                                   style="display: none"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <h6><strong class="text-danger">*</strong> Name (English)</h6>
                                                </div>
                                                <input class="form-control" id="name_en" type="text">
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
                                                                placeholder="URL (required)">
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
                                                                <h6><strong class="text-danger">*</strong> Description
                                                                    (Arabic)
                                                                </h6>
                                                            </div>
                                                            <textarea rows="3" class="form-control" id="description_ar"
                                                                      type="text"></textarea>
                                                            <p id="description_ar_error" class="text-danger"
                                                               style="display: none"></p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div>
                                                                <h6><strong class="text-danger">*</strong> Description
                                                                    (English)
                                                                </h6>
                                                            </div>
                                                            <textarea rows="3" class="form-control" id="description_en"
                                                                      type="text"></textarea>
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
                                                            <input class="form-control" id="widget_name_en" type="text">
                                                            <p id="widget_name_en_error" class="text-danger"
                                                               style="display: none"></p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6>Hall gallery widget Name(Arabic)</h6>
                                                            <input class="form-control" id="widget_name_ar" type="text">
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
                                                                  rows="10"></textarea>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <li>
                                        <button id="create-halls" class="btn btn-primary float-right"><i
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
    <script src="{{ asset('js/create_halls.js') }}" defer></script>
@endsection
