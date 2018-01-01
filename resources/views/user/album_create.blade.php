<form id="create_album" class="white_content" method="POST" action="/{{ Auth::user()->id }}/album/create" style="background: url('/images/camera.jpg') no-repeat; background-size: cover">
    {{ csrf_field() }}

    <div class="container" style="top: 5em;">
        <h3 style="alignment: center;margin-top: 1em">
            新建相册
        </h3>
        <hr>
        <div class="form-group">
            <label for="title">相册名</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="title" placeholder="取个喜欢的名字" required>
        </div>
        <div class="form-group">
            <label for="url">封面url</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="url" placeholder="封面图片路径" required>
        </div>
        <div class="form-group">
            <label for="tag">标签</label>
            <input type="text" class="form-control" id="formGroupExampleInput3" name="tag" placeholder="格式：#tag1 #tag2">
        </div>
        <a href="javascript:void(0)" class="btn btn-light " style="float: right;margin-top: 1.5em"
           onclick="document.getElementById('create_album').style.display='none';document.getElementById('fade').style.display='none'">关闭</a>

        <button type="submit" class="btn btn-light" style="float:right;margin-right: 1em;margin-top: 1.5em">提交</button>

    </div>

</form>