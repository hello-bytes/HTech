@extends('layouts.backend')

@section('content')
    <div style="padding: 20px;">
        <table class="table backendtable">
            <tbody>
            <thread>
                <td>ID</td>
                <td>名称</td>
                <td>值</td>
                <td>操作</td>
            </thread>
            @foreach ($settings as $setting)
                <tr>
                    <td style="line-height: 34px;">{{ $setting->id }}</td>
                    <td style="line-height: 34px;">{{ $setting->system_name }}</td>
                    <td style="line-height: 34px;">{{ $setting->system_value }}</td>
                    <td>
                        {!! createEditFrom("/backend/setting/" .  $setting->id . "/edit") !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection