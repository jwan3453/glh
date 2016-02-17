<?php

namespace App\Http\Controllers\Hotel;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User, App\Model;
use DB;
use App\Library;


class HotelOrderController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showHotel($hotelId)
    {

        $photoList = [];
        $facilities=[];
        $hotelInfo = Model\Hotel_master::where('id','=',$hotelId)->first();
        $city = Model\City::where('id','=',$hotelInfo->city)->first()->name;
        $province = Model\province::where('id','=',$hotelInfo->province)->first()->name;


        //获得酒店图片路径
        $destinationPath = 'uploads/image/hotel/'.$hotelId.'/';
        if (is_dir($destinationPath)) {
            if ($dh = opendir($destinationPath)) {
                while (($file = readdir($dh)) !== false) {
                    if($file != '.' && $file !='..')
                    {
                        $photoList[] = '/uploads/image/hotel/'.$hotelId.'/'.$file;
                    }
                } closedir($dh);
            }
        }

        //获得酒店的设施清单

        if(sizeof($hotelInfo) !=0 )
        {
            $facList = array_filter(explode(' ',$hotelInfo->hotel_facility_list));
            $hoteFacility = Model\Hotel_Facility::all();

            $facIds = [];
            $tmpFacIds=[];
            $facSubIds = array();
            $facIndex=0;
            $tmpIndex='0';

            for($i=0; $i<sizeof($facList); $i++)
            {

                $ids=explode('_',$facList[$i]);

                if($tmpIndex !=($ids[0]))
                {

                    $facIds[$ids[0]] = [  'id'=>$ids[0]];
                    $tmpFacIds[] =$ids[0];
                    $tmpIndex = $ids[0];
                    $facIndex++;
                    $facSubIds=array();
                }

                $facSubIds[] = $ids[1];
                $facIds[$ids[0]]['subIds'] = $facSubIds;

            }

            for($i=0; $i<sizeof($hoteFacility);$i++)
            {

                if(in_array($hoteFacility[$i]->id, $tmpFacIds))
                {


                    $hotelFacilitySub =Model\Hotel_Facility_Sub::where('facility_id', '=', $hoteFacility[$i]->id)->whereIn('id', array_values($facIds[$hoteFacility[$i]->id]['subIds']))->get();

//                  $pointsInfo =[ 'points' =>$points->points,'score'=>$points->score];
//
                    $obj=[
                        'id' => $hoteFacility[$i]->id,
                        'name' => $hoteFacility[$i]->name,
                        'sub' =>$hotelFacilitySub
                    ];

                    $facilities[] = $obj;
                }

            }


        }


        $hotel=[
            'hotelInfo'=> $hotelInfo,
            'hotelPhoto'=>$photoList,
            'hotelFacilities' =>$facilities,
            'city' =>$city,
            'province'=>$province
        ];

        return view('hotel.show', compact('hotel'));
    }


}