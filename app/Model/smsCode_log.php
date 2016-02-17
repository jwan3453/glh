<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class smsCode_log extends Model
{
    //
    protected $table = 'smsCode_logs';


    protected $fillable = ['smsCode', 'mobile', 'type','detail','status'];
}
