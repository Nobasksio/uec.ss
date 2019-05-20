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
                <h3 class="box-title">Создание нового ресторана</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
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
                        <input type="text"  name='name' class="form-control" id="exampleInputEmail1" placeholder="Название">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Адрес</label>
                        <input type="text" name='address' class="form-control" id="exampleInputEmail1" placeholder="Адрес">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Телефон</label>
                        <input type="text" name='phone' class="form-control" id="exampleInputEmail1" placeholder="Телефон">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Часовой пояс</label>
                        <select class="form-control select2" name='timeZone' style="width: 100%;">
                            <option selected="selected">Москва</option>
                            <option>Иркутск +5 </option>
                            <option>Лос Анжелес -7</option>
                            <option>Время не имеет значения</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Описание</label>
                        <input type="text" name='description' class="form-control" id="exampleInputEmail1" placeholder="описание">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Режим работы</label>
                        <input type="text" name='time_work' class="form-control" id="exampleInputEmail1" placeholder="Режим работы">
                    </div>


                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="active"> Активность
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