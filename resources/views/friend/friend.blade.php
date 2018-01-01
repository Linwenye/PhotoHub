@extends('layouts.layout')

@section('css')
    <style>
        h5 {
            color: #67b168;
        }
    </style>
@endsection
@section('content')

    {{--<div class="container">--}}
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-5 pt-4" style="border: 0.2em antiquewhite solid;">
                <h5>我的好友</h5>
                <ul class="list-group mt-4 mb-5">
                    @foreach($users as $user)
                        <li class="list-group-item" style="border: 0.1em antiquewhite solid;">
                            <label>用户： {{$user->name}}</label>
                            <a href="/{{$user->user_id}}/delete_friend/{{$user->friend_id}}" type='submit'
                               data-method="delete"
                               data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="btn btn-warning"
                               style="float: right">
                                取消关注
                            </a>

                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6 pt-4" style="border: 0.2em antiquewhite solid;">
                <h5 style="padding-left: 1em">发现好友</h5>
                <form class="form-inline mt-4" method="POST" action="/{{Auth::user()->id}}/search_friend">
                    {{ csrf_field() }}

                        <input name='friend' style="width: 80%" class="form-control" type="text" placeholder="搜索感兴趣的朋友~">
                        <button class="btn btn-warning" type="button">
                            搜索
                        </button>
                </form>
                @yield('result')
            </div>
        </div>
    </div>

@endsection