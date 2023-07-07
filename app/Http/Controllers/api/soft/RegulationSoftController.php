<?php

namespace App\Http\Controllers\api\soft;

use App\Http\Controllers\api\TraitResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\RegulationRessourceSoft;
use App\Models\soft\RegulationSoft;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegulationSoftController extends Controller
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
        $pdfFile = RegulationSoft::create([
            'file' => $file,
        ]);
        return $this->apiResponse( new RegulationRessourceSoft($pdfFile), 'Regulation file saved successfully', 201);
    }

    public function GetRegulation()
    {
        $regulation = RegulationRessourceSoft::collection(RegulationSoft::all());
        return $this->apiresponse($regulation, 'Done', 200);
    }

    public function UpdateRegulation(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:pdf',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $regulation = RegulationSoft::find($id);
        if(!$regulation) {
            return $this->apiResponse(null, 'Regulation Not Found', 404);
        }
       
        $regulation->update([
            'file'=>$request->file('file')->getClientOriginalName()
        ]);

        return $this->apiresponse(new RegulationRessourceSoft($regulation), 'Regulation file Updated Successfully', 200);
    }
    public function DeleteRegulation($id)
    {
        $regulation =RegulationSoft::find($id);
        if(!$regulation) {

            return $this->apiResponse(null, 'Regulation Not Found', 404);
        }

        $regulation->delete();
        return $this->apiResponse(null, 'Regulation file Deleted Successfully', 200);
    }
}
