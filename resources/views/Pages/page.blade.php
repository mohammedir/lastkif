@extends('layouts.master')
@section('css')

@section('title')
    pages
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
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
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
            <div class="card-body">



                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name of Page</th>
                            <th>Date  created</th>
                            <th>link</th>
                            <th>Status</th>
                            <th>option</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($page as $pages)
                            @php
                                $i++
                            @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $pages->namePage }}</td>
                                <td>{{ $pages->created_at}}</td>
                                <td><a href=""></a>{{$pages->pagelink}}</td>
                            <!--                                <td class="text-center"><input type="checkbox"  data-toggle="toggle" data-size="xs" @if(!$pages->status == 1) checked=checked @endif  id="checkbox{{$pages->id}}"></td>
                               -->
                                <td class="text-center">
                                    <input data-id="{{$pages->id}}" class="toggle-class" type="checkbox" data-onstyle="success"
                                           data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" data-size="xs"
                                        {{$pages->Status ? 'checked' : ''}}
                                    >


                                </td>
                                <td class="text-center">
                                    <a type="button" class="btn btn-info btn-sm"
                                       href="{{ url('edit_page') }}/{{ $pages->id }}" name=""
                                       title=""><i class="fa fa-edit"></i></a>
                                    <input type="hidden" name="{{$pages->id}}">
                                <!--                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $pages->id }}"
                                            title=""><i
                                            class="fa fa-trash"></i></button>-->
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>

                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>
        </div>
    </div>

<!-- row closed -->
@endsection
@section('js')

    <script>
        $(document).ready(function (){
            $("#page_table").DataTable()

        });
        $(function (){
            $('.toggle-class').change(function (){
                var status = $(this).prop('checked') == true ? 1 : 0;
                var page_id = $(this).data('id');
                $.ajax({
                    type:"GET",
                    dataType:"json",
                    url:'/changePageStatus',
                    data:{'status':status,'page_id':page_id},
                    success:function (data){
                        console.log(data.success)
                    }

                })
            })
        })
    </script>

@endsection







