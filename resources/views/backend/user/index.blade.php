@extends('layouts.backend')

@section('content')
    <div class="page-heading">
        <h3>用户管理</h3>
        <ul class="breadcrumb">
            <li><a href="/backend/index">后台首页</a></li>
            <li class="active">用户管理</li>
        </ul>
    </div>

    <div style="margin:10px;border: 0px solid #ccc;background-color: #fff;padding:10px;">
        <a href="{{ URL::route('user.create') }}"><button class="btn btn-success">新增管理员</button></a>
    </div>

    <div style="padding: 10px;">
        <table class="table backendtable">
            <tbody>
            <thread>
                <td>ID</td>
                <td>用户名</td>
                <td>邮箱名</td>
                <td>操作</td>
            </thread>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td style="line-height: 34px;">{{ $user->name }}</td>
                    <td style="line-height: 34px;">{{ $user->email }}</td>
                    <td>
                        {!! createDeleteFrom("/backend/user/" .  $user->id,'删除') !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {!! $users->links() !!}
@endsection


@section('javascript')
@endsection