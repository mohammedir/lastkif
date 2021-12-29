@extends('layouts.master')
@section('css')

@section('title')
    {{trans('annualreports.Annual Report')}}
@stop
@endsection
@section('page-header')
    @include('moom.modal_alert')
    @include('annualreports.creatre_annual_reports')
    @include('annualreports.edit_annual_reports')
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <input type="hidden" id="language" value="{{config('app.locale')}}">
        <div class="col-md-12 mb-30">
            <button id="create_new_annual_report"
                    class="btn btn-primary mb-3">{{trans('annualreports.Create Annual Report')}}</button>
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="table-responsive" style="padding: 30px">
                        <table id="annual-reports-table" class="table table-bordered datatable"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr class="border-secondary">
                                <th>{{trans("annualreports.Sl-No")}}</th>
                                <th>{{trans("annualreports.Year name")}}</th>
                                <th>{{trans("annualreports.Banner")}}</th>
                                <th>{{trans("annualreports.PDF")}}</th>
                                <th>{{trans("annualreports.Actions")}}</th>
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
    <script src="{{ asset('js/annual_reports.js') }}" defer></script>
@endsection
