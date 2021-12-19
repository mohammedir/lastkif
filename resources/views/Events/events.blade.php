@extends('layouts.master')
@section('css')

@section('title')
    Events
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
    <div class="row">
        <div class="col-md-12 mb-30">
            <button id="create_event" class="btn btn-primary mb-3">
                Create Event
            </button>

            <div class="card card-statistics">
                <div class="card-body">
                    <div id='calendar' class=" mt-3">
                    </div>
                </div>
                @include('moom.modal_alert')
                @include('Events.modal_create_event')
                @include('Events.modal_update_event')
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script src="{{ asset('js/events.js') }}" defer></script>
@endsection
