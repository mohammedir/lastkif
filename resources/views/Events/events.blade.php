@extends('layouts.master')
@section('css')

@section('title')
    {{trans('events.Events')}}
@stop
@endsection
@section('content')
    <!-- row -->
    <input type="hidden" id="language" value="{{config('app.locale')}}">
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{route('events.createevent')}}" id="create_event" class="btn btn-primary mb-3">
                        {{trans('events.Create-Event')}}
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="form-check form-switch float-right" style="padding: 0;margin: 0">
                        <input id="status" class="toggle-class" type="checkbox"
                               data-onstyle="secondary"
                               data-offstyle="primary"
                               data-toggle="toggle"
                               data-on="{{trans('events.Events')}}"
                               data-off="{{trans('events.Calender')}}" data-size="xs"
                                {{0 ? 'checked' : ''}}>
                    </div>
                </div>
            </div>

            <div class="card card-statistics">
                <div class="card-body">
                    <div id="events_table_section" class="mt-3 d-none col-md-12">
                        <div class="table-responsive" style="padding: 30px">
                            <table id="events_table" class="table table-bordered datatable col-md-12"
                                   style="text-align: center; width: 100%">
                                <thead>
                                <tr class="border-secondary">
                                    <th>{{trans("events.Sl-No")}}</th>
                                    <th>{{trans("events.Title")}}</th>
                                    <th>{{trans("events.Start")}}</th>
                                    <th>{{trans("events.End")}}</th>
                                    <th>{{trans("events.Type")}}</th>
                                    <th>{{trans("events.Actions")}}</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div id="events_calender_section" class="mt-3">
                        <div id='calendar'>
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
    @include('Events.view_event')
    {{--@include('Events.modal_create_event')--}}
    {{--@include('Events.modal_update_event')--}}
    <script src="{{ asset('js/events.js') }}" defer></script>
@endsection
