@extends('layouts.master')
@section('css')

@section('title')
    {{trans('events.Events')}}
@stop
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="row">
                <div class="col-md-6">
                    <button id="create_event" class="btn btn-primary mb-3">
                        {{trans('events.Create-Event')}}
                    </button>
                </div>
                <div class="col-md-6">
                    <div class="form-check form-switch" style="padding: 0;margin: 0">
                        <input id="status" class="toggle-class" type="checkbox"
                               data-onstyle="success"
                               data-offstyle="danger" data-toggle="toggle" data-on="Active"
                               data-off="Inactive" data-size="xs"
                                {{0 ? 'checked' : ''}}>
                    </div>
                </div>
            </div>

            <div class="card card-statistics">
                <div class="card-body">
                    <div id='calendar' class=" mt-3">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @include('moom.modal_alert')
    @include('Events.modal_create_event')
    @include('Events.modal_update_event')
    <script src="{{ asset('js/events.js') }}" defer></script>
@endsection
