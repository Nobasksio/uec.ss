@extends('layouts.master')


@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Список приглашений</h3>

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
                        <th>Почта</th>
                        <th>Должность</th>
                        <th>Подразделение</th>
                        <th>Статус</th>
                    </tr>
                    @foreach($invites as $key=>$invite)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $invite['name'] }}</td>
                        <td>{{ $invite['created_at'] }}</td>
                        <td>{{ $invite['email'] }}</td>
                        <td>{{ $invite->position['name'] }}</td>
                        <td>{{ $invite->department['name'] }}</td>
                        <td>
                            @if ($invite['active'])
                                Отправлено
                                @else
                                Принято
                            @endif
                        </td>
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