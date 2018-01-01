@extends('layouts.layout')
@section('css')

    <style>
        .uploadify {
            display: inline-block;
        }

        .uploadify-button {
            border: none;
            border-radius: 5px;
            margin-top: 8px;
        }

        table.add_tab tr td span.uploadify-button-text {
            color: #FFF;
            margin: 0;
        }

        body{
            background: url('/images/satellite.jpg') no-repeat; background-size: cover;
        }
    </style>
@endsection
@section('content')
    <div class="container" >
        <form id="post_photo" class="white_content" method="POST" action="/{{ Auth::user()->id }}/upload" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="container" style="top: 5em;padding-bottom: 3em;padding-top: 2em;width: 60%">
                <h3 style="alignment: center;margin-top: 1em">
                    发布照片
                </h3>
                <hr>

                <div class="form-group">
                    <input id="file_upload" name="file_upload" type="file" multiple="true" required>
                    {{ csrf_field() }}
                    <input type="text" class="form-control" id="formGroupExampleInput" name="title"
                           placeholder="取个喜欢的名字" style="margin-top: 1em"
                           required>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect2">选择存放的相册</label>
                    <select class="form-control" id="exampleFormControlSelect2" name="album_id">
                        @foreach($albums as $album)
                            <option>{{$album->album_id}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="url">描述</label>
                    <textarea class="form-control" id="formGroupExampleInput2" name="description" placeholder="讲讲照片背后的故事吧"
                              required></textarea>
                </div>
                <div class="form-group">
                    <label for="tag">标签</label>
                    <input type="text" class="form-control" id="formGroupExampleInput3" name="tag"
                           placeholder="格式：#tag1#tag2">
                </div>
                <button type="submit" class="btn btn-light" style="margin-left: 30em;margin-top: 1.5em">提交</button>


                <a href="/home" class="btn btn-light " style="margin-left: 1em; margin-top: 1.5em"
                   onclick="document.getElementById('post_photo').style.display='none';">返回</a>

            </div>

        </form>
    </div>

@endsection
