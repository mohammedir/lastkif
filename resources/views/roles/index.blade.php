@extends('layouts.master')
@section('css')

@section('title')
    {{trans('Users.UserPermissions')}}
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
                <li class="breadcrumb-item active">{{trans('Users.UserPermissions')}}</li>
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
        <div class="card card-statistics h-100">
            <div class="col-sm-1 col-md-2">
                <br>
                <a class="btn btn-primary btn-sm" href="{{ route('roles.create') }}">{{trans('Users.btnAddPerm')}}</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                           style="text-align: center">

                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('Users.NamePerm')}}</th>
                            <th>{{trans('Users.Processes')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
<!--
                                        <a class="btn btn-success btn-sm"
                                           href="{{ route('roles.show', $role->id) }}">عرض</a>
-->


                                        <a class="btn btn-primary btn-sm"
                                           href="{{ route('roles.edit', $role->id) }}" title="{{trans('Users.btnEditTitle')}}"><i class="las la-pen"><i class="fa fa-edit"></i></i></a>


                                    @if ($role->name !== 'owner')
                                        @can('حذف صلاحية')
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy',
                                            $role->id], 'style' => 'display:inline']) !!}
                                            {!! Form::submit('حذف', ['class' => 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    @endif


                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
