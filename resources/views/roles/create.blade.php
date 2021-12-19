@extends('layouts.master')
@section('css')

    <!--Internal  treeview -->
    <link href="{{URL::asset('assets/plugins/treeview/treeview-rtl.css')}}" rel="stylesheet" type="text/css" />

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
                <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('Users.UserTi')}}</a></li>
                <li class="breadcrumb-item active">{{trans('Users.btnAddPerm')}}</li>
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
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>خطا</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif


            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
            <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mg-b-20">
                            <div class="card-body">
                                <div class="main-content-label mg-b-5">
                                    <div class="col-xs-7 col-sm-7 col-md-7">
                                        <div class="form-group">
                                            <p>{{trans('Users.NamePerm')}}</p>
                                            {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-7 col-sm-7 col-md-7">

<!--
                                    <div class="form-group">

                                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#permission" >
                                            <div><span
                                                    class="right-nav-text"><i class="ti-plus"></i>{{trans('Users.Permissions')}}</span></div>
                                            <div class="clearfix"></div>
                                        </a>
                                        <ul id="permission" class="collapse" data-parent="#sidebarnav">
                                            @foreach($permission as $value)
                                                <label
                                                    style="font-size: 16px;">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                    {{ $value->name }}</label>

                                            @endforeach
                                        </ul>
                                    </div>
-->



                                        <div class="col-lg-4">
                                            <ul id="treeview">
                                                <li><a href="#">{{trans('Users.Permissions')}}</a>
                                                    <ul>
                                                        <li>
                                                            @foreach($permission as $value)
                                                                <label
                                                                    style="font-size: 16px;">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                                    {{ $value->name }}</label>

                                                            @endforeach
                                                        </li>

                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>


                                <div class="row">


                                    <!-- /col -->
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-main-primary">{{trans('Users.btnsave')}}</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- row closed -->
            </div>
            <!-- Container closed -->
        </div>
        <!-- main-content closed -->

        {!! Form::close() !!}
        </div>
    </div>
<!-- row closed -->
@endsection
@section('js')
    <!-- Internal Treeview js -->
    <script src="{{URL::asset('assets/plugins/treeview/treeview.js')}}"></script>
@endsection
