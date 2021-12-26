@extends('layouts.master')
@section('css')

@section('title')
    {{trans("halls.Create-Halls")}}
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
                            <strong><i class="far fa-caret-square-right"></i> {{trans("halls.Hall-Details")}}</strong>
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
                                                    <p>{{trans("halls.Name-ar")}}<strong class="text-danger">*</strong>
                                                    </p>
                                                </div>
                                                <input class="form-control" id="name_ar" type="text">
                                                <p id="name_ar_error" class="text-danger"
                                                   style="display: none"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <p>{{trans("halls.Name-en")}}<strong class="text-danger">*</strong>
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
                                        <div>
                                            <p></i>{{trans("halls.Hall-type")}}
                                                </h6>
                                            <div class=""
                                                 style=" margin: 0">
                                                <div class="form-group col-md-6"
                                                     style=" margin: 0; padding: 0">
                                                    <select class="alert alert-secondary " id="hall_type">
                                                        <option value="0">{{trans("halls.External-Hall")}}</option>
                                                        <option value="1">{{trans("halls.Internal-Hall")}}</option>
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
                                                        <p>{{trans("halls.Link")}}
                                                            <strong
                                                                    class="text-danger">*</strong>
                                                        </p>
                                                        <div class="input-group rounded-md  ">
                                                            <span class="input-group-text"><i
                                                                        class="fas fa-link"></i></span>
                                                            <input
                                                                    class="form-control col-md-12"
                                                                    id="url" name="url" type="url"
                                                                    placeholder="">
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
                                                    <div class="">
                                                        <div>
                                                            <p>{{trans("halls.Description-ar")}}<strong
                                                                        class="text-danger">*</strong></p>
                                                        </div>
                                                        <textarea rows="3" class=" ckeditor form-control"
                                                                  id="description_ar"
                                                                  type="text"></textarea>
                                                        <p id="description_ar_error" class="text-danger"
                                                           style="display: none"></p>
                                                    </div>
                                                </li>
                                                <br>
                                                <li>
                                                    <div class="">
                                                        <div>
                                                            <p>{{trans("halls.Description-en")}}<strong
                                                                        class="text-danger">*</strong></p>
                                                        </div>
                                                        <textarea rows="3" class="ckeditor form-control"
                                                                  id="description_en"
                                                                  type="text"></textarea>
                                                        <p id="description_en_error" class="text-danger"
                                                           style="display: none"></p>
                                                    </div>
                                                </li>
                                                <br>
                                                <li>
                                                    <!--                                                    <div class="row">
                                                                                                            <div class="col-md-6">
                                                                                                                <p>Hall gallery widget Name(English)</h6>
                                                                                                                <input class="form-control" id="widget_name_en" type="text">
                                                                                                                <p id="widget_name_en_error" class="text-danger"
                                                                                                                   style="display: none"></p>
                                                                                                            </div>
                                                                                                            <div class="col-md-6">
                                                                                                                <p>Hall gallery widget Name(Arabic)</h6>
                                                                                                                <input class="form-control" id="widget_name_ar" type="text">
                                                                                                                <p id="widget_name_ar_error" class="text-danger"
                                                                                                                   style="display: none"></p>
                                                                                                            </div>
                                                                                                        </div>-->
                                                    <br>
                                                    <!-- Page Value-->
                                                    <div class="form-group">
                                                        <p>{{trans("halls.Hall-gallery")}}
                                                            <strong>{{trans("halls.Elfsight")}}</strong></p>

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
                                    <li class="text-center">
                                        <button id="create-halls" class="btn btn-primary"> {{trans("halls.Create")}}
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
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script src="{{ asset('js/create_halls.js') }}" defer></script>
@endsection
