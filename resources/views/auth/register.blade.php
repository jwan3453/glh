
@extends('website')



@section('content')

    {{--<div class="col-md-4 col-md-offset-4">--}}

        {{--<form action = "/auth/register" method ="post">--}}
            {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}

            {{--<div class="form-group">--}}
                {{--<label>user name</label>--}}
                {{--<input type="text" name="username" />--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--<label>Email</label>--}}
                {{--<input type="text" name="email" />--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--<label>Password</label>--}}
                {{--<input type="password" name="password" class="form-control"/>--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--<label>Password confirmation</label>--}}
                {{--<input type="password" name="password_confirmation" class="form-control"/>--}}
            {{--</div>--}}

            {{--<div class="form-group"><input type="submit" value="注册" class="btn btn-primary form-control"></div>--}}
        {{--</form>--}}
    {{--</div>--}}
    <form action = "/auth/register" method ="post" >
        <div class="container">
            <div class="register-panel">
                <div class="register-left-panel">
                    <h3 style="text-align: center">用户注册</h3>
                    <hr/>

                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="register-input-section input-with-icon"  >
                        <span>用户名</span><br/>
                        <div class="input-icons"  >
                            <input type="text" name="username" id="userName"/>
                            {{--<span ><i class="icon-user icon"></i></span>--}}
                            <span class="field-pass" ><i class="icon-ok  "></i></span>

                        </div>
                        <div class="register-error" id="invalidUserName"><span>用户名必须是数字和字母,长度3-20字符</span></div>
                        <div class="register-error" id="dupliateUserName"><span>此用户名已经被注册</span></div>
                        <div class="register-error empty" ><span>用户名不能为空</span></div>
                    </div></br>

                    <div class="register-input-section input-with-icon">
                        <span>手机号</span><br/>
                        <div  class="input-icons" >
                            <input type="text" name="mobile" id="mobile"/>
                            {{--<span ><i class="icon-envelope icon"></i></span>--}}
                            <span class="field-pass"><i class="icon-ok  "></i></span>
                        </div>
                        <div class="register-error" id="invalidTelNumber"><span>请输入正确的手机号码</span></div>
                        <div class="register-error empty" ><span>手机号码不能为空</span></div>
                    </div></br>
                    <div class="register-input-section input-with-icon">
                        <span>邮箱</span><br/>
                        <div  class="input-icons" >
                            <input type="text" name="email" id="email"/>
                            {{--<span ><i class="icon-mobile-phone icon-large icon"></i></span>--}}
                            <span class="field-pass"><i class="icon-ok  "></i></span>
                        </div>
                        <div class="register-error" id="invalidEmailAddr"><span>请输入正确的邮箱</span></div>
                        <div class="register-error empty" ><span>邮箱地址不能为空</span></div>
                    </div></br>
                    <div class="register-input-section input-with-icon">
                        <span>密码</span><br/>
                        <div  class="input-icons" >
                            <input type="password"   name="password"  id="password"/>
                            {{--<span class="password-strength">强</span>--}}
                            <span class="field-pass " ><i class="icon-ok "></i></span>
                        </div>
                        <div class="register-error  " id="invalidPassword"><span>密码必须为长度6-20,有数字和字母组成</span></div>
                        <div class="register-error empty" ><span>密码不能为空</span></div>
                    </div></br>
                    <div class="register-input-section input-with-icon">
                        <span>重复密码</span><br/>
                        <div  class="input-icons">
                            <input type="password"   name="passwordConfirmation" id="passwordConfirmation"/>

                            <span class="field-pass"><i class="icon-ok  "></i></span>
                        </div>
                        <div class="register-error" id="invalidPasswordConfirm"> <span>密码不一致</span></div>
                    </div></br>

                    <div class="register-input-code-section ">

                        <input type="text" class="left " id="smsCode"/>
                        <div class="btn-base btn-reg left " id="authCode" style="margin-left:20px;">发送验证码
                        </div>
                        <div class="register-error " id="invalidSmsCode"><span>手机验证码错误</span></div>
                    </div>


                    <div class="checkbox " style="clear:both" >
                        <label>
                            <input type="checkbox" value=""> 同意蹼轮《服务协议》

                        </label>

                    </div>

                    <div class="register-btn-section"  id="submit">
                        <button class="btn-base btn-long">注册
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>

    <script type="text/javascript">

        //用户名检查
        $('#userName').change(function() {
            $.ajax({
                type: 'POST',
                url: '/ajax/checkLoginName',
                data: { loginName : $.trim($(this).val())},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function(data)
                {
                    var status = data.status;

                    if(status === 1)
                    {
                        $('#invalidUserName').fadeIn();
                        $('#invalidUserName').siblings('.register-error').hide();
                        $('#invalidUserName').siblings('.input-icons').find('.field-pass').hide();
                    }
                    else if(status === 2)
                    {
                        $('#dupliateUserName').fadeIn();
                        $('#dupliateUserName').siblings('.register-error').hide();
                        $('#dupliateUserName').siblings('.input-icons').find('.field-pass').hide();
                    }
                    else{
                        $('#userName').siblings('.field-pass').fadeIn(300);
                        $('#userName').parent().siblings('.register-error').hide();

                    }
                },
                error: function(xhr, type){
                    alert('Ajax error!')
                }

            });

        });

        //手机号码检查
        function checkMobile()
        {
            var status = 0;
            $.ajax({
                type: 'POST',
                async : false,
                url: '/ajax/checkMobile',
                data: { mobile : $.trim($('#mobile').val())},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function(data)
                {
                     status = data.status;

                    if(status === 1)
                    {
                        $('#invalidTelNumber').fadeIn();
                        $('#invalidTelNumber').siblings('.register-error').hide();
                        $('#invalidTelNumber').siblings('.input-icons').find('.field-pass').hide();


                    }
//                    else if(status === 2)
//                    {
//                        $('#dupliateUserName').fadeIn();
//                        $('#dupliateUserName').siblings('.register-error').hide();
//                        $('#dupliateUserName').siblings('.input-icons').find('.field-pass').hide();
//                    }
                    else{
                        $('#mobile').siblings('.field-pass').fadeIn(300);
                        $('#mobile').parent().siblings('.register-error').hide();

                    }
                },
                error: function(xhr, type){
                    alert('Ajax error!')
                }

            });
            return status;
        }

        $('#mobile').change(function() {

            checkMobile();
        });

        //邮箱检查
        $('#email').change(function() {

            $.ajax({
                type: 'POST',
                url: '/ajax/checkEmail',
                data: { email : $.trim($(this).val())},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function(data)
                {
                    var status = data.status;

                    if(status === 1)
                    {
                        $('#invalidEmailAddr').fadeIn();
                        $('#invalidEmailAddr').siblings('.register-error').hide();
                        $('#invalidEmailAddr').siblings('.input-icons').find('.field-pass').hide();
                    }
//                    else if(status === 2)
//                    {
//                        $('#dupliateUserName').fadeIn();
//                        $('#dupliateUserName').siblings('.register-error').hide();
//                        $('#dupliateUserName').siblings('.input-icons').find('.field-pass').hide();
//                    }
                    else{
                        $('#email').siblings('.field-pass').fadeIn(300);
                        $('#email').parent().siblings('.register-error').hide();

                    }
                },
                error: function(xhr, type){
                    alert('Ajax error!')
                }

            });

        });

        //密码检查
        $('#password').change(function() {


            $.ajax({
                type: 'POST',
                url: '/ajax/checkPassword',
                data: { password : $.trim($(this).val())},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function(data)
                {

                    var status = data.status;

                    if(status === 1)
                    {
                        $('#invalidPassword').fadeIn();

                        $('#invalidPassword').siblings('.register-error').hide();
                        $('#invalidPassword').siblings('.input-icons').find('.field-pass').hide();
                    }
//                    else if(status === 2)
//                    {
//                        $('#dupliateUserName').fadeIn();
//                        $('#dupliateUserName').siblings('.register-error').hide();
//                        $('#dupliateUserName').siblings('.input-icons').find('.field-pass').hide();
//                    }
                    else{
                        $('#password').siblings('.field-pass').fadeIn(300);
                        $('#password').parent().siblings('.register-error').hide();

                    }
                },
                error: function(xhr, type){
                    alert('Ajax error!')
                }

            });

        });

        //密码确认检查
        $('#passwordConfirmation').change(function() {

            if($.trim($('#password').val()) !==$.trim($('#passwordConfirmation').val()) )
            {

                $('#passwordConfirmation').parent().siblings('.register-error').fadeIn();
                $('#passwordConfirmation').siblings('.field-pass').hide();
            }
            else {
                $('#passwordConfirmation').siblings('.field-pass').fadeIn(300);
                $('#passwordConfirmation').parent().siblings('.register-error').hide();
            }
        });





        var countdown=60;//倒计时60秒
        function settime(obj) {

            if (countdown == 0) {

                obj.removeClass('code-send');
                obj.text("再次发送");
                countdown = 60;
                return;
            } else {

                obj.text(countdown+'秒后,可重新发送' );
                countdown--;
            }
            setTimeout(function() {
                        settime(obj) }
                    ,1000)
        }

        //发送验证码
        $('#authCode').click(function(){

            if(countdown !== 60)
                return;

            var mobileStatus = checkMobile();


            if(mobileStatus===1 ||  $('#mobile').val() == '')
                {
                    $('#invalidTelNumber').fadeOut().fadeIn();
                    $(this).attr('disabled', 'disabled');
                }
                else{
                    //发送短信
                    $.ajax({
                        type: 'POST',
                        async:false,
                        url: '/ajax/sendSmsCode',
                        data: { mobile : $.trim($('#mobile').val())},
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        success: function(data)
                        {
                            alert(data.status);
                            if(data.status ==='0')
                            {
                                $(this).addClass('code-send');
                                settime($(this));
                            }
                            else
                            {
                                //todo 判断发送验证码失败的原因 第三方
                            }

                        },
                        error: function(xhr, type){
                            alert('Ajax error!')
                        }

                    });


                }

        })


        $('#submit').click(function (){

                $valid = true;


                //检查表单输是否为空
                if($.trim($('#userName').val()) ==='')
                {
                    $('#userName').parent().siblings('.empty').fadeIn();
                    $valid=false;
                }
                if($.trim($('#mobile').val()) ==='')
                {
                    $('#mobile').parent().siblings('.empty').fadeIn();
                    $valid=false;
                }
                if($.trim($('#email').val()) ==='')
                {
                    $('#email').parent().siblings('.empty').fadeIn();
                    $valid=false;
                }
                if($.trim($('#password').val()) ==='')
                {
                    $('#password').parent().siblings('.empty').fadeIn();
                    $valid=false;
                }
                if($.trim($('#password').val()) !== $.trim($('#passwordConfirmation').val()))
                {
                    $('#invalidPasswordConfirm').fadeIn();
                    $valid=false;
                }
            $('.register-error').each(function(){
                if($(this).css('display')!=='none')
                {
                    $(this).fadeOut().fadeIn();
                    $valid = false;
                    return false;
                }

            });
            alert($valid);
        检查用户输入验证码与手机号是否正确
       $.ajax({
                type: 'POST',
                async : false,
                url: '/ajax/checkSmsCode',
                data: { smsCode : $.trim($('#smsCode').val()),
                        mobile:$.trim($('#mobile').val())},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function(data)
                {
                    var status = data.status;
                    alert(status);
                    if(status === 2)
                    {
                        $('#invalidSmsCode').fadeIn();
                    }
                    else if(status === 3 || status===1)
                    {
                        alert('验证码已经失效,请重新获取 '+ status );
                    }
                    else{
                        //$('#password').siblings('.field-pass').fadeIn(300);
                        $('#invalidSmsCode').hide();
                    }
                    if(status!==0)
                        $valid = false;
                },
                error: function(xhr, type){
                    alert('Ajax error!')
                }


            });

                return $valid;

        })
    </script>
@stop
