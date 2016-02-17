@extends('website')








@section('content')
    <p></p>

    <div class="container">


        <ul class="nav nav-pills stacked " role="tablist">
            <li role="presentation" class="active">
                <a href="#team" aria-controls="home" role="tab" data-toggle="pill"  >
                    <div  class="nav-tab-style">
                        <i class=" icon-user icon-2x"></i> &nbsp&nbsp 团队介绍
                    </div>
                </a>
            </li>
            <li role="presentation">
                <a href="#aboutCompany" aria-controls="profile" role="tab" data-toggle="pill"  >
                    <div  class="nav-tab-style">
                    <i class="  icon-lightbulb icon-2x"></i> &nbsp&nbsp 关于公司
                    </div>
                </a>

            </li>
            <li role="presentation">
                <a href="#contactUs" aria-controls="messages" role="tab" data-toggle="pill" >
                    <div  class="nav-tab-style">
                    <i class=" icon-mobile-phone icon-2x"></i> &nbsp&nbsp 联系方式
                    </div>
                </a>

            </li>
            <li role="presentation">
                <a href="#joinUs" aria-controls="settings" role="tab" data-toggle="pill">
                    <div  class="nav-tab-style">
                    <i class=" icon-group icon-2x"></i> &nbsp&nbsp  加入我们
                    </div>
                </a>

            </li>
        </ul>

        <!-- Tab panes -->
        <br/><br/>
        <div class="tab-content" >
            <div role="tabpanel" class="tab-pane fade in active" id="team">
                <br>

                <div class="row co-founder-selected" style="height:250px">
                    <div class="col-md-4 thumb-cover">
                         <div class=" thumb thumb-border" >
                             <img src="../img/cofounder/ming.png" alt="..." class="img-circle thumb-border-style-off" height="240px" width="240px" >
                         </div>
                    </div>
                    <div class="col-md-4 people-title" >
                        <h4>傅玉明</h4>
                        <p>CEO</p>
                        <p>Opulent Trip 创始人,在酒店行业超过10年的工作经验，体验过全国95%以上的精品酒店,由心热爱酒店行业</p>
                        <br/>
                        <p><i class="icon-tags icon-large"></i> @leader ship , @酒店管理, @团队管理</p>
                    </div>

                </div>

                <div class="row co-founder-selected" style="height:250px">
                    <div class="col-md-5 col-md-offset-3 people-title" >
                        <h4>陈清红</h4>
                        <p>CEO</p>
                        <p>Opulent Trip 首席运营官,在酒店行业超过10年的工作经验，体验过全国95%以上的精品酒店,由心热爱酒店行业</p>
                        <br/>
                        <p><i class="icon-tags icon-large"></i> @公司运维 , @媒体关系, @hr</p>
                    </div>
                    <div class="col-md-4 thumb-cover">
                        <div class=" thumb thumb-border" >
                            <img src="../img/cofounder/hong.png" alt="..." class="img-circle thumb-border-style-off" height="240px" width="240px" >
                        </div>
                    </div>


                </div>
                <div class="row co-founder-selected" style="height:250px">
                    <div class="col-md-4 thumb-cover">
                        <div class=" thumb thumb-border" >
                            <img src="../img/cofounder/jie.png" alt="..." class="img-circle thumb-border-style-off" height="240px" width="240px" >
                        </div>
                    </div>
                    <div class="col-md-4 people-title" >
                        <h4>王杰文</h4>
                        <p>CEO</p>
                        <p>Opulent Trip 首席运营官,在酒店行业超过10年的工作经验，体验过全国95%以上的精品酒店,由心热爱酒店行业</p>
                        <br/>
                        <p><i class="icon-tags icon-large"></i> @技术 , @码农, @php javascript laravel ,@网站我写的,想写什么写什么</p>
                    </div>

                </div>




            </div>
            <div role="tabpanel" class="tab-pane fade " id="aboutCompany">...</div>
            <div role="tabpanel" class="tab-pane fade " id="contactUs">...</div>
            <div role="tabpanel" class="tab-pane fade " id="joinUs">...</div>
        </div>







    </div>


    <script type="text/JavaScript">
        $(document).ready(function (){
            var img;
            $('[data-toggle="popover"]').popover();
            $('.thumb').mouseover(function(){
                img =  $(this).find('img').attr('src');

                $(this).find('img').addClass('thumb-border-style-on').attr('src','../img/cofounder/test.gif');
                $(this).find('img').removeClass('thumb-border-style-off');
            });
            $('.thumb').mouseout(function(){
                $(this).find('img').removeClass('thumb-border-style-on').attr('src',img);
                $(this).find('img').addClass('thumb-border-style-off');

            });
            $('.co-founder').mouseover(function(){
                $(this).addClass('co-founder-selected');
            });
            $('.co-founder').mouseout(function(){
                $(this).removeClass('co-founder-selected');

            });

            $('#infoTab a:first').tab('show');

            $('.thumb').click(function(){


            });
        })
    </script>



@stop