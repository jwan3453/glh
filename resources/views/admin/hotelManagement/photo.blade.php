@extends('website')


@section('resources')


    <link  href="{{ asset('/css/webuploader.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/webuploader.js') }}"></script>

@stop

@section('content')
    <form method="POST" action="{{url('admin/hotel/addPhoto')}}"  enctype="multipart/form-data" id="photoForm">
        <div class="container">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="hotelId" value="{{$hotelId}}">
            <h3>酒店图片录入</h3>
            <div class="margin-top"></div>
            <div id="hotelPhotos" class=" hotel-form">
                <div class="hotel-info-heading" >
                    <span>酒店图片上传</span>
                </div>



                <div id="uploader-demo" style="overflow: hidden">
                    <!--用来存放item-->
                    <div style="overflow: hidden;   ">
                        <div id="fileList" class="uploader-list" >


                        </div>
                        <div  style="height: 260px; width:200px; float:left;overflow: hidden;  ">
                        {{--<input type="file" class="file_input" id="filesInput" name="filesInput" multiple>--}}
                            <div class="add-pic"></div>
                        </div>
                    </div>
                    <div id='filePicker' class="none-display" >选择图片</div>
                </div>




            </div>


            <div>

                <button type="submit" class="submit-Hotel nextStep-mid " id="submitNewHotel"><span>提交</span><i class="icon-ok icon-large"></i></button>
            </div>




        </div>
    </form>
@stop


@section('script')
    <script type="text/javascript">

        var uploader = WebUploader.create({

            // 选完文件后，是否自动上传。
            auto: true,

            // swf文件路径
            swf:'/js/Uploader.swf',

            // 文件接收服务端。
            server: '/upload/images',
            //server: 'http://up.qiniu.com/',
            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#filePicker',

            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            },
            'formData' : {

                '_token': '{{ csrf_token() }}',
                'hotelId': '{{$hotelId}}'

            },
            // compress : false
        });

        uploader.on( 'fileQueued', function( file ) {
            var $li = $(
                            '<div id="' + file.id + '" class="img-item thumbnail">' +
                            '<img>' +
                            '<div class="img-option"><i class="icon-trash icon-2x"></i></div>' +
                            '<div class="success-mark"><i class="icon-ok icon-large"></i></div>'+

                            '</div>'
                    ),
                    $img = $li.find('img');


            // $list为容器jQuery实例
            $('#fileList').append( $li );

            // 创建缩略图
            // 如果为非图片文件，可以不用调用此方法。
            // thumbnailWidth x thumbnailHeight 为 100 x 100
            uploader.makeThumb( file, function( error, src ) {
                if ( error ) {
                    $img.replaceWith('<span>不能预览</span>');
                    return;
                }

                $img.attr( 'src', src );
            }, 200, 200 );
        });

        uploader.on( 'uploadProgress', function( file, percentage ) {
            var $li = $( '#'+file.id ),
                    $percent = $li.find('.progress span');

            // 避免重复创建
            if ( !$percent.length ) {
                $percent = $('<p class="progress"><span></span></p>')
                        .appendTo( $li )
                        .find('span');
            }

            $percent.css( 'width', percentage * 100 + '%' );
        });

        // 文件上传成功，给item添加成功class, 用样式标记上传成功。
        uploader.on( 'uploadSuccess', function( file,data ) {
            $( '#'+file.id ).find('.success-mark').css('display','block');
            var itemIndex = file.id.split('_')[2];
            $('<input type="hidden" name="imagePath_'+itemIndex+'" class="image-path" value="'+  data.imgFilePath+ '">').appendTo($( '#'+file.id));

        });

        // 文件上传失败，显示上传出错。
        uploader.on( 'uploadError', function( file ) {
            var $li = $( '#'+file.id ),
                    $error = $li.find('div.error');

            // 避免重复创建
            if ( !$error.length ) {
                $error = $('<div class="error"></div>').appendTo( $li );
            }

            $error.text('上传失败');
        });

        // 完成上传完了，成功或者失败，先删除进度条。
        uploader.on( 'uploadComplete', function( file ) {
            $( '#'+file.id ).find('.progress').remove();

        });

        $(document).on('mouseover mouseout','.img-item',function(){

            if(event.type == "mouseover"){
                var obj =  $(this).find('.img-option').show();
            }else if(event.type == "mouseout"){

                $(this).find('.img-option').hide();
            }
        });

        $(document).on('click','.img-option i', function(){

            var imageItem = $(this).parent().parent();
            var imagePath = imageItem.find('.image-path').val();

             uploader.removeFile(imageItem.attr('id'),true);

                $.ajax({
                    type: 'POST',
                    async:false,
                    url: '/upload/deleteImage',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    data:{imagePath:imagePath},
                    success: function(data)
                    {
                        if(data.status === 1)
                        {
                            imageItem.fadeOut(function(){
                                $(this).remove();
                            })
                        }
                    },
                    error: function(xhr, type){
                        alert('Ajax error!')
                    }
                });
        });

        $('.add-pic').click(function (){

            $('.webuploader-element-invisible').click();

        })


        $(window).bind('beforeunload',function() {
            return confirm("放弃保存吗？");
        });


    </script>
@stop