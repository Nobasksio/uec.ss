@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список пользователей</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th>Дата создания</th>
                            <th>Тип</th>
                        </tr>
                        @foreach($positions as $key=>$position)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $position['name'] }}</td>
                                <td>{{ $position['created_at'] }}</td>
                                <td>{{ $position['type'] }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection