@extends('website')

@section('resources')
    <link  href="{{ asset('/css/glide.core.css') }}" rel="stylesheet">
    <link  href="{{ asset('/css/glide.theme.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/glide.js') }}"></script>
@stop


@section('content')

    <div class="home-bg">
        <div id="homeSlide" class="glide" >

            <div class="glide__arrows"  >
                <span class="glide__arrow prev" data-glide-dir="<"><i class="icon-angle-left icon-4x"></i></span>
                <span class="glide__arrow next" data-glide-dir=">"><i class="icon-angle-right icon-4x"></i></span>
            </div>

            <div class="glide__wrapper home-bg-imgs"  >
                <div class="glide__track">
                    <div class="glide__slide">
                        <div class="box" ><img src="../img/company/1.jpg" ></div>
                    </div>
                    <div class="glide__slide">
                        <div class="box" ><img src="../img/company/2.jpg"></div>
                    </div>
                    <div class="glide__slide">
                        <div class="box" ><img src="../img/company/3.jpg" ></div>
                    </div>
                    <div class="glide__slide">
                        <div class="box" ><img src="../img/company/4.jpg" ></div>
                    </div>
                </div>
            </div>

            <div class="glide__bullets"  ></div>

        </div>
    </div>

    <div class="slogan"  >
        有一种酒店,你从未体验
        <span>Never Better For You</span>
    </div>

    <div class="search-section container hidden-xs" >
        <div class="search-input-section  " >

            <div class="input-with-icon">
                <input type="text" class="long-input" placeholder="填写城市,地点" >
                <i class="icon-camera-retro icon-large icon"></i>
            </div>
            <div class="input-with-icon">
                <input type="text" class="short-input" id="fromDate" placeholder="出发时间">
                <span ><i class="icon-calendar icon-large icon"></i></span>
            </div>
            <div class="input-with-icon">
                <input type="text" class="short-input" id="toDate" placeholder="返程时间">
                <span ><i class="icon-calendar icon-large icon"></i></span>
            </div>
            <div class="input-with-icon">
                <input type="text"  class="short-input" placeholder="需要房间数">
                <span ><i class="icon-calendar icon-large icon"></i></span>
            </div>
            <div class="home-search"><span>搜索</span><i class="icon-search icon-large"></i></div>
        </div>
    </div>
    <br/><br/><br/><br/>


@stop


@section('script')
    <script type="text/javascript">
        $('.home-search').hover(function(){
                $(this).find('span').hide();
                $(this).find('i').fadeIn();

        },
        function(){
            $(this).find('i').hide();
            $(this).find('span').fadeIn();
        }
        );

        $("#homeSlide").glide({
            type: "slideshow",
            autoplay: 3000
        });

    </script>
@stop