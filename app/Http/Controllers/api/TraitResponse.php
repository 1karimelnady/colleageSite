<?php

   namespace App\Http\Controllers\api;
   
   trait TraitResponse{

       public function apiResponse($key = null,$message = null,$status = null){

        $array =[
            'key'=>$key,
            'message'=>$message,
            'status'=>$status
        ];
        return response($array,$status);

       }

    

   }