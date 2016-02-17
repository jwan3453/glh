<?php

namespace App\Library;

use Qiniu\Auth as QiniuAuth;

class Common
{
    public static function getQiniuToken()
    {
        $accessKey = 'aavEmxVT7o3vsFMGKUZbJ1udnoAbucqXPmk3tdRX';
        $secretKey = 'nDQPr1L7pcurdV8_7iLIICNjSME2EmCiokHXTGTX';


        $auth = new QiniuAuth($accessKey, $secretKey);

        $bucket = 'opulent-hotel-image';

        $token = $auth->uploadToken($bucket);
        return $token;
    }

    public static function getTimeStamp(){


        list($usec, $sec) = explode(" ", microtime());
        $format = '{yyyy}{mm}{dd}{time}';
        $t = (string)(((float)$usec + (float)$sec) * 10000);
        $d = explode('-', date("Y-m-d-H-i-s"));
        $format = str_replace("{yyyy}", $d[0], $format);
        $format = str_replace("{yy}", $d[1], $format);
        $format = str_replace("{mm}", $d[2], $format);
        $format = str_replace("{dd}", $d[3], $format);
        $format = str_replace("{time}", $t, $format);
        return $format;

    }

}