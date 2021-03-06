@extends('layouts.master')
@section('css')

@section('title')
    {{trans('specialevents.Special Events')}}
@stop
@endsection
@section('page-header')
    @include('moom.modal_alert')
    @include('specialevents.creatre_special_events')
    @include('specialevents.edit_special_events')
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <input type="hidden" id="language" value="{{config('app.locale')}}">
        <div class="col-md-12 mb-30">
            <button id="create_new_s_event"
                    class="btn btn-primary mb-3">{{trans('specialevents.Create Special Events')}}</button>
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="table-responsive" style="padding: 30px">
                        <table id="special_events-table" class="table table-bordered datatable"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr class="border-secondary">
                                <th>{{trans("specialevents.Sl-No")}}</th>
                                <th>{{trans("specialevents.Name")}}</th>
                                <th>{{trans("specialevents.URL")}}</th>
                                <th>{{trans("specialevents.Actions")}}</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script src="{{ asset('js/special_event.js') }}" defer></script>
@endsection
