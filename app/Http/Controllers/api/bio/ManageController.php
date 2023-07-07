<?php

namespace App\Http\Controllers\api\bio;

use App\Http\Controllers\api\TraitResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ManageResourceBio;
use App\Models\bio\Management;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ManageController extends Controller
{
    use TraitResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manage =ManageResourceBio::collection(Management::get());
        return $this->apiResponse($manage,'Done',201);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $vaildator = Validator::make($request->all(),[

            'manager_name' => 'required',
            'manager_job'  => 'required'

         ]);

         if($vaildator->fails()){
            return $this->apiResponse(null,$vaildator->errors(),400);
         }
        $manage = Management::create($request->all());
        if($manage){
            return $this->apiResponse( new ManageResourceBio($manage),'manager created successfully',201);
        }else{
    return $this->apiResponse(null, 'manager not created', 400);
}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manage = Management::find($id);
        if($manage){
            return $this->apiResponse( new ManageResourceBio($manage),'Done',201);
        }else{
    return $this->apiResponse(null, 'manger Not Found', 400);
}
    }

    public function update(Request $request ,$id){

        $validator = Validator::make($request->all(), [
            'manager_name' => 'required|max:255',
            'manager_job' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $manage=Management::find($id);

        if(!$manage){
            return $this->apiResponse(null,'The manager Not Found',404);
        }

        $manage->update($request->all());
            return $this->apiResponse(new ManageResourceBio($manage),'The manager update successfully',201);
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manage = Management::find($id);
        if(!$manage){
            return $this->apiResponse(null,'Manager Not Found',404);
        }
        $manage->delete();
        if($manage){
            return $this->apiResponse(null, 'Manager Deleted successfully', 201);
        }
    }
}
