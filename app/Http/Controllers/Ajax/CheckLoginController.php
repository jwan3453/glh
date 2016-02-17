<?php namespace App\Http\Controllers\Ajax;

use App\Http\Requests;
use App\Http\Controllers\Controller;



use Illuminate\Http\Request;
use Illuminate\Http\Response;


use App\User;
use App\Model\smsCode_log;



use Redirect, Input, Auth, Log, Session;



class CheckLoginController extends Controller {

    public function checkLoginName(Request $request)
    {

        $status = 0;

        $loginName = trim($request->input('loginName'));


        //检查用户名 只能由字母和数据组成

        if (!preg_match('/^[a-z|0-9]{3,20}$/', $loginName)) {
            //用户名包含飞字母数据下划线的字符
            $status = 1;
        } else {
            //检查用户名是否已经存在
            $userCount = User::where('username', $loginName)->count();
            if ($userCount > 0) {
                //数据库有相同的用户名
                $status = 2;
            }
        }


        return response()->json(array(
            'status' => $status
        ));
    }


    public function checkMobile(Request $request)
    {

        $status = 0;

        $mobile= trim($request->input('mobile'));

        //检查手机号

        if (!preg_match('/^1[0-9]{1}[0-9]{9}$/', $mobile)) {
            //手机号11位数字组成
            $status = 1;
        }
//          else {
//            //检查用户名是否已经存在
//            $userCount = User::where('username', $loginName)->count();
//            if ($userCount > 0) {
//                //数据库有相同的用户名
//                $status = 2;
//            }
//        }


        return response()->json(array(
            'status' => $status
        ));
    }

    public function checkEmail(Request $request)
    {

        $status = 0;

        $email = trim($request->input('email'));

        //检查手机号

        if (!preg_match('/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i', $email)) {
            //检查是否为正确的email 格式
            $status = 1;
        }
//          else {
//            //检查用户名是否已经存在
//            $userCount = User::where('username', $loginName)->count();
//            if ($userCount > 0) {
//                //数据库有相同的用户名
//                $status = 2;
//            }
//        }


        return response()->json(array(
            'status' => $status
        ));
    }


    public function checkPassword(Request $request)
    {

        $status = 0;

        $email = trim($request->input('password'));

        //检查手机号

        if (!preg_match('/^[a-zA-Z\d_]{6,20}$/', $email)) {
            //检查是否为正确的email 格式
            $status = 1;
        }
//          else {
//            //检查用户名是否已经存在
//            $userCount = User::where('username', $loginName)->count();
//            if ($userCount > 0) {
//                //数据库有相同的用户名
//                $status = 2;
//            }
//        }


        return response()->json(array(
            'status' => $status
        ));
    }

    public function send($ch,$data){
        curl_setopt ($ch, CURLOPT_URL, 'https://sms.yunpian.com/v1/sms/send.json');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        return curl_exec($ch);
    }

    public function generateRandomCode()
    {

        return rand(1000,9999);
    }


    public function setSession(Request $request, $smsCode,$mobile,$Code,$expireIn){
        //释放之前设置的session

        if($request->session()->has($smsCode)){
//            $smsCode = $request->session()->get($name);
//            if(isset($smsCode['lifetime']) && (int)($smsCode['lifetime'])<= time())
//            {
//
//            }
            $request->session()->forget($smsCode);
        }

        //添加session 验证码，手机号 有效时间,
        $request->session()->push($smsCode.'.key', $Code);
        $request->session()->push($smsCode.'.mobile', $mobile);
        $request->session()->push($smsCode.'.lifetime', time()+($expireIn));

        $request->session()->save();

    }

    public function testsession(Request $request)
    {
        $this->setSession($request,'smsCode','18250863109','1234',50);
    }
    public function getsession(Request $request)
    {
        $site =   $request->session()->all();

        dd($site);
    }

    public function sendSmsCode(Request $request)
    {

        header("Content-Type:text/html;charset=utf-8");
        $apikey = "d3d2b29b01eba479071badf0eb081303";
        $text="【璞伦精品酒店】感谢您注册璞伦网，您的验证码是#code#。如非本人操作，请忽略本短信";
        $error_msg='';
        $mobile = $request->input('mobile');
        $ch = curl_init();
        /* 设置验证方式 */

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:text/plain;charset=utf-8', 'Content-Type:application/x-www-form-urlencoded','charset=utf-8'));

        /* 设置返回结果为流 */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        /* 设置超时时间*/
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        /* 设置通信方式 */
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


        //生成4位验证码
        $code = $this->generateRandomCode();
        $text = str_replace("#code#",$code,$text);

        $data=array('text'=>$text,'apikey'=>$apikey,'mobile'=>$mobile);



        $json_data = $this->send($ch,$data);
        $array = json_decode($json_data,true);
        if($array['code'] != '0')
        {

            $error_msg =$array['detail'];
            //
        }
        else
        {
            //设置session,有效时间为20 分钟
            $this->setSession($request,'smsCode',$mobile,$code,20);
        }
        //todo 把获取短信验证码的结果写入数据
        $smsCodeDetail = [
            'smsCode' =>$code,
            'mobile' =>$mobile,
            'type' => 'register',
            'detail' => $array['detail'],
            'status' => $array['code']
        ];
        smsCode_log::create($smsCodeDetail);


        return response()->json(array(
            'status' => $array['code']
        ));
    }

    public function checkSmsCode(Request $request)
    {
        $status =0;
        $smsCode = trim($request->input('smsCode'));
        $mobile = trim($request->input('mobile'));

        try{
            if($request->session()->has('smsCode')){
                $smsCodeSession = $request->session()->get('smsCode');
                if( (int)($smsCodeSession['lifetime'][0]) <time())
                {

                    if($smsCodeSession['key'][0] == $smsCode && $smsCodeSession['mobile'][0]==$mobile)
                    {
                        $status =0;
                    }
                    //如果用户输入的code 和mobile 跟session的code，mobile 不一样
                    else
                        $status =2;
                }
                //session 失效
                else
                    $status =3;

            }
            //如果session 不存在
            else
            {
                $status=1;
            }

        }
        catch(Exception  $e)
        {

        }

        return response()->json(array(
            'status' => $status,

        ));
    }




}