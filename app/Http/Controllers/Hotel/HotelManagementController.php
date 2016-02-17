<?php

namespace App\Http\Controllers\Hotel;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User, App\Model;
use DB;
use App\Library;


class HotelManagementController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facilities=[];
        $hoteFacility = Model\Hotel_Facility::all();

        for($i=0; $i<sizeof($hoteFacility);$i++)
        {

            $hotelFacilitySub =Model\Hotel_Facility_Sub::where('facility_id', '=', $hoteFacility[$i]->id)->get();

//            $pointsInfo =[ 'points' =>$points->points,'score'=>$points->score];
//
            $obj=[
                'id' => $hoteFacility[$i]->id,
                'name' => $hoteFacility[$i]->name,
                'sub' =>$hotelFacilitySub
            ];

            $facilities[] = $obj;
        }

        $token = Library\Common::getQiniuToken();

        return view('admin.hotelManagement.create',compact('token'),compact('facilities'));
    }

    public function createNewHotel(Request $request )
    {


        $roomCount = $request->input('roomCount');
        $allField = $request->all();
//        $keys = array_keys($allField);

//        foreach ($allField as $key=>$value) {
//
//            if(str_contains($key,'roomType'))
//            {
//                $roomCount = explode('_',$key)[1];
//            }
//        }


        $new_hotel = [
            'name' =>$request->input('hotelName'),
            'province' => $request->input('provinceId'),
            'city' => $request->input('cityId'),
            'address' => $request->input('addressDetail'),
            'contact_no' => $request->input('contactNo'),
            'email' => $request->input('email'),
            'post_code' => $request->input('postCode'),
            'website' => $request->input('website'),
            'PMS' => $request->input('pmsSys'),
            'room_unit' => $request->input('roomUnits'),
            'airport' => $request->input('airport'),
            'hotel_cat_id' => 1,
            'hotel_type_ids' => '1,2,3',
            'hotel_facility_list' => $request->input('selectedFac'),
            'short_desc' =>$request->input('features'),
            'product_feature' =>$request->input('features')
        ];



        DB::beginTransaction();
        try{

            $hotel_id = DB::table('hotel_master')->insertGetId($new_hotel);

            for($i=1; $i<=$roomCount; $i++)
            {

                $bedCount = $request->input('bedCount_'.$i);

                $new_room=[
                    'hotel_id' =>$hotel_id,
                    'room_type_id' => 1,
                    'price_schema_id' =>1,
                    'unit' => $request->input('roomUnit_'.$i),
                    'has_wireless' => 1,
                    'policy_id'=>1
                ];
                $room_id = DB::table('room')->insertGetId($new_room);
                for($j=1; $j<=$bedCount; $j++)
                {

                    $new_bed = [
                        'hotel_id' => $hotel_id,
                        'room_id'=>$room_id,
                        'bed_type_id'=>1,
                        'width'=>$request->input('bedWidth_'.$i.'_'.$j),
                        'length'=>$request->input('bedLength_'.$i.'_'.$j),
                        'unit'=>$request->input('bedUnit_'.$i.'_'.$j)

                    ];


                    DB::table('bed')->insert($new_bed);
                }

            }
            //中间逻辑代码
            DB::commit();
        }catch (\Exception $e) {
            //接收异常处理并回滚
                dd($e->getMessage());
             DB::rollBack();
        }




    }


    public function photo($hotelId)
    {
        return view('admin.hotelManagement.photo',compact('hotelId'));
    }
    public function addPhoto(Request $request)
    {
        $allField = $request->all();
        foreach($allField as $key => $path)
        {
            if (strpos($key, 'imagePath') !== false)
            {
                $imgItem = [
                    'hotel_id' => $request->input('hotelId'),
                    'type' => 0,
                    'image_path' => $path,
                    'desc' =>'default',
                ];
                DB::beginTransaction();
                try{

                   DB::table('hotel_photo')->insertGetId($imgItem);
                    //中间逻辑代码
                    DB::commit();
                }catch (\Exception $e) {
                    //接收异常处理并回滚
                    dd($e->getMessage());
                    DB::rollBack();
                }
            }

        }

        return redirect('/');
    }
}