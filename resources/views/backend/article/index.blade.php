@extends('layouts.backend')

@section('content')
    <div style="padding: 20px;">
        <table class="table backendtable">
            <tbody>
                <thread>
                    <td>ID</td>
                    <td>标题</td>
                    <td>操作</td>
                </thread>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td style="line-height: 34px;">{{ $article->title }}</td>
                        <td><a href="/"><button class="btn btn-default">编辑</button></a>&nbsp;<a href="/"><button class="btn btn-default">删除</button></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {!! $articles->links() !!}
@endsection