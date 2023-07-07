<?php

namespace App\Http\Controllers\api\general;

use App\Http\Controllers\Controller;
use App\Models\general\studiesgraduate;
use Illuminate\Http\Request;
use App\Http\Controllers\api\TraitResponse;

use Illuminate\Support\Facades\Validator;

class StudiesGraduateController extends Controller
{
    use TraitResponse;
    public function uploadstudiesgraduatefile(Request $request)
    {
        $vaildator = Validator::make($request->all(), [
            'graduatestudies_file'=>'required|file|mimes:pdf|max:2048'
        ]);
        if($vaildator->fails()) {
            return $this->apiResponse(null, $vaildator->errors(), 404);
        }

        $file = $request->file('graduatestudies_file')->getClientOriginalName();
        $path = $request->file('graduatestudies_file')->storeAs('public/general/uploads/StudiesGraduate',$file);
        $files = studiesgraduate::create([
            'graduatestudies_file'=>$file
        ]);
        return $this->apiResponse($files, ' Graduatestudies file save successfully', 201);

    }


#################################################################################################################################
    public function ShowstudiesgraduateFile()
    {

        $file = studiesgraduate::all();
        return $this->apiResponse($file, 'Done', 201);
    }

#################################################################################################################################
    public function UpdatestudiesgraduateFile(Request $request, $id)
    {
        $vaildator = Validator::make($request->all(), [
            'graduatestudies_file'=>'required|file|mimes:pdf|max:2048',
        ]);

        if($vaildator->fails()) {
            return $this->apiResponse(null, $vaildator->errors(), 404);
        }
        $file = studiesgraduate::find($id);
        if(!$file) {
            return $this->apiResponse(null, 'Not Found', 404);
        }
        
        $files = $request->file('graduatestudies_file')->getClientOriginalName();
        $path = $request->file('graduatestudies_file')->storeAs('public/general/uploads/DiplomaStudie',$files);
        $file->update([
            'graduatestudies_file'=>$request->$files
        ]);
        return $this->apiResponse($files, ' Graduatestudies file Updated Successfully', 201);
    }

##################################################################################################################################
    public function DeletestudiesgraduateFile($id)
    {

        $file = studiesgraduate::find($id);
        if(!$file) {
            return $this->apiResponse(null, 'Not Found', 404);
        }
        $file->delete();
        return $this->apiResponse(null, 'Graduatestudies file Deleted Successfully', 201);
    }
################################################################################################################################
}
