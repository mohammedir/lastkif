@extends('layouts.master')
@section('css')

@section('title')
    Widgets
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
                    <li class="breadcrumb-item active">{{trans('widgets.Mywidgets')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

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
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">Add
                    </button>
                    <br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('widgets.WidgetName')}}</th>
                                <th>{{trans('widgets.Code')}}</th>
                                <th>{{trans('widgets.update')}}</th>
                                <th>{{trans('widgets.Option')}}</th>


                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($widgetsTable as $widgets)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $widgets->title}}</td>
                                    <td>{{ $widgets->value }}</td>
                                    <td>{{ $widgets->updated_at}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $widgets->id }}"
                                                title=""><i class="fa fa-edit"></i></button>
                                    </td>
                                </tr>


                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $widgets->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{trans('widgets.EditTitle')}}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{ route('widgets.update', 'test') }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf

                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name"
                                                                   class="mr-sm-2">{{trans('widgets.EditName')}}
                                                                :</label>
                                                            <input id="Name" type="text" name="widgetname_en"
                                                                   class="form-control" value="{{$widgets->title}}"
                                                                   readonly>
                                                            <input type="hidden" name="id" value="{{$widgets->id}}">
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <!-- Page Value-->
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{trans('widgets.EditCode')}}
                                                            :</label>
                                                        <textarea class="form-control" name="Editewidgetvalue"
                                                                  id="exampleFormControlTextarea1"
                                                                  rows="5">{{ $widgets->value }}</textarea>
                                                    </div>
                                                    <br><br>
                                                    <input type="hidden" name="massage"
                                                           value="{{trans('widgets.massage')}}">

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('SEO-trans.Editclose') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-success">{{ trans('SEO-trans.Editsubmit') }}</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- add_modal_Grade -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('Grades_trans.add_Grade') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('widgets.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name" class="mr-sm-2">Widget Name(EN)
                                    :</label>
                                <input id="Name" type="text" name="widgetname_en" class="form-control">
                            </div>
                            <div class="col">
                                <label for="Name_en" class="mr-sm-2">Widget Name(AR)
                                    :</label>
                                <input type="text" class="form-control" name="widgetname_ar">
                            </div>
                        </div>
                        <br><br>
                        <!-- Page Value-->
                        <div class="form-group">
                            <label
                                for="exampleFormControlTextarea1">Widget Value
                                :</label>
                            <textarea class="form-control" name="widgetvalue"
                                      id="exampleFormControlTextarea1"
                                      rows="3"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                            <button type="submit" class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


    </div>



    <!-- row closed -->
@endsection
@section('js')

@endsection
