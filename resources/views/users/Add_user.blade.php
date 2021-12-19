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
                <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('Users.UserTi')}}</a></li>
                <li class="breadcrumb-item active">{{trans('Users.Adduser')}}</li>
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
        <div class="card card-statistics h-100">
            <div class="card-body">

                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}">{{trans('Users.back')}}</a>
                    </div><br><br>


                    <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                          action="{{route('users.store','test')}}" method="post">
                        {{csrf_field()}}

                        <div class="row mg-b-20">

                                <div class="form-group col-lg-6" id="fnWrapper">
                                    <span class="tx-danger" style="color: red">*</span><label>{{trans('Users.Username')}}</label>
                                    <input class="form-control form-control-sm mg-b-20"
                                           data-parsley-class-handler="#lnWrapper" name="name" required="" type="text">
                                </div>

                                <div class="form-group col-lg-6" id="lnWrapper">
                                    <span class="tx-danger" style="color: red">*</span><label>{{trans('Users.E-mail')}}</label>
                                    <input class="form-control form-control-sm mg-b-20"
                                           data-parsley-class-handler="#lnWrapper" name="email" required="" type="email">
                                </div>
                        </div>

                        <div class="row mg-b-20">
                            <div class="form-group col-lg-6" id="lnWrapper">
                                <span class="tx-danger" style="color: red">*</span><label>{{trans('Users.password')}}</label>
                                <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                       name="password" required="" type="password">
                            </div>

                            <div class="form-group col-lg-6" id="lnWrapper">
                                <span class="tx-danger" style="color: red">*</span><label>{{trans('Users.confirmpassword')}}</label>                                <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                       name="confirm-password" required="" type="password">
                            </div>
                        </div>

                        <div class="row row-sm mg-b-20">
                            <div class="col-lg-6">
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">{{trans('Users.Userstatus')}}</label>
                                <select name="Status" id="select-beast" class="form-control" size="1">
                                    <option value="مفعل">{{trans('Users.Enabled')}}</option>
                                    <option value="غير مفعل">{{trans('Users.NotEnabled')}}</option>
                                </select>
                            </div>
                        </div>
                        <br>

                        <div class="row mg-b-20">
                            <div class="col-xs-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{trans('Users.Uservalidity')}}</label>
                                    {!! Form::select('roles_name[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-main-primary pd-x-20" type="submit">{{trans('Users.btnsave')}}</button>
                        </div>
                    </form>
                </div><br>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
