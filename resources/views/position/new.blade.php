@extends('layouts.master')
@section('css_header')
    <link rel="stylesheet" href="/assets/AdminLTE-master/bower_components/select2/dist/css/select2.min.css">
@endsection
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Создание новой должности</h3>
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
                        <label for="exampleInputEmail1">Название</label>
                        <input type="text" name='name' class="form-control" id="exampleInputEmail1" placeholder="Фамилия Имя">
                    </div>
                    <div class="form-group">
                        <label>Категория</label>
                        <select class="form-control select2" name='type' style="width: 100%;">
                            <option value='0' selected="selected">Линейный персонал</option>
                            <option value='1' >Управляющий</option>
                            <option value='2' >Офисный сотрудник</option>
                            <option value='3' >Ни рыба не меся</option>
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Создать</button>
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