<?php

namespace App\Http\Controllers\api\soft;

use App\Http\Controllers\api\TraitResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ManageResourceSoft;
use Illuminate\Http\Request;
use App\Models\soft\ManagementSoft;
use Illuminate\Support\Facades\Validator;

class ManageSoftController extends Controller
{
    use TraitResponse;
    public function GetManager(){
        $manage = ManageResourceSoft::collection(ManagementSoft::get());
        return $this->apiResponse($manage,'Done',200);
    }
#################################################################################################################################
    public function UploadManager(Request $request){
        $vaildator = Validator::make($request->all(),[
            'manager_name'=>'required',
            'manager_job'=>'required'
        ]);
        if($vaildator->fails()){
            return $this->apiResponse(null,$vaildator->errors(),404);
        }
        $manage = ManagementSoft::create($request->all());
           if($manage){
            return $this->apiResponse( new ManageResourceSoft($manage),'Manager created successfully',201);

           }
            return $this->apiResponse(null,'Manager not created',400);
    }
#################################################################################################################################
    public function ShowManager($id){
        $manage = ManagementSoft::find($id);
        if($manage){
            return $this->apiResponse( new ManageResourceSoft($manage),'Manager showed successfully',200);
           
        }
        return $this->apiResponse(null,'Not Found',404);
    }
#################################################################################################################################
    public function UpdateManager(Request $request,$id){
        $vaildator = Validator::make($request->all(),[
            'manager_name'=>'required',
            'manager_job'=>'required'
        ]);
        if($vaildator->fails()){
            return $this->apiResponse(null,$vaildator->errors(),404);
        }
        $manage = ManagementSoft::find($id);
        if(!$manage){
            return $this->apiResponse(null,'Not Found',404);
        }
        $manage->update($request->all());
        return $this->apiResponse( new ManageResourceSoft($manage),'Manager Updated Successfully',200);

    }
#################################################################################################################################
    public function DeleteManager($id){
        $manage = ManagementSoft::find($id);
        if(!$manage){
            return $this->apiResponse(null,'Not Found',404);
        }
      
      $manage->delete();
        return $this->apiResponse(null,'Manager Deleted Successfully',200);
    }
}
