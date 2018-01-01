@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="/css/layout.css">
    <link rel="stylesheet" href="/css/common.css">
    <style>
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
            height: 35%;
            padding: 20px;
            background-color: white;
            z-index: 1002;
            overflow: auto;
        }


    </style>
@endsection

@section('content')
    <div class="container" style="width: 50%;margin-top: 4em">
        <h3>账户管理</h3>
        <ul class="list-group mt-4 mb-5">
            @foreach($users as $user)
                <li class="list-group-item">
                    <label>用户： {{$user->name}}</label>
                    <label style="margin-left: 6em">邮箱： {{$user->email}}</label>
                    <form method="post" action="/admin/delete_usr/{{$user->id}}">
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="/admin/delete_usr/{{$user->id}}" type='submit' data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="btn btn-danger" style="float: right">
                            删除
                        </a>
                        {{--<a href="/delete_usr/{{$user->id}}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?">删除</a>--}}
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

@endsection