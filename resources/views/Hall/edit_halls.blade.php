@extends('layouts.master')
@section('css')
    {{--{{--//TODO:: MOOM*EN S. ALDAHDO*UH 12/15/2021--}}
@section('title')
    {{trans("halls.Edit-Hall")}}
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
                            <div class="card-header alert alert-light">
                                <input id="hall_id" type="hidden" value="{{$hall->id}}">
                                <input id="hall_type_hidden" type="hidden" value="{{$hall->type}}">
                                <input type="hidden" id="language" value="{{config('app.locale')}}">
                                <strong><i class="far fa-caret-square-right"></i> {{trans("halls.Hall-Details")}}
                                </strong>
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
                                                        <p>{{trans("halls.Name-ar")}}<strong
                                                                    class="text-danger">*</strong></p>
                                                    </div>
                                                    <input class="form-control" id="name_ar" type="text"
                                                           value="{{@$hall->getTranslation('name', 'ar')}}">
                                                    <p id="name_ar_error" class="text-danger"
                                                       style="display: none"></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div>
                                                        <p>{{trans("halls.Name-en")}}<strong
                                                                    class="text-danger">*</strong></p>
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
                                                <p>
                                                    <i class="las la-hand-pointer text-primary"></i>{{trans("halls.Hall-type")}}
                                                </p>
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
                                                            <strong>
                                                                <i class="las la-link text-primary"></i>{{trans("halls.Link")}}
                                                                <strong
                                                                        class="text-danger">*</strong>
                                                            </strong>
                                                            <div class="input-group rounded-md  ">
                                                            <span class="input-group-text"><i
                                                                        class="fas fa-link"></i></span>
                                                                <input
                                                                        class="form-control col-md-12"
                                                                        id="url" name="url" type="url"
                                                                        placeholder=""
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
                                                        <div class="">
                                                            <div>
                                                                <p>{{trans("halls.Description-ar")}}<strong
                                                                            class="text-danger">*</strong>
                                                                </p>
                                                            </div>
                                                            <textarea rows="3" class="ckeditor form-control"
                                                                      id="description_ar"
                                                                      name="description_ar"
                                                                      type="text">{{@$hall->getTranslation('description', 'ar')}}</textarea>
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
                                                                      type="text">{{@$hall->getTranslation('description', 'en')}}</textarea>
                                                            <p id="description_en_error" class="text-danger"
                                                               style="display: none"></p>
                                                        </div>
                                                    </li>
                                                    <br>
                                                    <li>
                                                    <!--                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p>{{trans("halls.Hall-gallery-widget-Name-ar")}}</h6>
                                                                <input class="form-control" id="widget_name_en"
                                                                       type="text"
                                                                       value="@if ($hall->widget != NULL){{@$hall->widget->getTranslation('title', 'en')}}@endif">
                                                                <p id="widget_name_en_error" class="text-danger"
                                                                   style="display: none"></p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{trans("halls.Hall-gallery-widget-Name-en")}}</h6>
                                                                <input class="form-control" id="widget_name_ar"
                                                                       type="text"
                                                                       value="@if ($hall->widget != NULL){{@$hall->widget->getTranslation('title', 'ar')}}@endif">
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
                                                                      rows="10">{{@$hall->widget_value}}</textarea>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <br>
                                    <!--                                        <li>
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
                                        </li>-->
                                        <br>
                                        <li class="text-center">
                                            <button id="update-halls" class="btn btn-primary"> {{trans("halls.UPDATE")}}
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
                <!--                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="row alert alert-danger text-dark"
                                     style=" margin: 0; padding-left:0; padding-right: 0">
                                    <div class="col-md-10">
                                        <p class="pt-2"><i class="fas fa-exclamation-triangle"></i>&nbsp;
                                            {{trans("halls.Remove")}}
                        <strong> {{@$hall->name}} </strong>{{trans("halls.Hall")}}
                        </p>
                    </div>
                    <div class="col-md-2">
                        <button id="remove-halls"
                                class="btn btn-danger float-right">
                            <strong>{{trans("halls.Remove-Now")}}</strong>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="hidden" value="0" id="is_user_page">
                    </div>-->
                </div>

                @include('moom.modal_alert')
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script src="{{asset('js/edit_halls.js')}}" defer></script> {{--Must add defer to active js file--}}
@endsection
{{--{{--//TODO:: M*OOMEN S*. ALDAHDO*UH 12/15/2021--}}
