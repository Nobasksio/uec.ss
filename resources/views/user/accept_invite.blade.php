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
                <h3 class="box-title">Добро пожаловать, {{ $invite['name'] }}!</h3>
            </div>
            <div class="box-body">
            <p>
                <p>
                Знание — Сила!
                </p>
                И мы готовы поделитсья с тобой ей.
                С помощью этого сервиса ты сможешь получать самые свежие [новости] компании, самые актуальные [знания] своей пройессии, а так же сможешь соревноваться с коллегами чтобы работа была не скучной рутиной, а увлекательной [игрой].
                Чтобы начать, давай завершим запонление профиля.

            </p>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST">
                @csrf
                <input type="hidden" name="hash" value="{{ $invite['hash'] }}">
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
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail1">День рождения</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" name='birthday' id="datepicker">
                        </div>
                    </div>
                        <div class="form-group">
                            <label>О себе</label>
                            <textarea class="form-control" rows="3" placeholder="Не стесняйтесь"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Пароль</label>
                            <input type="password" class="form-control" name='password' id="exampleInputEmail1" placeholder="пароль">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Пароль ещё раз</label>
                            <input type="password" class="form-control" name='password_retry' id="exampleInputEmail1" placeholder="пароль ещё раз">
                        </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Фото</label>
                        <input type="file" id="exampleInputFile">
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
            </form>
        </div>
    </div>
        <!-- /.box -->
</div>
    @endsection
@section('footer_js')
<script src="/assets/AdminLTE-master/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="/assets/AdminLTE-master/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
@endsection
@section('footer_js_inline')
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
            //Date picker
            $('#datepicker').datepicker({
                autoclose: true,
                format: 'dd.mm.yyyy',
            })
        })

    </script>
@endsection