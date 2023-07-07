<?php

namespace App\Http\Controllers\api\general;

use App\Http\Controllers\api\TraitResponse;
use App\Http\Controllers\Controller;
use App\Models\general\CollegeCouncil;
use App\Models\general\Council_manager;
use App\Models\general\Council_member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CollegecouncilController extends Controller
{
    use TraitResponse;
    public function uploadfile(Request $request)
    {
        $vaildator = Validator::make($request->all(), [
            'title'=>'required',
            'file'=>'required|file|mimes:pdf|max:2048'
        ]);
        if($vaildator->fails()) {
            return $this->apiResponse(null, $vaildator->errors(), 404);
        }

        $file = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('public/general/uploads/CollegeCouncils',$file);
        $files = CollegeCouncil::create([
            'title'=>$request->title,
            'file'=>$file
        ]);
        return $this->apiResponse($files, 'file save successfully', 201);

    }


#################################################################################################################################
    public function ShowFile()
    {

        $file = CollegeCouncil::all();
        return $this->apiResponse($file, 'Done', 201);
    }

#################################################################################################################################
    public function UpdateFile(Request $request, $id)
    {
        $vaildator = Validator::make($request->all(), [
            'title'=>'required',
            'file'=>'required|file|mimes:pdf|max:2048',
        ]);

        if($vaildator->fails()) {
            return $this->apiResponse(null, $vaildator->errors(), 404);
        }
        $file = CollegeCouncil::find($id);
        if(!$file) {
            return $this->apiResponse(null, 'Not Found', 404);
        }
        
        $files = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('public/general/uploads/CollegeCouncils',$files);
        $file->update([
            'title'=>$request->title,
            'file'=>$request->$files
        ]);
        return $this->apiResponse($files, 'File Updated Successfully', 201);
    }

##################################################################################################################################
    public function DeleteFile($id)
    {

        $file = CollegeCouncil::find($id);
        if(!$file) {
            return $this->apiResponse(null, 'Not Found', 404);
        }
        $file->delete();
        return $this->apiResponse(null, 'File Deleted Successfully', 201);
    }
################################################################################################################################
public function uploadmembers(Request $request){
    $vaildator = Validator::make($request->all(), [
        'member_name'=>'required',
        'member_job'=>'required',
        'member_tybe'=>'required',
    ]);

    if($vaildator->fails()) {
        return $this->apiResponse(null, $vaildator->errors(), 404);
    }
    
    $manager = Council_member::create([
        'member_name'=>$request->member_name,
        'member_job'=>$request->member_job,
        'member_tybe'=>$request->member_tybe,
    ]);
    if($manager){
        return $this->apiResponse($manager,'Members created successfully',201);
    }
        return $this->apiResponse(null,'ERROR',404);
}
###############################################################################################################################
public function showmembers(){
    $manager = Council_member::all();
        return $this->apiResponse($manager,'Done',201);
}
################################################################################################################################
public function updatemembers(Request $request,$id){
    $vaildator = Validator::make($request->all(), [
        'member_name'=>'required',
        'member_job'=>'required',
        'member_tybe'=>'required',
    ]);

    if($vaildator->fails()) {
        return $this->apiResponse(null, $vaildator->errors(), 404);
    }
    $manager = Council_member::find($id);
    if(!$manager){
        return $this->apiResponse(null,'Not Found',404);
    }
    $manager->update([
        'member_name'=>$request->member_name,
        'member_job'=>$request->member_job,
        'member_tybe'=>$request->member_tybe,
    ]);
    return $this->apiResponse($manager,'Members updated successfully',201);
}
###############################################################################################################################
public function deletemembers($id){
    $manager = Council_member::find($id);
    if(!$manager){
        return $this->apiResponse(null,'Not Found',404);
    }
    $manager->delete();
    return $this->apiResponse(null,'Members deleted successfully',201);

}
#################################################################################################################################
public function biographyupload(Request $request){
    $vaildator = Validator::make($request->all(), [
        'manager_name'=>'required',
        'manager_job'=>'required',
        'manager_biography'=>'required',
       
    ]);

    if($vaildator->fails()) {
        return $this->apiResponse(null, $vaildator->errors(), 404);
    }
    $managefile = $request->file('manager_biography')->getClientOriginalName();
    $managename = $request->file('manager_biography')->storeAs('public/general/uploads/CollegeCouncils',$managefile);
    $manger = Council_manager::create([
        'manager_name'=>$request->manager_name,
        'manager_job'=>$request->manager_job,
        'manager_biography'=>$managename
    ]);
     if($manger){
        return $this->apiResponse($manger,'Manager created successfully',201);
     }
     return $this->apiResponse(null,'ERROR ',404);
}
###############################################################################################################################
public function showbiography(){
    $manager = Council_manager::all();
        return $this->apiResponse($manager,'Manager showed successfully',201);
}
#################################################################################################################################
public function updatebiography(Request $request,$id){
    $vaildator = Validator::make($request->all(), [
        'manager_name'=>'required',
        'manager_job'=>'required',
        'manager_biography'=>'required',
       
    ]);

    if($vaildator->fails()) {
        return $this->apiResponse(null, $vaildator->errors(), 404);
    }
     
    $manager = Council_manager::find($id);
    if(!$manager){
        return $this->apiResponse(null,'Not Found',404);
    }
    $managefile = $request->file('manager_biography')->getClientOriginalName();
    $managename = $request->file('manager_biography')->storeAs('public/general/uploads/CollegeCouncils',$managefile);

    $manager->update([
        'manager_name'=>$request->manager_name,
        'managerjob'=>$request->managerjob,
        'manager_biography'=>$managefile,
    ]);
       return $this->apiResponse($manager,'Manager updated successfully',201);
}
################################################################################################################################
public function deletebiography($id){
    $manager = Council_manager::find($id);
    if(!$manager){
        return $this->apiResponse(null,'Not Found',404);
    }
    $manager->delete();
        return $this->apiResponse(null,'Manager deleted successfully',201);

}
}


