@extends('layouts.master')
@section('css_header')
    <link rel="stylesheet" href="/assets/AdminLTE-master/bower_components/select2/dist/css/select2.min.css">
@endsection
@section('H1')
<section class="content-header" >
    <h1 >
        Dashboard
        <small >Control panel</small >
    </h1 >
    <ol class="breadcrumb" >
        <li ><a href="#" ><i class="fa fa-dashboard" ></i > Home</a ></li >
        <li class="active" >Dashboard</li >
    </ol >
</section >
@endsection
@section('content')


<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Пригласить нового пользователя</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST">
                <div class="box-body">
                    @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Успех!</h4>
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    @if($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-ban"></i> Ошибка!</h4>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>
                                            $error
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail1">Фамилия Имя</label>
                        <input type="text" class="form-control" name='name' id="exampleInputEmail1" placeholder="Фамилия Имя">
                    </div>
                    <div class="form-group">
                        <label>Должность</label>
                        <select class="form-control select2" name='position' style="width: 100%;">
                            @foreach($positions as $position)
                            <option value="{{ $position['id'] }}">{{ $position['name'] }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Подразделение</label>
                        <select class="form-control select2" name='department' style="width: 100%;">
                            @foreach($departments as $department)
                                <option value="{{ $department['id'] }}">{{ $department['name'] }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Почта</label>
                        <input type="email" class="form-control" name='email' id="exampleInputEmail1" placeholder="Email">
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
        <!-- /.box -->
</div>
    @endsection
@section('footer_js')
<script src="/assets/AdminLTE-master/bower_components/select2/dist/js/select2.full.min.js"></script>
@endsection
@section('footer_js_inline')
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        })
    </script>
@endsection