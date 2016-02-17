<?php namespace App\Http\Controllers\Upload;

use App\Http\Requests;
use App\Http\Controllers\Controller;



use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Auth;
use Qiniu\Auth as QiniuAuth;
use Qiniu\Storage\UploadManager;
use App\Library;



class UploadController extends Controller {

    public function uploadImage(Request $request)
    {
        $previousImage = $request->input('coverImageFilePath');
        if($previousImage != '')
        {
            if(file_exists($previousImage))
                unlink($previousImage);
        }

        $status = 0;
        $file = $request->file('uploadImage');
        $destinationPath = 'uploads/image/'.Auth::user()->username.'/articleCover/';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        if(!file_exists($destinationPath.$filename))
            $status = 1;
        return response()->json(array(
            'status' => $status,
            'imgFilePath'=> $destinationPath.$filename,
            'img' => asset($destinationPath.$filename),
        ));
    }

    public function uploadImages(Request $request)
    {
        $status = 0;
        $file = $request->file('file');
        $hotelId = $request->input('hotelId');


        $destinationPath = 'uploads/image/hotel/'.$hotelId.'/';
        $filename =Library\Common::getTimeStamp().'.'.$file->guessExtension();
        $file->move($destinationPath, $filename);
        if(!file_exists($destinationPath.$filename))
            $status = 1;
        return response()->json(array(
            'status' => $status,
            'imgFilePath'=> $destinationPath.$filename,
            'img' => asset($destinationPath.$filename),
        ));

    }

    public function deleteImage(Request $request)
    {
        $status=0;
        $imagePath = $request->input('imagePath');
        if($imagePath != '')
        {
            if(file_exists($imagePath))
            {
                if(unlink($imagePath))
                {
                    $status=1;
                }

            }
        }
        return response()->json(array(
            'status' => $status
        ));
    }

}