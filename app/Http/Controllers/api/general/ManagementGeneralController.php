<?php

namespace App\Http\Controllers\api\general;

use App\Http\Controllers\api\TraitResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ManageResourceGeneral;
use App\Models\bio\Management;
use App\Models\general\ManagementGeneral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ManagementGeneralController extends Controller
{
    use TraitResponse;
    public function GetManager(){
        $manager = ManageResourceGeneral::collection(ManagementGeneral::get());
        return $this->apiResponse($manager,'Done',201);
    }

    public function StoreManager(Request $request){
        $vaildator = Validator::make($request->all(),[
            'manager_name'=>'required',
            'managerjob'=>'required'
        ]);
        if($vaildator->fails()){
            return $this->apiResponse(null,$vaildator->errors(),404);
        }
       
        $manager = ManagementGeneral::create($request->all());
        if($manager){
            return $this->apiResponse( new ManageResourceGeneral($manager),'Manager created successfully',201);
        }
        else
            return $this->apiResponse(null,'Manager Not created ',404);
    }

    public function ShowManager($id)
    {
        $manage = ManagementGeneral::find($id);
        if($manage){
            return $this->apiResponse( new ManageResourceGeneral($manage),'Done',201);
        }else{
    return $this->apiResponse(null, 'manger Not Found', 400);
}
    }

    public function UpdateManager(Request $request,$id){
        $vaildator = Validator::make($request->all(),[
            'manager_name'=>'required',
            'managerjob'=>'required'
        ]);
        if($vaildator->fails()){
            return $this->apiResponse(null,$vaildator->errors(),404);
        }

        $manager = ManagementGeneral::find($id);
        if(!$manager){
            return $this->apiResponse(null,' Manager Not Found ',404);
        }

        $manager->update($request->all());
        if($manager){
            return $this->apiResponse(new ManageResourceGeneral($manager),'Manager Updated Successfully ',201);
        }
        return $this->apiResponse(null,'Manager Not Updated ',404);
    }

    public function DeleteManager($id){
        $manager = ManagementGeneral::find($id);
        if(!$manager){
            return $this->apiResponse(null,' Manager Not Found ',404);
        }
        $manager->delete();
        if($manager){
            return $this->apiResponse(null,'Manager Deleted Successfully ',201);
        }

    }
    
}