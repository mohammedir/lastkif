@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">


        @if ($errors->any())
            <div class="error">{{ $errors->first('Name') }}</div>
        @endif



        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">Add
                    </button>
                    <br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Page Name</th>
                                <th>Page title</th>
                                <th>Meta title</th>
                                <th>Page Meta description </th>
                                <th>Option</th>


                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($SEO as $SEOs)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $SEOs->namePage }}</td>
                                    <td>{{ $SEOs->Pagetitle }}</td>
                                    <td>{{ $SEOs->Metatitle }}</td>
                                    <td>{{ $SEOs->Metadescription }}</td>



                                        <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $SEOs->id }}"
                                                title=""><i class="fa fa-edit"></i></button>
                                    </td>
                                </tr>


                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $SEOs->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('SEO-trans.EditModel') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{ route('SEO-Page.update', 'test') }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf


                                                    <!-- Page title (AR/EN)-->
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name"
                                                                   class="mr-sm-2">Page title(EN)
                                                                :</label>
                                                            <input id="Name" type="text" name="pagetitle_en"
                                                                   class="form-control"
                                                                   value=""
                                                                   >
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                   value="{{ $SEOs->id }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en"
                                                                   class="mr-sm-2">Page title(AR)
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                   value=""
                                                                   name="pagetitle_ar">
                                                        </div>
                                                    </div>

                                                    <!-- Page Meta title (AR/EN)-->
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name"
                                                                   class="mr-sm-2">Page title
                                                                :</label>
                                                            <input id="Name" type="text" name="Pagetitle"
                                                                   class="form-control"
                                                                   value=""
                                                                   >
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                   value="{{ $SEOs->id }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en"
                                                                   class="mr-sm-2">Meta title
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                   value=""
                                                                   name="Metatitle" >
                                                        </div>
                                                    </div>


                                                    <!--Page Meta description (EN)-->
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">Meta description
                                                            :</label>
                                                        <textarea class="form-control" name="Metadescription"
                                                                  id="exampleFormControlTextarea1"
                                                                  rows="3">{{ $SEOs->Metadescription }}</textarea>
                                                    </div>


                                                    <!-- Page Meta description (AR)-->
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">Meta description
                                                            :</label>
                                                        <textarea class="form-control" name="Metadescription"
                                                                  id="exampleFormControlTextarea1"
                                                                  rows="3">{{ $SEOs->Metadescription }}</textarea>
                                                    </div>



                                                    <br><br>

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
                            <form action="{{ route('SEO-Page.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="Name" class="mr-sm-2">Page title(EN)
                                            :</label>
                                        <input id="Name" type="text" name="namePage_ar" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="Name_en" class="mr-sm-2">Page Meta title
                                            :</label>
                                        <input type="text" class="form-control" name="namePage_en">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="Name" class="mr-sm-2">Page Meta title(EN)
                                            :</label>
                                        <input id="Name" type="text" name="namePage_ar" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="Name_en" class="mr-sm-2">Page Meta title
                                            :</label>
                                        <input type="text" class="form-control" name="namePage_en">
                                    </div>
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
    @toastr_js
    @toastr_render
@endsection
