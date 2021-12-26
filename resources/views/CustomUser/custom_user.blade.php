@extends('layouts.master')
@section('css')
    {{--{{--//TODO:: MOOME**N S. A**LDAHDOUH 12/15/2021--}}
@section('title')
    @switch($user_type)
        @case(0)
        {{trans("customusers.Agents")}}
        @break
        @case (1)
        {{trans("customusers.Partners")}}
        @break
        @case (2)
        {{trans("customusers.Managers")}}
        @break
        @case (3)
        {{trans("customusers.Providers")}}
        @break
    @endswitch
@stop
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
            @switch($user_type)
                @case(0)
                <button id="create_agents" class="btn btn-primary mb-3">
                    {{trans("customusers.Create-Agents")}}
                </button>
                @break
                @case (1)
                <button id="create_partners" class="btn btn-primary mb-3">
                    {{trans("customusers.Create-Partners")}}
                </button>
                @break
                @case (2)
                <button id="create_managers" class="btn btn-primary mb-3">
                    {{trans("customusers.Create-Managers")}}
                </button>
                @break
                @case (3)
                <button id="create_providers" class="btn btn-primary mb-3">
                    {{trans("customusers.Create-Partners")}}
                </button>
                @break
            @endswitch
            <div class="card card-statistics">
                <div class="card-body">
                    <input type="hidden" value="{{$user_type}}" id="user_type">
                    <div class="bg-white overflow-hidden shadow-xl ">
                        <div class="table-responsive" style="padding: 30px">
                            <table id="custom-users-table" class="table  table-hover table-sm table-bordered p-0"
                                   data-page-length="50"
                                   style="text-align: center">
                                <thead>
                                <tr>
                                    <th>{{trans("customusers.Sl-No")}}</th>
                                    <th>{{trans("customusers.Banner")}}</th>
                                    <th>{{trans("customusers.Name")}}</th>
                                    <th>{{trans("customusers.Email")}}</th>
                                    <th>{{trans("customusers.Phone")}}</th>
                                    <th>{{trans("customusers.Actions")}}</th>
                                </tr>
                                </thead>
                            </table>
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
    <script src="{{ asset('js/custom_users.js') }}" defer></script>
@endsection
{{--{{--//TODO:: MOOME*N S. ALDAH*DOUH 12/15/2021--}}
