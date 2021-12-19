@extends('layouts.master')
@section('css')

@section('title')
    {{trans('Users.UserLT')}}
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
                <li class="breadcrumb-item active">{{trans('Users.UserLT')}} </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="col-sm-1 col-md-2">
                <br>
                    <a class="btn btn-primary btn-sm" href="{{ route('users.create') }}">{{trans('Users.Adduser')}}</a>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                           style="text-align: center">

                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">{{trans('Users.Username')}}</th>
                                <th class="wd-20p border-bottom-0">{{trans('Users.E-mail')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('Users.Userstatus')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('Users.Usertype')}}</th>
                                <th class="wd-10p border-bottom-0">{{trans('Users.Processes')}}</th>
                            </tr>
                        </thead>
                    <tbody>
                         @foreach ($data as $key => $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->Status == 'مفعل')
                                    <span class="label text-success d-flex">
                                                    <div class="dot-label bg-success ml-1"></div>{{ $user->Status }}
                                                </span>
                                @else
                                    <span class="label text-danger d-flex">
                                                    <div class="dot-label bg-danger ml-1"></div>{{ $user->Status }}
                                                </span>
                                @endif
                            </td>

                            <td>
                                @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $v)
                                        <label class="badge badge-success">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </td>

                            <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-info"
                                       title="{{trans('Users.btnEditTitle')}}"><i class="las la-pen"><i class="fa fa-edit"></i></i></a>

                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                       data-user_id="{{ $user->id }}" data-username="{{ $user->name }}"
                                       data-toggle="modal" href="#modaldemo8" title="{{trans('Users.btnDeletTitle')}}"><i class="fa fa-trash"></i><i
                                            class="las la-trash"></i></a>
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


<!-- Modal effects -->
<div class="modal" id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{trans('Users.deleteuser')}}</h6><button aria-label="Close" class="close"
                                                                 data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('users.destroy', 'test') }}" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <p>{{trans('Users.suredeleting')}}</p><br>
                    <input type="hidden" name="user_id" id="user_id" value="">
                    <input class="form-control" name="username" id="username" type="text" readonly>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Users.close')}}</button>
                    <button type="submit" class="btn btn-danger">{{trans('Users.Delet')}}</button>
                </div>
            </form>

        </div>
    </div>

</div>

<!-- row closed -->
@endsection
@section('js')

    <script>
        $('#modaldemo8').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var user_id = button.data('user_id')
            var username = button.data('username')
            var modal = $(this)
            modal.find('.modal-body #user_id').val(user_id);
            modal.find('.modal-body #username').val(username);
        })
    </script>


@endsection
