<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Hotel_master extends Model
{
    //
    protected $table = 'hotel_master';


    protected $fillable = ['name','province_id','city_id','address','contact_no','email','post_code',
                           'website','PMS','room_unit','airport','hotel_cat_id','hotel_type_ids',
                            'short_desc','product_feature'];

}
