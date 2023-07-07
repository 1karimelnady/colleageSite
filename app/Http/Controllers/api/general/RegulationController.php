<?php

namespace App\Http\Controllers\api\general;

use App\Http\Controllers\api\TraitResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\RegulationResourceGeneral;
use App\Models\general\RegulationGeneral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegulationController extends Controller
{
    use TraitResponse;
    public function UploadRegulation(Request $request){
        $vaildator = Validator::make($request->all(),[
            'file'=>'required|file'
        ]);
        if($vaildator->fails()){
            return $this->apiResponse(null,$vaildator->errors(),404);
        }
        $file =   $request->file('file')->getClientOriginalName();
        $title = $request->file('file')->storeAs('public/uploads/general',$file);
        $pdfFile = RegulationGeneral::create([
            'file' => $file,
        ]);
        return $this->apiResponse($pdfFile, 'Regulation file saved successfully', 201);
    }

    public function GetRegulation()
    {
        $regulation = RegulationResourceGeneral::collection(RegulationGeneral::all());
        return $this->apiresponse($regulation, 'Done', 201);
    }

    public function ShowRegulation($id)
    {
        $regulation = RegulationGeneral::find($id);
        if($regulation){
            return $this->apiResponse( new RegulationResourceGeneral($regulation),'Done',201);
        }else{
    return $this->apiResponse(null, 'Regulation Not Found', 404);
}
    }

    public function UpdateRegulation(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:pdf',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $regulation = RegulationGeneral::find($id);
        if(!$regulation) {
            return $this->apiResponse(null, 'Regulation Not Found', 404);
        }
       
        $regulation->update([
            'file'=>$request->file('file')->getClientOriginalName()
        ]);

        return $this->apiresponse(new RegulationResourceGeneral($regulation), 'Regulation Updated Successfully', 201);
    }
    public function DeleteRegulation($id)
    {
        $regulation =RegulationGeneral::find($id);
        if(!$regulation) {

            return $this->apiResponse(null, 'Regulation Not Found', 404);
        }

        $regulation->delete();
        return $this->apiResponse(null, 'Regulation Deleted Successfully', 201);
    }
}
