<?php

namespace App\Http\Controllers\api\bio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\api\TraitResponse;
use App\Http\Resources\CouncilResourceBio;
use App\Models\bio\Council;
use Illuminate\Support\Facades\Validator;
class CouncilBioController extends Controller
{
    use TraitResponse;
    public function StoreCouncil(Request $request)
    {


        $vaildator = Validator::make($request->all(), [

            'title' => 'required',
            'file'  => 'required|file|mimes:pdf|max:2048'
         ]);

        if($vaildator->fails()) {
            return $this->apiResponse(null, $vaildator->errors(), 400);
        }

        $file =   $request->file('file')->getClientOriginalName();
        $title = $request->file('file')->storeAs('public/bio/uploads',$file);
        $pdfFile = Council::create([
            'title' => $request->title,
            'file' => $file,
        ]);

        return $this->apiResponse($pdfFile, 'Council file saved successfully', 201);

    }
#################################################################################################################################
    public function GetCouncil()
    {
        $council = CouncilResourceBio::collection(Council::all());
        return $this->apiresponse($council, 'Done', 201);
    }
################################################################################################################################
    public function ShowCouncil($id)
    {
        $manage = Council::find($id);
        if($manage){
            return $this->apiResponse( new CouncilResourceBio($manage),'Done',201);
        }else{
    return $this->apiResponse(null, 'Council Not Found', 404);
}
    }
#################################################################################################################################
    public function UpdateCouncil(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'file' => 'required|file|mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $council = Council::find($id);
        if(!$council) {
            return $this->apiResponse(null, 'File Not Found', 404);
        }
       
        $council->update([
            'title'=>$request->title,
            'file'=>$request->file('file')->getClientOriginalName()
        ]);

        return $this->apiresponse(new CouncilResourceBio($council), 'File Updated Successfully', 201);
    }
#################################################################################################################################
    public function DeleteCouncil($id)
    {
        $council =Council::find($id);
        if(!$council) {

            return $this->apiResponse(null, 'pdf Not Found', 404);
        }

        $council->delete();
        return $this->apiResponse(null, 'pdf Deleted Successfully', 201);



    }
}
