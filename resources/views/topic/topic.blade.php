@extends('layouts.layout')
@section('css')
    <style type="text/css">
        h1, p {
            color: #67b168
        }

        h2 {
            color: #84754E;
        }

        .black_overlay {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: black;
            z-index: 1001;
            -moz-opacity: 0.8;
            opacity: .80;
            filter: alpha(opacity=88);
        }

        .white_content {
            display: none;
            position: absolute;
            top: 22.5%;
            left: 35%;
            width: 30%;
            height: 70%;
            padding: 20px;
            /*border: 10px solid orange;*/
            background-color: white;
            z-index: 1002;
            overflow: auto;
        }
    </style>

@endsection
@section('content')

    <div id="wrapper">

        <div class="container mt-5">
            <div class="container">
                <div class="row" style="width: 100%">
                    <h1>活动精选</h1>
                    <button type="button" class="btn btn-light offset-md-9" style="background: transparent;"
                            onclick="document.getElementById('create_topic').style.display='block';document.getElementById('fade').style.display='block'">
                        <i class="fa fa-plus" aria-hidden="true"></i> 发帖
                    </button>
                </div>
            </div>
            <hr>
            @foreach($articles as $article)
                <div class="col-md-12">
                    <h2>{{$article->title}}</h2>
                    <p>{{$article->description}}</p>
                    <div>
                        <span class="badge badge-info">发布于 {{$article->created_at}}</span>
                        <div class="pull-right"><span class="badge badge-success">活动</span></div>
                    </div>
                    <hr>
                </div>
            @endforeach
        </div>
    </div>

    <div id="fade" class="black_overlay"></div>

    @include('topic.topic_create')
@endsection