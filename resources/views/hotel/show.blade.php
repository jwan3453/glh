@extends('website')


@section('resources')
    <link  href="{{ asset('/css/glide.core.css') }}" rel="stylesheet">
    <link  href="{{ asset('/css/glide.theme.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/glide.js') }}"></script>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=tf76lnKHmfgGBpiX1MRpdxcd"></script>
@stop

@section('content')

    <div id="hotel-photo" class="glide" >

        <div class="glide__arrows"  >
            <span class="glide__arrow prev" data-glide-dir="<"><i class="icon-angle-left icon-4x"></i></span>
            <span class="glide__arrow next" data-glide-dir=">"><i class="icon-angle-right icon-4x"></i></span>
        </div>

        <div class="glide__wrapper home-bg-imgs"  >
            <div class="glide__track">
                @foreach($hotel['hotelPhoto'] as $photo)
                <div class="glide__slide">
                    <div class="box" ><img src="{{$photo}}" ></div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="glide__bullets"  ></div>

    </div>

    <div class="container">
        <div class="s-hotel-header">
            <h2>{{$hotel['hotelInfo']->name}}</h2>
            <h5><i class="icon-map-marker icon-large"></i> {{$hotel['hotelInfo']->address}}</h5>
        </div>

        <div class="price-section">

        </div>


        <div class="facility info-section">

            <div class="header">酒店设施</div>
            @foreach ($hotel['hotelFacilities'] as $facility)

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

        <div class="row map-section info-section " >
            <div class="header">位置信息</div>
            <div class="col-md-6">

                <div id="allmap"></div>
            </div>
            <div class="col-md-6">
                <div class="map-poi">
                    <div class="tabbable  tabs-right"> <!-- Only required for left/right tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">附近景点</a></li>
                            <li><a href="#tab2" data-toggle="tab">附近酒店</a></li>
                            <li><a href="#tab3" data-toggle="tab">附近酒店</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active poi-section" id="tab1" >

                                <ul class="poi-list">
                                    <li><i class="icon-camera"></i> 豪客来(集美乐海百货店)</li>
                                    <li><i class="icon-camera"></i> 厦门天竺山旅游景区</li>
                                    <li><i class="icon-camera"></i> 嘻哆哆儿童乐园</li>
                                    <li><i class="icon-camera"></i> 青龙寨钱币博物馆</li>
                                    <li><i class="icon-camera"></i> 三榕公园</li>
                                    <li><i class="icon-camera"></i> 深青泽深宫</li>
                                    <li><i class="icon-camera"></i> 天竺山真寂寺</li>
                                    <li><i class="icon-camera"></i> 东孚城市规划展示馆</li>
                                </ul>
                            </div>
                            <div class="tab-pane poi-section" id="tab2">
                                <ul class="poi-list">
                                    <li><i class="icon-food"></i> 天竺山森林公园</li>
                                    <li><i class="icon-food"></i> 天竺山森林公园</li>
                                    <li><i class="icon-food"></i> 天竺山森林公园</li>
                                    <li><i class="icon-food"></i> 天竺山森林公园</li>
                                    <li><i class="icon-food"></i> 天竺山森林公园</li>
                                    <li><i class="icon-food"></i> 天竺山森林公园</li>
                                    <li><i class="icon-food"></i> 天竺山森林公园</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <br/><br/>
    </div>






@stop



@section('script')


    <script type="text/javascript">
        $("input[name='facilityCheck']").attr("checked","checked").attr('disabled','disabled');

        $("#hotel-photo").glide({
            type: "carousel",
            autoplay: 3000,
            paddings:500,
            centered:true
        });

        $('#allmap').css('height','400px');

        var map = new BMap.Map("allmap");            // 创建Map实例
        map.centerAndZoom("{{$hotel['city']}}",20);
        map.enableScrollWheelZoom();   //启用滚轮放大缩小，默认禁用
        map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用

    </script>
@stop