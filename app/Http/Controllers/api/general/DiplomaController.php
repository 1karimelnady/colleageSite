<?php

namespace App\Http\Controllers\api\general;

use App\Http\Controllers\api\TraitResponse;
use App\Http\Controllers\Controller;
use App\Models\general\DiplomaStudie;
use App\Models\general\master;
use App\Models\general\studiesgraduate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiplomaController extends Controller
{
    use TraitResponse;
    public function uploaddiplomafile(Request $request)
    {
        $vaildator = Validator::make($request->all(), [
            'diploma_file'=>'required|file|mimes:pdf|max:2048'
        ]);
        if($vaildator->fails()) {
            return $this->apiResponse(null, $vaildator->errors(), 404);
        }

        $file = $request->file('diploma_file')->getClientOriginalName();
        $path = $request->file('diploma_file')->storeAs('public/general/uploads/DiplomaStudie',$file);
        $files = DiplomaStudie::create([
            'diploma_file'=>$file
        ]);
        return $this->apiResponse($files, ' Diploma file save successfully', 201);

    }


#################################################################################################################################
    public function ShowdiplomaFile()
    {

        $file = DiplomaStudie::all();
        return $this->apiResponse($file, 'Done', 201);
    }

#################################################################################################################################
    public function UpdatediplomaFile(Request $request, $id)
    {
        $vaildator = Validator::make($request->all(), [
            'diploma_file'=>'required|file|mimes:pdf|max:2048',
        ]);

        if($vaildator->fails()) {
            return $this->apiResponse(null, $vaildator->errors(), 404);
        }
        $file = DiplomaStudie::find($id);
        if(!$file) {
            return $this->apiResponse(null, 'Not Found', 404);
        }
        
        $files = $request->file('diploma_file')->getClientOriginalName();
        $path = $request->file('diploma_file')->storeAs('public/general/uploads/DiplomaStudie',$files);
        $file->update([
            'diploma_file'=>$request->$files
        ]);
        return $this->apiResponse($files, ' Diploma file Updated Successfully', 201);
    }

##################################################################################################################################
    public function DeletediplomaFile($id)
    {

        $file = DiplomaStudie::find($id);
        if(!$file) {
            return $this->apiResponse(null, 'Not Found', 404);
        }
        $file->delete();
        return $this->apiResponse(null, 'Diploma file Deleted Successfully', 201);
    }
################################################################################################################################
public function uploadmasterfile(Request $request)
    {
        $vaildator = Validator::make($request->all(), [
            'master_file'=>'required|file|mimes:pdf|max:2048'
        ]);
        if($vaildator->fails()) {
            return $this->apiResponse(null, $vaildator->errors(), 404);
        }

        $file = $request->file('master_file')->getClientOriginalName();
        $path = $request->file('master_file')->storeAs('public/general/uploads/master',$file);
        $files = master::create([
            'master_file'=>$file
        ]);
        return $this->apiResponse($files, 'Master file save successfully', 201);

    }


#################################################################################################################################
    public function ShowmasterFile()
    {

        $file = master::all();
        return $this->apiResponse($file, 'Done', 201);
    }

#################################################################################################################################
    public function UpdatemasterFile(Request $request, $id)
    {
        $vaildator = Validator::make($request->all(), [
            'master_file'=>'required|file|mimes:pdf|max:2048',
        ]);

        if($vaildator->fails()) {
            return $this->apiResponse(null, $vaildator->errors(), 404);
        }
        $file = master::find($id);
        if(!$file) {
            return $this->apiResponse(null, 'Not Found', 404);
        }
        
        $files = $request->file('master_file')->getClientOriginalName();
        $path = $request->file('master_file')->storeAs('public/general/uploads/master',$files);
        $file->update([
            'master_file'=>$request->$files
        ]);
        return $this->apiResponse($files, 'Master file Updated Successfully', 201);
    }

##################################################################################################################################
    public function DeletemasterFile($id)
    {

        $file = master::find($id);
        if(!$file) {
            return $this->apiResponse(null, 'Not Found', 404);
        }
        $file->delete();
        return $this->apiResponse(null, 'Master file Deleted Successfully', 201);
    }
##################################################################################################################################
public function uploadgraduatestudiesfile(Request $request)
    {
        $vaildator = Validator::make($request->all(), [
            'graduatestudies_file'=>'required|file|mimes:pdf|max:2048'
        ]);
        if($vaildator->fails()) {
            return $this->apiResponse(null, $vaildator->errors(), 404);
        }

        $file = $request->file('graduatestudies_file')->getClientOriginalName();
        $path = $request->file('graduatestudies_file')->storeAs('public/general/uploads/studiesgraduate',$file);
        $files = studiesgraduate::create([
            'graduatestudies_file'=>$file
        ]);
        return $this->apiResponse($files, ' studiesgraduate file save successfully', 201);

    }


#################################################################################################################################
    public function ShowgraduatestudiesFile()
    {

        $file = studiesgraduate::all();
        return $this->apiResponse($file, 'Done', 201);
    }

#################################################################################################################################
    public function UpdategraduatestudiesFile(Request $request, $id)
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
        $path = $request->file('graduatestudies_file')->storeAs('public/general/uploads/studiesgraduate',$files);
        $file->update([
            'graduatestudies_file'=>$request->$files
        ]);
        return $this->apiResponse($files, 'studiesgraduate file Updated Successfully', 201);
    }

##################################################################################################################################
    public function DeletegraduatestudiesFile($id)
    {

        $file = studiesgraduate::find($id);
        if(!$file) {
            return $this->apiResponse(null, 'Not Found', 404);
        }
        $file->delete();
        return $this->apiResponse(null, 'studiesgraduate file Deleted Successfully', 201);
    }    
}
