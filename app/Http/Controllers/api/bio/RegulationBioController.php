<?php

namespace App\Http\Controllers\api\bio;

use App\Http\Controllers\api\TraitResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\RegulationRessourceBio;
use App\Models\bio\RegulationBio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegulationBioController extends Controller
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
        $title = $request->file('file')->storeAs('public/soft/uploads',$file);
        $pdfFile = RegulationBio::create([
            'file' => $file,
        ]);
        return $this->apiResponse($pdfFile, 'Regulation file saved successfully', 201);
    }

    public function GetRegulation()
    {
        $regulation = RegulationRessourceBio::collection(RegulationBio::all());
        return $this->apiresponse($regulation, 'Done', 201);
    }

    public function UpdateRegulation(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:pdf',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $regulation = RegulationBio::find($id);
        if(!$regulation) {
            return $this->apiResponse(null, 'Regulation Not Found', 404);
        }
       
        $regulation->update([
            'file'=>$request->file('file')->getClientOriginalName()
        ]);

        return $this->apiresponse(new RegulationRessourceBio($regulation), 'Regulation Updated Successfully', 201);
    }
    public function DeleteRegulation($id)
    {
        $regulation =RegulationBio::find($id);
        if(!$regulation) {

            return $this->apiResponse(null, 'Regulation Not Found', 404);
        }

        $regulation->delete();
        return $this->apiResponse(null, 'Regulation Deleted Successfully', 201);
    }
}
