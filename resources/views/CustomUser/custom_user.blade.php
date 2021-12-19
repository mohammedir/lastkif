@extends('layouts.master')
@section('css')
{{--{{--//TODO:: MOOME**N S. A**LDAHDOUH 12/15/2021--}}
@section('title')
    @switch($user_type)
        @case(0)
        Agents
        @break
        @case (1)
        Partners
        @break
        @case (2)
        Managers
        @break
        @case (3)
        Providers
        @break
    @endswitch
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
                    <li class="breadcrumb-item"><a href="#" class="default-color">Halls</a></li>
                    <li class="breadcrumb-item active">Hall</li>
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
            <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
            @switch($user_type)
                @case(0)
                <button id="create_agents" class="btn btn-primary mb-3">
                    Create Agents
                </button>
                @break
                @case (1)
                <button id="create_partners" class="btn btn-primary mb-3">
                    Create Partners
                </button>
                @break
                @case (2)
                <button id="create_managers" class="btn btn-primary mb-3">
                    Create Managers
                </button>
                @break
                @case (3)
                <button id="create_providers" class="btn btn-primary mb-3">
                    Create Providers
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
                                    <th>Sl No</th>
                                    <th>Banner</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Actions</th>
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
    <script src="{{ asset('js/custom_users.js') }}" defer></script>
@endsection
{{--{{--//TODO:: MOOME*N S. ALDAH*DOUH 12/15/2021--}}
