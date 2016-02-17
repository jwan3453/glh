@extends('website')


@section('resources')


    <link  href="{{ asset('/css/webuploader.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/webuploader.js') }}"></script>

@stop

@section('content')



    <form method="POST" action="{{url('admin/hotel/createNewHotel')}}"  enctype="multipart/form-data" id="newHotelForm">
        <div class="container">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <h3>酒店信息录入</h3>
            <div class="margin-top"></div>
            <div id="hotelBasicInfo" class="hotel-form ">

                <div class="hotel-info-heading" >
                    <span>1.酒店基本信息</span>
                </div>
                <div class="hotel-line-detail">
                    <label>酒店名称 </label>
                    <input type="text" id="hotelName" name="hotelName">
                </div>
                <div class="hotel-line-detail">
                    <label>省份-城市 </label>
                    <input type="text" id="provinceCity" name="provinceCity">
                    <input type="hidden" id="provinceId" name="provinceId">
                    <input type="hidden" id="cityId" name="cityId">
                </div>

                <div class="hotel-line-detail">
                    <label>具体地址 </label>
                    <input type="text" id="addressDetail" name="addressDetail">
                </div>
                <div class="hotel-line-detail">
                    <label>联系电话 </label>
                    <input type="text" id="contactNo" name="contactNo">
                </div>
                <div class="hotel-line-detail">
                    <label>邮箱 </label>
                    <input type="text" id="email" name="email">
                </div>
                <div class="hotel-line-detail">
                    <label>邮编 </label>
                    <input type="text" id="postCode" name="postCode">
                </div>
                <div class="hotel-line-detail">
                    <label>网站地址 </label>
                    <input type="text" id="website" name="website">
                </div>
            </div>

            <div id="hotelInfo" class="none-display hotel-form">

                <div class="hotel-info-heading" >
                    <span>2.酒店具体信息</span>
                </div>
                {{--<div class="hotel-line-detail">--}}
                    {{--<label>具体地理位置 </label>--}}
                    {{--<input type="text">--}}
                {{--</div>--}}
                <div class="hotel-line-detail">
                    <label>PMS系统 </label>
                    <input type="text" id="pmsSys" name="pmsSys">
                </div>

                <div class="hotel-line-detail">
                    <label>房间数量 </label>
                    <input type="text" id="roomUnits" name="roomUnits">
                </div>
                <div class="hotel-line-detail">
                    <label>酒店量级 </label>
                    <input type="text" id="hotelCat" name="hotelCat" id="hotelCat">
                </div>

                <div class="hotel-line-detail">
                    <label>酒店类别 </label>
                    <input type="text" id="hotelType" name="hotelType">
                </div>

                <div class="hotel-line-detail">
                    <label>最近机场 </label>
                    <input type="text" id="airport" name="airport">
                </div>

                <div class="hotel-line-detail">
                    <label>产品特点 </label>
                    <input type="text" id="features" name="features">
                </div>
            </div>

            <div id="roomInfo" class="none-display hotel-form   ">

                <div class="hotel-info-heading" >
                    <span>3.房间信息</span>
                </div>

                <div class="room-info">
                    <input  type="hidden" name="roomCount"  id="roomCount" value="1">
                    <div class="room-detail">

                        <div class="row">
                            <div class="col-lg-2">
                            </div>
                            <div class="col-lg-8">
                                <label> 房间信息</label>
                                <select name="roomType_1">
                                    <option value ="房间类型">房间类型</option>
                                    <option value ="标准房">标准房</option>
                                    <option value ="大床房">大床房</option>
                                    <option value="迷你房">迷你房</option>
                                    <option value="套房">套房</option>
                                </select>



                                <div class="input-with-text">
                                    <input type="text" placeholder="房间数" name="roomUnit_1">
                                    <span>间</span>
                                </div>
                                <div class="input-with-text">
                                    <input type="text" placeholder="价格/晚" name="roomPrice_1">
                                    <span>￥</span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                        </div>

                    </div>


                    <div class="bed-detail">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8 ">
                            <div class="bed-line-detail">
                                <input class="bed-count" type="hidden" name="bedCount_1" value="1">
                                <div class="bed">
                                    <label> 床铺信息</label>
                                    <select name="bedType_1_1">
                                        <option value ="床形">床形</option>
                                        <option value ="双人床">双人床</option>
                                        <option value ="单人床">单人床</option>
                                    </select>

                                    <div class="input-with-text">
                                        <input type="text" placeholder="长度" name="bedLength_1_1">
                                        <span>米</span>
                                    </div>
                                    <div class="input-with-text">
                                        <input type="text" placeholder="宽度" name="bedWidth_1_1">
                                        <span>米</span>
                                    </div>
                                    <div class="input-with-text">
                                        <input type="text" placeholder="床数" name="bedUnit_1_1">
                                        <span>张</span>
                                    </div>

                                </div>

                            </div>
                            <div class="btn-base btn-short add-more-bed">
                                <i class="icon-plus"></i>&nbsp 添加床铺
                            </div>

                        </div>
                            <div class="col-lg-2"></div>
                        </div>
                    </div>
                </div>

                <hr/>
                <div class="btn-base btn-short add-more-room">
                    <i class="icon-plus"></i>&nbsp 添加房间
                </div>


            </div>

            <div id="hotelPhotos" class=" hotel-form none-display ">
                <div class="hotel-info-heading" >
                    <span>4.酒店设施</span>
                </div>

                <div class="facility">
                <input type="hidden" name="selectedFac" id="selectedFac"/>
                @foreach ($facilities as $facility)

                    <div class="facility-list" >
                        <div class="name ">{{$facility['name']}}</div>
                        <div class="facility-sub-list ">
                            @foreach($facility['sub'] as $facility_sub)


                               <div class="sub-name">
                                   <input type=checkbox class="option-input " name="facilityCheck" value="{{$facility['id']}}_{{$facility_sub->id}}">
                                   <span>{{$facility_sub->name}}</span>
                               </div>
                            @endforeach
                        </div>

                    </div>
                    <hr/>
                @endforeach
                </div>






            </div>


            <div >
                <div class="prev-Step prevStep-left"><span>上一步</span><i class="icon-arrow-left icon-large"></i></div>
                <div class="next-Step nextStep-mid" id=""><span>下一步</span><i class="icon-arrow-right icon-large"></i></div>
                <div  class="submit-Hotel nextStep-right none-display " id="submitNewHotel"><span>提交</span><i class="icon-ok icon-large"></i></div>
            </div>



    </div>
    </form>


@stop

@section('script')
<script>

    var qiniuToekn='{{$token}}';

//    //获得七牛token
//    $.ajax({
//        type: 'POST',
//        async:false,
//        url: '/ajax/getQiniuToken',
//        dataType: 'json',
//        headers: {
//            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//        },
//        success: function(data)
//        {
//
//            qiniuToekn = data.token;
//
//        },
//        error: function(xhr, type){
//            alert('Ajax error!')
//        }
//
//    });


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
        alert(data.status);
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



    $(document).on('mouseover mouseout','.img-item',function(event){


            if(event.type == "mouseover"){
                var obj =  $(this).find('.img-option').show();


            }else if(event.type == "mouseout"){

                $(this).find('.img-option').hide();
            }
    });

    $(document).on('click','.img-option i', function(){

       // uploader.removeFile($(this).parents().find('.img-item').attr('id'),true);

    });





    var roomNumber =1;
    var bedNumber = 1;




    $.fn.glhcityChooser = function(e)
    {
       var provinceList = [];
       var cityList =[];

        // ajax 获取省份城市数据
        $.ajax({
            type: 'POST',
            url: '/ajax/loadCityProvince',
            data: {},
            dataType: 'json',
            async:false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function(data)
            {
               if(data.cities !== null && data.provinces !== null)
               {
                    cityList = data.cities;
                    provinceList = data.provinces;

               }
            },
            error: function(xhr, type){
                alert('Ajax error!')
            }

        });


        var obj = $(this);
        var $container = setupContainer();
        obj.readOnly=true;
        var offset = obj.offset();
        var height = obj.height();
        var width = obj.width();
        var cont_top = offset.top + height;
        var cont_left = offset.left;
        var selectedPrivince='';
        $container.appendTo($("body")).css({
            'top': cont_top + 5,
            'left': cont_left,
            'width':400,
//            'color': 'rgba(6, 148, 204, 0.98)',
            'color': 'black',
            'position':'absolute',
            'display':'none',
            'background':' white',
            'border':'1px solid grey'
        });


        $(this).focus(function(){

            if($container.css('display') === 'none')//
            {
                $container.fadeIn();
            }

        });

//        $(this).blur(function(){
//            $container.hide();
//        })

        function setupContainer(){



            var container = document.createElement("div");
            var caption = document.createElement("div");
            var province = document.createElement("div");
            var city = document.createElement("div");

            var $container = $(container).attr("id", "container");
            var $caption = $(caption).attr("id", "caption");
            var $province = $(province).attr("id", "provinceSection");
            var $city = $(city).attr("id", "citySection");
            $container.append($caption).append($province).append($city);
            $province.addClass("province-section");
            $city.addClass("city-section");
            for(var i=0; i<provinceList.length; i++)
            {
                $("<span class=\"province\" id=\"province_"+provinceList[i]['id'] +"\">"+ provinceList[i]['name']+"</span>").appendTo($province);
            }
            $("<hr/>").appendTo($province);

//            $("<h1>选择城市</h1>").appendTo($caption);

//            $("<span>关闭</span>").appendTo($caption).click(function(){
//                $container.slideUp(100);
//            });
            return $container;
        }

        $('.province').click(function(){

            var citysection =  $('#citySection');
            citysection.empty();
            citysection.hide();


            var provinceId = $(this).attr('id').split('_')[1];
            selectedPrivince = $(this).text();

            for(var i=0; i<cityList.length; i++)
            {

                if(parseInt(provinceId) === parseInt(cityList[i]['province_id']))
                {

                    $("<span class=\"city\" id=\"city_"+cityList[i]['id']+"_"+provinceId+"\">"+ $.trim(cityList[i]['name'])+"</span>").appendTo(citysection);
                }
            }

            citysection.slideToggle();
        });

        $(document).on('click','.city',function(){

            $('#cityId').val($(this).attr('id').split('_')[1]);
            $('#provinceId').val($(this).attr('id').split('_')[2]);
            obj.val(selectedPrivince + " | " +$(this).text());
            $container.fadeOut(200);
        });


    }


    $('#provinceCity').glhcityChooser();

    $(document).on('click','.add-more-bed',function(){



        var preId=$(this).siblings('.bed-line-detail').find('.bed:last').find('select').attr('name');
        var bedId = (parseInt(preId.split('_')[2])+1);
        $(this).siblings('.bed-line-detail').find('.bed-count').val(bedId);
        var newBedId=parseInt(preId.split('_')[1])+'_'+bedId;

        var newBed =  "<div class=\"bed\">" +
        "<label></label>" +
        "<select name=\"bedType_" +newBedId +"\">" +
        "<option value =\"床形\">床形</option>" +
        "<option value =\"双人床\">双人床</option>" +
        "<option value =\"单人床\">单人床</option>" +
        "</select>" +

        "<div class=\"input-with-text\">" +
        "<input type=\"text\" placeholder=\"长度\" name=\"bedLength_" +newBedId +"\">" +
        "<span>米</span>" +
        "</div>" +
        "<div class=\"input-with-text\">" +
        "<input type=\"text\" placeholder=\"宽度\" name=\"bedWidth_" +newBedId +"\">" +
        "<span>米</span>" +
        "</div>" +
        "<div class=\"input-with-text\">" +
        "<input type=\"text\" placeholder=\"床数\" name=\"bedUnit_" +newBedId +"\">" +
        "<span>张</span>" +
        "</div>" +
                "<div class=\"btn-delete delete-bed\" >" +
        "<i class=\"icon-trash icon-2x\"></i>" +
        "</div>" +
        "</div>";

        $(this).siblings('.bed-line-detail').append(newBed);
    });

    $('.add-more-room').click(function(){
        bedNumber = 1;
        roomNumber += 1;

        var newBedId=  roomNumber+'_'+bedNumber;

        $('#roomCount').val(roomNumber);

        var newRoom =    "<hr/>" +
        "<div class=\"room-detail\">" +
        "<div class=\"row\">" +
        "<div class=\"col-lg-2\">" +
        "</div>" +
        "<div class=\"col-lg-8\">" +
        "<label> 房间信息</label>" +
        "<select name=\"roomType_" +roomNumber +"\">" +
        "<option value =\"房间类型\">房间类型</option>" +
        "<option value =\"标准房\">标准房</option>" +
        "<option value =\"大床房\">大床房</option>" +
        "<option value=\"迷你房\">迷你房</option>" +
        "<option value=\"套房\">套房</option>" +
                "</select>" +



        "<div class=\"input-with-text\">" +
        "<input type=\"text\" placeholder=\"房间数\" name=\"roomUnit_" +roomNumber +"\">" +
        "<span>间</span>" +
        "</div>" +
        "<div class=\"input-with-text\">" +
        "<input type=\"text\" placeholder=\"价格/晚\" name=\"roomPrice_" +roomNumber +"\">" +
        "<span>￥</span>" +
        "</div>" +
        "</div>" +
        "<div class=\"col-lg-2\">" +
        "</div>" +
        "</div>" +

        "</div>" +


        "<div class=\"bed-detail\">" +
        "<div class=\"row\">" +
        "<div class=\"col-lg-2\"></div>" +
        "<div class=\"col-lg-8 \">" +
        "<div class=\"bed-line-detail\">" +
        "<input type=\"hidden\" name=\"bedCount_" +roomNumber +"\" value=\"1\">" +
        "<div class=\"bed\">" +
        "<label> 床铺信息</label>" +
        "<select name=\"bedType_" +newBedId +"\">" +
        "<option value =\"床形\">床形</option>" +
        "<option value =\"双人床\">双人床</option>" +
        "<option value =\"单人床\">单人床</option>" +
        "</select>" +

        "<div class=\"input-with-text\">" +
        "<input type=\"text\" placeholder=\"长度\" name=\"bedLength_" +newBedId +"\">" +
        "<span>米</span>" +
        "</div>" +
        "<div class=\"input-with-text\">" +
        "<input type=\"text\" placeholder=\"宽度\" name=\"bedWidth_" +newBedId +"\">" +
        "<span>米</span>" +
        "</div>" +
        "<div class=\"input-with-text\">" +
        "<input type=\"text\" placeholder=\"床数\" name=\"bedUnit_" +newBedId +"\">" +
        "<span>张</span>" +
        "</div>" +

        "</div>" +

        "</div>" +
        "<div class=\"btn-base btn-short add-more-bed\">" +
        "<i class=\"icon-plus\"></i>&nbsp 添加床铺" +
        "</div>" +

        "</div>" +
        "<div class=\"col-lg-2\"></div>" +
        "</div>" +
        "</div>";

        $('.room-info').append(newRoom);

    });



    $(document).on('click','.delete-bed',function(){

       $(this).parent('.bed').remove();
    });


    $('.next-Step, .prev-Step,.submit-Hotel').hover(function(){
                $(this).find('span').hide();
                $(this).find('i').fadeIn(200);

            },
            function(){
                $(this).find('i').hide();
                $(this).find('span').fadeIn(200);
            }
    );

    var step1Form = $('#hotelBasicInfo');
    var step2Form = $('#hotelInfo');
    var step3From = $('#roomInfo');
    var step4Form = $('#hotelPhotos');
    $('.next-Step').click(function(){

        if(step1Form.css('display') !== 'none')
        {
            step2Form.siblings('.hotel-form').hide();
            step2Form.fadeIn(500);

            $('.next-Step').removeClass('nextStep-mid').addClass('nextStep-right');
            $('.prev-Step').fadeIn(500);

        }
        else if(step2Form.css('display') !== 'none')
        {
            step3From.siblings('.hotel-form').hide();
            step3From.fadeIn(500);
        }
        else if(step3From.css('display') !== 'none')
        {
            step4Form.siblings('.hotel-form').hide();
            step4Form.fadeIn(500);
            $('.submit-Hotel').show();
            $('.next-Step').hide();
        }

    })

    $('.prev-Step').click(function(){

        if(step2Form.css('display') !== 'none')
        {
            step1Form.siblings('.hotel-form').hide();
            step1Form.fadeIn(500);

            $('.next-Step').removeClass('nextStep-right').addClass('nextStep-mid ');
            $('.prev-Step').hide();

        }
        else if(step3From.css('display') !== 'none')
        {
            step2Form.siblings('.hotel-form').hide();
            step2Form.fadeIn(500);

        }
        else if(step4Form.css('display') !== 'none')
        {
            step3From.siblings('.hotel-form').hide();
            step3From.fadeIn(500);
            $('.next-Step').show();
            $('.submit-Hotel').hide();

        }
    })

    $('.submit-Hotel').click(function(){
        var selectedFac = '';
        $("input[name='facilityCheck']:checked").each(function(){
            selectedFac += $(this).val()+' ';

        })
        $('#selectedFac').val(selectedFac);
        $("#newHotelForm").submit();
    })

</script>
@stop
