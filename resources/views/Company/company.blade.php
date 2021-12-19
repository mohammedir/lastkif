@extends('layouts.master')
@section('css')

@section('title')
    empty
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Company</a></li>
                    <li class="breadcrumb-item active">Page</li>
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
                    <!--begin: Datatable -->
                <!--
                <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" role="form" id="add_edit_form" autocomplete="off" enctype="multipart/form-data">
                    {{ method_field('patch') }}
                @csrf

                    <div class="portlet-body form">
                        <div class="ibox">
                            <div class="ibox-content">
                                <input type="hidden" name="locale" value="ar"/>

                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="s_name" class="form-control-label">{{trans('HomeEdits.Pagetitle(EN)')}}</label>
                                        <input type="text"  name="s_name[ar]"  required id="s_title" class="form-control" value="">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="s_title" class="form-control-label">{{trans('HomeEdits.Pagetitle(AR)')}}</label>
                                        <input type="text"  name="s_title[ar]"  required id="s_title" class="form-control" value="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary add_edit">موافق</button>
                    </div>
                </form>
-->


                    <form action="{{ route('update_page.update', 'test') }}" method="post">
                        {{ method_field('patch') }}
                        @csrf

                        <input type="hidden" value="{{$id}}" name="id">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="s_name" class="form-control-label">{{trans('HomeEdits.Pagetitle(EN)')}}</label>
                                <input type="text"  name="pagetitle_en"  class="form-control" value="{{$editpages->Pagetitle}}">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="s_title" class="form-control-label">{{trans('HomeEdits.Pagetitle(AR)')}}</label>
                                <input type="text"  name="pagetitle_ar" class="form-control" value="{{$editpages->Pagetitle}}">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit"
                                    class="btn btn-success">{{ trans('SEO-trans.Editsubmit') }}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!--end::Body-->
    <p>Page content goes here<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></p>

    <!-- row closed -->
@endsection
@section('js')

@endsection
