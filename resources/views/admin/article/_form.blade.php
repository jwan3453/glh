<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="coverImage" id="coverImage" value="{{$article->page_image}}">
<input type="hidden" id="article_content" value="{{ $article->content_raw }}">


<div class="alert alert-danger content-empty" role="alert">文章内容不能为空</div>
<script type="text/plain" id="editor" style="width:1000px;height:400px;">

</script>

<div class="article-input-section">
    <label>标题:</label>
    <input type="text" class="long-input" name="title" id="title" value={{ $article->title }}>
    <span class="article-error">标题不能为空</span>
</div>


<div class="article-input-section">
    <label>分类:</label>
    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Action <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
        </ul>
    </div>
</div>

<div class="article-input-section">
    <label>标签:</label>
    <div class="input-with-icon-front">
        <span><i class="icon-tag"></i></span>
        <input type="text" class="long-input" placeholder="标签之间用逗号隔开" name="tags"/>
    </div>
</div>


@section('script')
    <script type="text/javascript">
        //实例化编辑器
        var ue = UE.getEditor('editor');
        var content =$('#article_content').val();

        //设置form token, 跟新文章时设置内容
        ue.addListener("ready", function () {
            ue.execCommand('serverparam','_token','{{csrf_token()}}');
            ue.setContent(content);
        })

        //设置封面图片
        if($('#coverImage').val() !== '')
        {
            $('#uploadImageShow').find('img').attr('src', $.trim($('#coverImage').val()));

        }

        $('#uploadImageShow').click(function(){
            $('#uploadImage').click();
        })

        $('#uploadImage').change(function (){

            //用ajax 上传封面图片
            $('#uploadForm').ajaxSubmit({
                dataType:  'json', //数据格式为json
                beforeSend: function() { //开始上传

                },
                uploadProgress: function() {

                },
                success: function(data) { //成功

                    if(data.status === 0)
                    {

                        $('#uploadImageShow').removeClass('upload-article-image').addClass('upload-article-image-show').find('img').attr('src',data.img);
                        $('#coverImage').val(data.img);
                        $('#coverImageFilePath').val(data.imgFilePath);

                    }
                },
                error:function(xhr){ //上传失败

                }
            });


        });

        //上传文章
        $('#submitPost').click(function()
        {
            var post= true;
            if(!ue.hasContents())
            {

                $('html, body').animate({scrollTop:0}, 'slow');
                $('.content-empty').fadeIn(2000).fadeToggle();
                post =false;
            }

            if($('#title').val() ==='')
            {
                $('#title').siblings('.article-error').fadeIn();
                post=false;
            }
            if(post === true)
            {
                $('#articleForm').submit();
            }else{
                return false;
            }

        })

    </script>
@stop