@extends('layouts.backend')

@section('content')
    <div class="panel panel-default" style="margin: 20px;">
        <div class="panel-heading">新增管理员</div>
        <div class="panel-body">
            <form method="POST" action="/backend/user" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">用户名:</label>
                    <div class="col-sm-7">
                        <input type="text" value="" id="name" class="form-control" name="name" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">电子邮件:</label>
                    <div class="col-sm-7">
                        <input type="text" value="" id="email" class="form-control" name="email" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">密码:</label>
                    <div class="col-sm-7">
                        <input type="text" value="" id="password" class="form-control" name="password" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">创建</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection