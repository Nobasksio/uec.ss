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
            <form role="form">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Фамилия Имя">
                    </div>
                    <div class="form-group">
                        <label>Категория</label>
                        <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">Линейный персонал</option>
                            <option>Управляющий</option>
                            <option>Офисный сотрудник</option>
                            <option>Ни рыба не меся</option>
                        </select>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Check me out
                        </label>
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