@extends('website')

@section('content')
    <form action = "/auth/login" method ="post" >
    <div class="container">
        <div class="login-panel">
            <div class="login-left-panel">
                <h4>帐号登录</h4>
                <hr/>

                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="login-input-section input-with-icon">
                    <span>用户名</span><br/>
                    <input type="text"   placeholder="账号/用户名/手机" name="username" />
                    <span ><i class="icon-user icon-large icon"></i></span>
                </div></br>
                <div class="login-input-section input-with-icon">
                    <span>密码</span><br/>
                    <input type="password"   placeholder="密码" name="password"/>
                    <span ><i class="icon-key icon-large icon"></i></span>
                </div></br>
                <div>
                    <div class="checkbox remember-password" >
                        <label>
                            <input type="checkbox" value=""> 记住密码( 14天有效 )

                        </label>

                    </div>
                    <div class="forget-password">
                        <span><a href="/">忘记密码</a></span>
                    </div>
                </div>

                <div class="login-btn-section" >
                    <button class="btn-base btn-reg left ">登陆
                    </button>
                    <div class="btn-base btn-reg right">注册
                    </div>
                </div>
            </div>
            <div class="login-right-panel">
                <img src="../img/company/login.jpg">
            </div>
        </div>
    </div>
    </form>
        {{--<div class="col-md-4 col-md-offset-4">--}}

            {{--<form action = "/auth/login" method ="post" >--}}
                {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                {{--<div class="form-group">--}}
                    {{--<label>Email</label>--}}
                    {{--<input type="text" name="email" class="form-control"  placeholder="Email"/>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                    {{--<label>Password</label>--}}
                    {{--<input type="password" name="password" class="form-control"  placeholder="password"/>--}}
                {{--</div>--}}

                {{--<select class="form-control form-group">--}}
                    {{--<option>1</option>--}}
                    {{--<option>2</option>--}}
                    {{--<option>3</option>--}}
                    {{--<option>4</option>--}}
                    {{--<option>5</option>--}}
                {{--</select>--}}

                {{--<div class="form-group">--}}
                    {{--<p><input type="submit" value="提交" class="btn btn-primary form-control"></p>--}}
                {{--</div >--}}

        {{--</div>--}}

@stop
