@extends('layouts.defaultlayout')

@section('header')
    <title>关于我们 - {{ postTitle() }}</title>
@endsection

@section('content')
    <main id="main" class="main">
        <div class="main-inner">
            <div class="content-wrap">
                <div id="content" class="content">
                    <div id="posts" class="posts-expand">
                        我们似乎忘了介绍自己~~
                    </div>
                </div>
            </div>
        </div>
    </main>
    <br/>
@endsection