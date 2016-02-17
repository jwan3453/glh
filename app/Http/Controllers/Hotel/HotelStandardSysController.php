<?php

namespace App\Http\Controllers\Hotel;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User, App\Model\Hotel_master;
use DB;



class HotelStandardSysController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function standardSysRec()
    {
        $records =  DB::table('hotel_standard_record')->get();

        return view('admin.hotelStandardSys.standardSysRec', compact('records'));
    }

    public function createStandardSysRec(){


        $standards =  DB::table('hotel_standard')->get();

        return view('admin.hotelStandardSys.createStandardSysRec',compact('standards'));
    }

    public function newStandardSysRec(Request $request)
    {

        $total = (int)($request->input('totalRow'));


        $new_record = [
            'name' =>$request->input('hotelName'),
            'totalPoints' => $request->input('totalScore'),

        ];

        DB::beginTransaction();
        try{

            $record_id = DB::table('hotel_standard_record')->insertGetId($new_record);

            if($record_id != 0 )
            {
                for($i=1; $i<=$total; $i++)
                {
                    $new_record_row = [
                        'record_id' => $record_id,
                        'standard_id' => $i,
                        'points' => 0,
                        'score' => floatval($request->input('score_'.$i)),

                    ];
                    DB::table('hotel_standard_points')->insert($new_record_row);
                }

            }


            //中间逻辑代码
            DB::commit();
        }catch (\Exception $e) {
            //接收异常处理并回滚
            dd($e->getMessage());
            DB::rollBack();
        }

        return redirect('/admin/hotel/standardSystemRec');
    }

    public function editStandardSysRec($recordId)
    {

        $record =  DB::table('hotel_standard_record')->where('id', '=', $recordId)->first();
        $standards =  DB::table('hotel_standard')->get();
        $standardwithPoints = [];

        for($i=0; $i<sizeof($standards);$i++)
        {

            $points =  DB::table('hotel_standard_points')->where('record_id', '=', $record->id)->where('standard_id', '=', $standards[$i]->id)->first();


            $pointsInfo =[ 'points' =>$points->points,'score'=>$points->score];

            $obj = array_merge((array)$standards[$i],$pointsInfo);
            $standardwithPoints[] = $obj;
        }

        return view('admin.hotelStandardSys.editStandardSysRec', compact('standardwithPoints'),compact('record'));
    }

    public function updateStandardSysRec(Request $request)
    {


        $record_id = $request->input('recordId');
        $total = (int)($request->input('totalRow'));

        DB::beginTransaction();

        try{

            DB::table('hotel_standard_record')
                ->where('id', $record_id)
                ->update(['name' => $request->input('hotelName'),'totalPoints' => $request->input('totalScore')]);


            if($record_id != 0 )
            {
                for($i=1; $i<=$total; $i++)
                {
                    DB::table('hotel_standard_points')
                        ->where('record_id', $record_id)
                        ->where('standard_id',$i)
                        ->update(['score' => floatval($request->input('score_'.$i))]);
                }

            }


            //中间逻辑代码
            DB::commit();
        }catch (\Exception $e) {
            //接收异常处理并回滚
            dd($e->getMessage());
            DB::rollBack();
        }

        return redirect('/admin/hotel/standardSysRec');
    }

    public function showStandardSysRec($recordId)
    {


        $record =  DB::table('hotel_standard_record')->where('id', '=', $recordId)->first();
        $standards =  DB::table('hotel_standard')->get();
        $standardwithPoints = [];

        for($i=0; $i<sizeof($standards);$i++)
        {

            $points =  DB::table('hotel_standard_points')->where('record_id', '=', $record->id)->where('standard_id', '=', $standards[$i]->id)->first();


            $pointsInfo =[ 'points' =>$points->points,'score'=>$points->score];

            $obj = array_merge((array)$standards[$i],$pointsInfo);
            $standardwithPoints[] = $obj;
        }

        return view('admin.hotelStandardSys.showStandardSysRec', compact('standardwithPoints'),compact('record'));
    }

}