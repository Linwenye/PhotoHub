<form id="create_topic" class="white_content" method="POST" action="/{{ Auth::user()->id }}/article/create" style="background: url('/images/camera.jpg') no-repeat; background-size: cover">
    {{ csrf_field() }}

    <div class="container" style="top: 5em;">
        <h3 style="alignment: center;margin-top: 1em">
            发表活动
        </h3>
        <hr>
        <div class="form-group">
            <label for="title">活动名</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="title" placeholder="取个喜欢的名字" required>
        </div>
        <div class="form-group">
            <label for="url">描述</label>
            <textarea class="form-control" id="formGroupExampleInput2" name="description" placeholder="描述活动详情"
                      required></textarea>
        </div>
        <a href="javascript:void(0)" class="btn btn-light " style="float: right;margin-top: 1.5em"
           onclick="document.getElementById('create_album').style.display='none';document.getElementById('fade').style.display='none'">关闭</a>

        <button type="submit" class="btn btn-light" style="float:right;margin-right: 1em;margin-top: 1.5em">提交</button>

    </div>

</form>


</div>