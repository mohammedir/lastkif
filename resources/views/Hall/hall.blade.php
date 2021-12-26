@extends('layouts.master')
@section('css')
    {{--{{--//TODO:: MO//OMEN S. ALD//AHDOUH 12/18//202/1--}}
@section('title')
    {{trans("halls.Halls")}}
@stop
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
            <button id="create_halls" class="btn btn-primary mb-3">
                {{trans("halls.Create-Halls")}}
            </button>
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="table-responsive" style="padding: 30px">
                        <table id="halls-table" class="table table-bordered datatable"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr class="border-secondary">
                                <th>{{trans("halls.Sl-No")}}</th>
                                <th>{{trans("halls.Name")}}</th>
                                <th>{{trans("halls.Title")}}</th>
                                <th>{{trans("halls.Type")}}</th>
                                <th>{{trans("halls.Actions")}}</th>
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
    @include('moom.modal_alert')
    <script src="{{ asset('js/halls.js') }}" defer></script>
@endsection
{{--{{--//TODO:: MOOM/EN S. ALD//*AHDOUH 12///18/20-21--}}
