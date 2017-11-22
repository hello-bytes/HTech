@extends('layouts.defaultlayout')

@section('header')
    <title>{{ postTitle() }}</title>
@endsection

@section('content')
    <main id="main" class="main">
        <div class="main-inner">
            <div class="content-wrap">
                <div id="content" class="content">
                    <div id="posts" class="posts-expand" style="text-align: center">
                        <p style="font-size: 40px;">SORRY, IT IS 404!</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <br/>
@endsection