<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link  href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link  href="{{ asset('/bootstrap/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/bootstrap/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link  href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <script  src="{{ asset('/bootstrap/js/jquery-2.1.4.min.js') }}" ></script>
    <script   src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
    <script  src="{{ asset('/bootstrap/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('/bootstrap/js/bootstrap-datetimepicker.zh-CN.js') }}"></script>
    @yield('resources')


</head>

<body>

<div class="wrapper">

    {{--<div id="header">--}}
        {{--<div class="logo-header">--}}
            {{--<div class="container ">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-6  header-height">--}}
                        {{--<div class="logo"></div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-6  header-height"  >--}}
                        {{--<div class=" login-section">--}}
                            {{--<div>--}}
                                {{--<!-- <button type="button" class="btn btn-info">登录</button>--}}
                                 {{--<button type="button" class="btn btn-info">注册</button> -->--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                {{--</div >--}}

                {{--<div class="nav-header">--}}
                {{--<div class="container">--}}
                {{--<div class="row" >--}}
                {{--<a href="/">--}}
                {{--<div class="col-md-2 nav-selected ">--}}
                {{--首页--}}
                {{--</div>--}}
                {{--</a> <a href="#">--}}
                {{--<div class="col-md-2 nav-selected "  >--}}
                {{--目的地--}}
                {{--</div></a>--}}
                {{--<a href="#">--}}
                {{--<div class="col-md-2 nav-selected "  >--}}
                {{--预定旅程--}}
                {{--</div>--}}
                {{--</a>--}}
                {{--<a href="#">--}}
                {{--<div class="col-md-2 nav-selected "  >--}}
                {{--折扣</a>--}}
                {{--</div>--}}
                {{--</a>--}}
                {{--<a href="#">--}}
                {{--<div class="col-md-2 nav-selected "  >--}}
                {{--杂志--}}
                {{--</div>--}}
                {{--</a>--}}
                {{--<a href="/about">--}}
                {{--<div class="col-md-2 nav-selected "  >--}}
                {{--关于--}}
                {{--</div>--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--</div>--}}




            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}





    <div class="header-section  hidden-xs ">
        <div class="container">
            <div class="login-section base-font-large ">
                <span><a class="anchor-white" href="{{ url('/auth/login') }}">登录</a></span> | <span><a  class="anchor-white" href="{{ url('/auth/register') }}">注册</a></span>

            </div>
        </div>
    </div>



    <!--  <src img="../img/company/background.jpg" class="home_bg" width="100%"/> -->

    <div class="page clearfix">
        @yield('content')
    </div>
    <div class="clear"><!-- 必不可少的 --></div>



</div>
<div class="footer-section container-fluid base-font">
    <br/>
    <div class="container">
        <div class="site-map-link">
            <a  class="anchor-white" href="{{ url('/about') }}"><span> 关于我们</span></a>
            <a  class="anchor-white" href="{{ url('/joinUs') }}"><span> 加入我们</span></a>
            <a  class="anchor-white" href="/"><span> 联系我们</span></a>
            <a  class="anchor-white" href="/"><span> 我们的故事</span></a>
            <a  class="anchor-white" href="/"><span> 关于我们</span></a>
            <a  class="anchor-white" href="{{ url('/admin/article') }}"><span> 新闻中心</span></a>
            <a  class="anchor-white" href="{{ url('admin/hotel/standardSysRec') }}"><span> 评分中心</span></a>
            <a  class="anchor-white" href="{{ url('admin/hotel/managementHotel') }}"><span> 管理酒店</span></a>
        </div>
        <p>&nbsp Copyright © 2015-2016 象型科技 glhchina.com | 营业执照 | ICP证：闽BB-BB1B30006   蹼轮酒店预订</p>


    </div>
</div>

@yield('script')

</body>

</html>

