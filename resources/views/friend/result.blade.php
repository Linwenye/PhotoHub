@extends('friend.friend')
@section('result')
    @foreach($friends as $friend)
        <li class="list-group-item" style="border: 0.1em antiquewhite solid; width: 80%">
            <form method="POST" action="/{{Auth::user()->id}}/add_friend/{{$friend->id}}">
                <label>用户： {{$friend->name}}</label>
                {{ csrf_field() }}
                <button class="btn btn-warning" type="submit" style="float: right">
                    关注
                </button>
            </form>
        </li>
    @endforeach
@endsection