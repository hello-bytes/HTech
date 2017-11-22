@extends('layouts.backend')

@section('content')
    <div style="padding: 20px;">
        <table class="table backendtable">
            <tbody>
            <thread>
                <td>ID</td>
                <td>用户名</td>
                <td>操作</td>
            </thread>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td style="line-height: 34px;">{{ $user->name }}</td>
                    <td><a href="/"><button class="btn btn-default">编辑</button></a>&nbsp;<a href="/"><button class="btn btn-default">删除</button></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {!! $users->links() !!}
@endsection