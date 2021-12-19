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

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <form action="{{ route('settings.update', 'test') }}" method="post">
                        {{ method_field('patch') }}
                        @csrf

                        <div class="row">

                            <!-- Social media links   -->
                            <div class="form-group col-lg-10">
                                <h4>{{trans('settings.Socialmedia-links')}}</h4>
                            </div>
                            <input type="hidden" name="id" value="{{$info->id}}">
                            <div class="form-group col-lg-6">
                                <label for="s_name" class="form-control-label">{{trans('settings.Facebook-link')}}</label>
                                <input type="text"  name="Facebook"  class="form-control" value="{{$info->Facebook_Link}}">
                            </div>
                            <!--                            <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text alert-light text-danger m-1" id="basic-addon1"><i class="fa fa-facebook"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                        -->
                            <div class="form-group col-lg-6">
                                <label for="s_title" class="form-control-label">{{trans('settings.Instagram-link')}}</label>
                                <input type="text"  name="Instagram" class="form-control" value="{{$info->Instagram_Link}}">
                            </div>

                            <!--   Page Meta title        -->

                            <div class="form-group col-lg-6">
                                <label for="s_name" class="form-control-label">{{trans('settings.twitter-link')}}</label>
                                <input type="text"  name="twitter"  class="form-control" value="{{$info->Twitter_Link}}">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="s_title" class="form-control-label">{{trans('settings.snapchat-link')}}</label>
                                <input type="text"  name="snapchat" class="form-control" value="{{$info->Snapchat_Link}}">
                            </div>



                            <!-- Social media links   -->
                            <div class="form-group col-lg-10">
                                <h4>{{trans('settings.Hotline-number')}}</h4>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="s_name" class="form-control-label">{{trans('settings.Phone-Number')}}</label>
                                <input type="number"  name="PhoneNumber"  class="form-control" value="{{$info->PhoneNumber}}">
                            </div>
                            <!--                            <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text alert-light text-danger m-1" id="basic-addon1"><i class="fa fa-facebook"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                        -->

                            <!-- Social media links   -->
                            <div class="form-group col-lg-10">
                                <h4>{{trans('settings.Contact-details')}}</h4>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="s_name" class="form-control-label">{{trans('settings.Details')}}</label>
                                <input type="text"  name="Details"  class="form-control" value="{{$info->Details}}" >
                            </div>

                            <!-- Social media links   -->
                            <div class="form-group col-lg-10">
                                <h4>{{trans('settings.Working-Hours')}} </h4>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="s_name" class="form-control-label">{{trans('settings.from')}}</label>
                                <input type="time"  name="fromWorkinghours"  class="form-control" value="{{$info->WorkingHoursFrom}}" >
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="s_name" class="form-control-label">{{trans('settings.to')}}</label>
                                <input type="time"  name="toWorkinghours"  class="form-control" value="{{$info->WorkingHoursTo}}" >
                            </div>


                            <input type="hidden" name="massage" value="{{trans('settings.Addmassage')}}">
                        </div>

                        <div class="modal-footer">
                            <button type="submit"
                                    class="btn btn-success">{{trans('settings.btnSave')}}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!--end::Body-->

    <!-- row closed -->
@endsection
@section('js')





@endsection
