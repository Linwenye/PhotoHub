@extends('layouts.layout')
@section('css')
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="/css/landing.css" rel="stylesheet">
@endsection
@section('content')
    <header class="masthead text-white text-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h1 class="mb-2" style="color: #67b168">发现 分享 互动</h1>
                    <h3 class="mb-4" style="color: #67b168">PhotoHub 留住感动</h3>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <form method="POST" action="/search_result">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col-12 col-md-9 mb-2 mb-md-0">
                                <input name="q" class="form-control form-control-lg"
                                       placeholder="Search by photo title">
                            </div>
                            <div class="col-12 col-md-3">
                                <button type="submit" class="btn btn-block btn-lg btn-primary" style="background:#84754e;">Search!</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    @yield('result')
@endsection