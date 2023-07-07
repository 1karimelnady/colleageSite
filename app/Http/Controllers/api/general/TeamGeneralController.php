<?php

namespace App\Http\Controllers\api\general;

use App\Http\Controllers\Controller;
use App\Models\general\First_courses_General;
use Illuminate\Http\Request;
use App\Http\Controllers\api\TraitResponse;
use App\Models\general\First_examnation_general;
use App\Models\general\First_General;
use App\Models\general\FourthCs_courses_General;
use App\Models\general\FourthCs_examnation_general;
use App\Models\general\FourthCs_General;
use App\Models\general\FourthIs_courses_General;
use App\Models\general\FourthIs_examnation_general;
use App\Models\general\FourthIS_General;
use App\Models\general\FourthIt_courses_General;
use App\Models\general\FourthIt_examnation_general;
use App\Models\general\FourthIt_General;
use App\Models\general\Second_courses_General;
use App\Models\general\Second_examnation_general;
use App\Models\general\Second_General;
use App\Models\general\ThirdCs_courses_General;
use App\Models\general\ThirdCs_examnation_general;
use App\Models\general\ThirdCs_General;
use App\Models\general\ThirdIs_courses_General;
use App\Models\general\ThirdIs_examnation_general;
use App\Models\general\ThirdIs_General;
use App\Models\general\ThirdIt_courses_General;
use App\Models\general\ThirdIt_examnation_general;
use App\Models\general\ThirdIt_General;
use Illuminate\Support\Facades\Validator;
class TeamGeneralController extends Controller
{
    use TraitResponse;
    public function UploadImage(Request $request, $team_num ,$team_name){
        $vaildator = Validator::make($request->all(),[
            'image'=>'required|image|mimes:png,jpg,jpeg'
        ]);
        if($vaildator->fails()){
            return $this->apiResponse(null,$vaildator->errors(),404);
        }
    if($team_num == 1 && $team_name == 'null') {
        $image = $request->file('image')->getClientOriginalName();
        $title = $request->file('image')->storeAs('public/general/uploads',$image);
        $save = First_General::create([
            'image'=>$image
        ]);
        return $this->apiResponse($save, 'Image save successfully', 201);
    }

    elseif($team_num == 2 && $team_name == 'null'){
        $vaildator = Validator::make($request->all(),[
            'image'=>'required|image|mimes:png,jpg,jpeg'
        ]);

        $image = $request->file('image')->getClientOriginalName();
        $title = $request->file('image')->store('public/general/uploads');
        $save = Second_General::create([
            'image'=>$image
        ]);
        return $this->apiResponse($save, 'Image save successfully', 201);
    }

    elseif($team_num ==3 && $team_name =='cs'){
        $vaildator = Validator::make($request->all(),[
            'image'=>'required|image|mimes:png,jpg,jpeg'
        ]);

        $image = $request->file('image')->getClientOriginalName();
        $title = $request->file('image')->store('public/general/uploads');
        $save = ThirdCs_General::create([
            'image'=>$image
        ]);
        return $this->apiResponse($save, 'Image save successfully', 201);
    }

    elseif($team_num ==3 && $team_name =='is'){
        $vaildator = Validator::make($request->all(),[
            'image'=>'required|image|mimes:png,jpg,jpeg'
        ]);

        $image = $request->file('image')->getClientOriginalName();
        $title = $request->file('image')->store('public/general/uploads');
        $save = ThirdIs_General::create([
            'image'=>$image
        ]);
        return $this->apiResponse($save, 'Image save successfully', 201);
    }

    elseif($team_num ==3 && $team_name =='it'){
        $vaildator = Validator::make($request->all(),[
            'image'=>'required|image|mimes:png,jpg,jpeg'
        ]);

        $image = $request->file('image')->getClientOriginalName();
        $title = $request->file('image')->store('public/general/uploads');
        $save = ThirdIt_General::create([
            'image'=>$image
        ]);
        return $this->apiResponse($save, 'Image save successfully', 201);
    }
    

    elseif($team_num ==4 && $team_name == 'cs'){
        $vaildator = Validator::make($request->all(),[
            'image'=>'required|image|mimes:png,jpg,jpeg'
        ]);

        $image = $request->file('image')->getClientOriginalName();
        $title = $request->file('image')->store('public/general/uploads');
        $save = FourthCs_General::create([
            'image'=>$image
        ]);
        return $this->apiResponse($save, 'Image save successfully', 201);
    }

    elseif($team_num == 4 && $team_name == 'is'){
        $vaildator = Validator::make($request->all(),[
            'image'=>'required|image|mimes:png,jpg,jpeg'
        ]);

        $image = $request->file('image')->getClientOriginalName();
        $title = $request->file('image')->store('public/general/uploads');
        $save = FourthIS_General::create([
            'image'=>$image
        ]);
        return $this->apiResponse($save, 'Image save successfully', 201);
    }

    elseif($team_num ==4 && $team_name == 'it'){
        $vaildator = Validator::make($request->all(),[
            'image'=>'required|image|mimes:png,jpg,jpeg'
        ]);

        $image = $request->file('image')->getClientOriginalName();
        $title = $request->file('image')->store('public/general/uploads');
        $save = FourthIt_General::create([
            'image'=>$image
        ]);
        return $this->apiResponse($save, 'Image save successfully', 201);
    }
    else 
    return $this->apiResponse(null,'Not Found',404);

    }

 #############################################################################################################################
 
    public function getImage($team_num,$id,$team_name){

        if($team_num ==1 && $team_name == 'null'){
            $image = First_General::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $imageonly = First_General::where('id',$id)->pluck('image');
            return $this->apiResponse($imageonly,'Done',201);
        }

        elseif($team_num == 2 && $team_name == 'null'){
            $image = Second_General::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $imageonly = Second_General::where('id',$id)->pluck('image');
            return $this->apiResponse($imageonly,'Done',201);
        }

        elseif($team_num == 3 && $team_name== 'cs' ){
            $image = ThirdCs_General::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $imageonly = ThirdCs_General::where('id',$id)->pluck('image');
            return $this->apiResponse($imageonly,'Done',201);
        }

        elseif($team_num == 3 && $team_name== 'is' ){
            $image = ThirdIs_General::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $imageonly = ThirdIs_General::where('id',$id)->pluck('image');
            return $this->apiResponse($imageonly,'Done',201);
        }

        elseif($team_num == 3 && $team_name== 'it' ){
            $image = ThirdIt_General::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $imageonly = ThirdIt_General::where('id',$id)->pluck('image');
            return $this->apiResponse($imageonly,'Done',201);
        }

        elseif($team_num == 4 && $team_name == 'cs'){
            $image = FourthCs_General::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $imageonly = FourthCs_General::where('id',$id)->pluck('image');
            return $this->apiResponse($imageonly,'Done',201);
        }

        elseif($team_num == 4 && $team_name == 'is'){
            $image = FourthIS_General::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $imageonly = FourthIS_General::where('id',$id)->pluck('image');
            return $this->apiResponse($imageonly,'Done',201);
        }

        elseif($team_num == 4 && $team_name == 'it'){
            $image = FourthIt_General::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $imageonly = FourthIt_General::where('id',$id)->pluck('image');
            return $this->apiResponse($imageonly,'Done',201);
        }
        else
        return $this->apiResponse(null,' Num Not Found',404);

    }
 ##############################################################################################################################
    public function UpdateImage( Request $request,$team_num,$id ,$team_name ){
        $vaildator = Validator::make($request->all(),[
            'image'=>'required|image|mimes:png,jpg'
        ]);
        if($vaildator->fails()){
            return $this->apiResponse(null,$vaildator->errors(),404);
        }
        if($team_num == 1 && $team_name == 'null'){
            $image = First_General::find($id);
            if(!$image){
             return $this->apiResponse(null,'Not Found',404);
            }
            
            $image->update([
                'image'=>$request->file('image')->getClientOriginalName(),
              ]);
            return $this->apiResponse($image,'Image Updated Successfully',201);
        }

        elseif($team_num == 2 && $team_name == 'null'){
            $image = Second_General::find($id);
            if(!$image){
             return $this->apiResponse(null,'Not Found',404);
            }
            
            $image->update([
                'image'=>$request->file('image')->getClientOriginalName(),
              ]);
            return $this->apiResponse($image,'Image Updated Successfully',201);
        }

        elseif($team_num == 3 && $team_name = 'cs'){
            $image = ThirdCs_General::find($id);
            if(!$image){
             return $this->apiResponse(null,'Not Found',404);
            }
            
            $image->update([
                'image'=>$request->file('image')->getClientOriginalName(),
              ]);
            return $this->apiResponse($image,'Image Updated Successfully',201);
        }

        elseif($team_num == 3 && $team_name = 'is'){
            $image = ThirdIs_General::find($id);
            if(!$image){
             return $this->apiResponse(null,'Not Found',404);
            }
            
            $image->update([
                'image'=>$request->file('image')->getClientOriginalName(),
              ]);
            return $this->apiResponse($image,'Image Updated Successfully',201);
        }

        elseif($team_num == 3 && $team_name = 'it'){
            $image = ThirdIt_General::find($id);
            if(!$image){
             return $this->apiResponse(null,'Not Found',404);
            }
            
            $image->update([
                'image'=>$request->file('image')->getClientOriginalName(),
              ]);
            return $this->apiResponse($image,'Image Updated Successfully',201);
        }

        elseif($team_num == 4 && $team_name == 'cs'){
            $image = FourthCs_General::find($id);
            if(!$image){
             return $this->apiResponse(null,'Not Found',404);
            }
            $image->update([
                'image'=>$request->file('image')->getClientOriginalName(),
              ]);
            return $this->apiResponse($image,'Image Updated Successfully',201);
        }

        elseif($team_num == 4 && $team_name == 'is'){
            $image = FourthIS_General::find($id);
            if(!$image){
             return $this->apiResponse(null,'Not Found',404);
            }
            $image->update([
                'image'=>$request->file('image')->getClientOriginalName(),
              ]);
            return $this->apiResponse($image,'Image Updated Successfully',201);
        }

        elseif($team_num == 4 && $team_name == 'it'){
            $image = FourthIt_General::find($id);
            if(!$image){
             return $this->apiResponse(null,'Not Found',404);
            }
            $image->update([
                'image'=>$request->file('image')->getClientOriginalName(),
              ]);
            return $this->apiResponse($image,'Image Updated Successfully',201);
        }
        else
        return $this->apiResponse(null,' Num Not Found',404);

    }
##############################################################################################################################
    public function DeleteImage($team_num,$id,$team_name){
        if($team_num == 1 && $team_name == 'null'){
            $image = First_General::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $image->delete();
            return $this->apiResponse(null,'Image Deleted Successfully',201);
        }

        elseif($team_num == 2 && $team_name == 'null'){
            $image = Second_General::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $image->delete();
            return $this->apiResponse(null,'Image Deleted Successfully',201);
        }

        elseif($team_num == 3 && $team_name == 'cs'){
            $image = ThirdCs_General::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $image->delete();
            return $this->apiResponse(null,'Image Deleted Successfully',201);
        }

        elseif($team_num == 3 && $team_name == 'is'){
            $image = ThirdIs_General::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $image->delete();
            return $this->apiResponse(null,'Image Deleted Successfully',201);
        }

        elseif($team_num == 3 && $team_name == 'it'){
            $image = ThirdIt_General::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $image->delete();
            return $this->apiResponse(null,'Image Deleted Successfully',201);
        }

        elseif($team_num == 4 && $team_name == 'cs'){
            $image = FourthCs_General::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $image->delete();
            return $this->apiResponse(null,'Image Deleted Successfully',201);
        }

        elseif($team_num == 4 && $team_name == 'is'){
            $image = FourthIS_General::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $image->delete();
            return $this->apiResponse(null,'Image Deleted Successfully',201);
        }

        elseif($team_num == 4 && $team_name == 'it'){
            $image = FourthIt_General::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $image->delete();
            return $this->apiResponse(null,'Image Deleted Successfully',201);
        }

    }

##############################################################################################################################
    public function UploadCourses(Request $request, $team_num , $team_name ){

        $vaildator = Validator::make($request->all(),[
            'course_name'=>'required',
            'course_num'=>'required',
            'credit_hour_course'=>'required',
            'previous_course_name'=>'required',
            
        ]);

        if($vaildator->fails()){
            return $this->apiResponse(null,$vaildator->errors(),404);
        }
        if($team_num == 1 && $team_name == 'null'){
            $course = First_courses_General::create([
                'course_name'=>$request->course_name,
                'course_num'=>$request->course_num,
                'credit_hour_course'=>$request->credit_hour_course,
                'previous_course_name'=>$request->previous_course_name,
                
            ]);
            if($course){
                return $this->apiResponse( $course,'courses Uploded Successfully',201);
            }
            return $this->apiResponse(null,'ERROR',404);
        }

        elseif($team_num == 2 && $team_name == 'null'){
            $course = Second_courses_General::create([
                'course_name'=>$request->course_name,
                'course_num'=>$request->course_num,
                'credit_hour_course'=>$request->credit_hour_course,
                'previous_course_name'=>$request->previous_course_name,
                
            ]);
            if($course){
                return $this->apiResponse($course,'courses Uploded Successfully',201);
            }
            return $this->apiResponse(null,'ERROR',404);
        }

        elseif($team_num == 3 && $team_name == 'cs'){
            $course = ThirdCs_courses_General::create([
                'course_name'=>$request->course_name,
                'course_num'=>$request->course_num,
                'credit_hour_course'=>$request->credit_hour_course,
                'previous_course_name'=>$request->previous_course_name,
               
            ]);
            if($course){
            return $this->apiResponse($course,'courses Uploded Successfully',201);
            }
            return $this->apiResponse(null,'ERROR',404);  
        }

        elseif($team_num == 3 && $team_name == 'is'){
            $course = ThirdIs_courses_General::create([
                'course_name'=>$request->course_name,
                'course_num'=>$request->course_num,
                'credit_hour_course'=>$request->credit_hour_course,
                'previous_course_name'=>$request->previous_course_name,
               
            ]);
            if($course){
            return $this->apiResponse($course,'courses Uploded Successfully',201);
            }
            return $this->apiResponse(null,'ERROR',404);  
        }

        elseif($team_num == 3 && $team_name == 'it'){
            $course = ThirdIt_courses_General::create([
                'course_name'=>$request->course_name,
                'course_num'=>$request->course_num,
                'credit_hour_course'=>$request->credit_hour_course,
                'previous_course_name'=>$request->previous_course_name,
               
            ]);
            if($course){
            return $this->apiResponse($course,'courses Uploded Successfully',201);
            }
            return $this->apiResponse(null,'ERROR',404);  
        }

        elseif($team_num == 4 && $team_name == 'cs'){
            $course = FourthCs_courses_General::create([
                'course_name'=>$request->course_name,
                'course_num'=>$request->course_num,
                'credit_hour_course'=>$request->credit_hour_course,
                'previous_course_name'=>$request->previous_course_name,
               
            ]);
            if($course){
                return $this->apiResponse($course,'courses Uploded Successfully',201);
            }
            return $this->apiResponse(null,'ERROR',404);
        }

        elseif($team_num == 4 && $team_name == 'is'){
            $course = FourthIs_courses_General::create([
                'course_name'=>$request->course_name,
                'course_num'=>$request->course_num,
                'credit_hour_course'=>$request->credit_hour_course,
                'previous_course_name'=>$request->previous_course_name,
               
            ]);
            if($course){
                return $this->apiResponse($course,'courses Uploded Successfully',201);
            }
            return $this->apiResponse(null,'ERROR',404);
        }

        elseif($team_num == 4 && $team_name == 'it'){
            $course = FourthIt_courses_General::create([
                'course_name'=>$request->course_name,
                'course_num'=>$request->course_num,
                'credit_hour_course'=>$request->credit_hour_course,
                'previous_course_name'=>$request->previous_course_name,
               
            ]);
            if($course){
                return $this->apiResponse($course,'courses Uploded Successfully',201);
            }
            return $this->apiResponse(null,'ERROR',404);
        }

        else 
            return $this->apiResponse(null,' Num Not Found',404);
    }
##################################################################################################################################
public function getCourses($team_num ,$team_name){
    if($team_num == 1 && $team_name == 'null'){
       $course = First_courses_General::all();
       return $this->apiResponse($course,'Done',201);
    }
    elseif($team_num == 2 && $team_name == 'null'){
        $course = Second_courses_General::all();
        return $this->apiResponse($course,'Done',201);
     }

    elseif($team_num == 3 && $team_name == 'cs'){
        $course = ThirdCs_courses_General::all();
        return $this->apiResponse($course,'Done',201);
     }

     elseif($team_num == 3 && $team_name == 'is'){
        $course = ThirdIs_courses_General::all();
        return $this->apiResponse($course,'Done',201);
     }

     elseif($team_num == 3 && $team_name == 'it'){
        $course = ThirdIt_courses_General::all();
        return $this->apiResponse($course,'Done',201);
     }

    else if($team_num == 4 && $team_name == 'cs'){
        $course = FourthCs_courses_General::all();
        return $this->apiResponse($course,'Done',201);
     }

     else if($team_num == 4 && $team_name == 'is'){
        $course = FourthIs_courses_General::all();
        return $this->apiResponse($course,'Done',201);
     }

     else if($team_num == 4 && $team_name == 'it'){
        $course = FourthIt_courses_General::all();
        return $this->apiResponse($course,'Done',201);
     }
    else
       return $this->apiResponse(null,'Not Found',404);
   }    
#################################################################################################################################
       public function UpdateCourse(Request $request,$team_num,$id,$team_name){

    $vaildator = Validator::make($request->all(),[
        'course_name'=>'required',
        'course_num'=>'required',
        'credit_hour_course'=>'required',
        'previous_course_name'=>'required',
        
    ]);

    if($vaildator->fails()){
        return $this->apiResponse(null,$vaildator->errors(),404);
    }

    if($team_num == 1 && $team_name == 'null'){
        $course = First_courses_General::find($id);
        if(!$course){
            return $this->apiResponse(null,'Not Found',404);
        }
        $course->update([
            'course_name'=>$request->course_name,
            'course_num'=>$request->course_num,
            'credit_hour_course'=>$request->credit_hour_course,
            'previous_course_name'=>$request->previous_course_name,
           
        ]);
        return $this->apiResponse($course,'Course Updated successfully',201);
    }

    elseif($team_num == 2 && $team_name == 'null'){
        $course = Second_courses_General::find($id);
        if(!$course){
            return $this->apiResponse(null,'Not Found',404);
        }
        $course->update([
            'course_name'=>$request->course_name,
            'course_num'=>$request->course_num,
            'credit_hour_course'=>$request->credit_hour_course,
            'previous_name_course'=>$request->previous_course_name,
            
        ]);
        return $this->apiResponse($course,'Course Updated successfully',201);
    }

    elseif($team_num == 3 && $team_name == 'cs'){
        $course = ThirdCs_courses_General::find($id);
        if(!$course){
            return $this->apiResponse(null,'Not Found',404);
        }
        $course->update([
            'course_name'=>$request->course_name,
            'course_num'=>$request->course_num,
            'credit_hour_course'=>$request->credit_hour_course,
            'previous_course_name'=>$request->previous_course_name,
            
        ]);
        return $this->apiResponse($course,'Course Updated successfully',201);
    }

    elseif($team_num == 3 && $team_name == 'is'){
        $course = ThirdIs_courses_General::find($id);
        if(!$course){
            return $this->apiResponse(null,'Not Found',404);
        }
        $course->update([
            'course_name'=>$request->course_name,
            'course_num'=>$request->course_num,
            'credit_hour_course'=>$request->credit_hour_course,
            'previous_course_name'=>$request->previous_course_name,
            
        ]);
        return $this->apiResponse($course,'Course Updated successfully',201);
    }

    elseif($team_num == 3 && $team_name == 'it'){
        $course = ThirdIt_courses_General::find($id);
        if(!$course){
            return $this->apiResponse(null,'Not Found',404);
        }
        $course->update([
            'course_name'=>$request->course_name,
            'course_num'=>$request->course_num,
            'credit_hour_course'=>$request->credit_hour_course,
            'previous_course_name'=>$request->previous_course_name,
            
        ]);
        return $this->apiResponse($course,'Course Updated successfully',201);
    }

    elseif($team_num == 4 && $team_name == 'cs'){
        $course = FourthCs_courses_General::find($id);
        if(!$course){
            return $this->apiResponse(null,'Not Found',404);
        }
        $course->update([
            'course_name'=>$request->course_name,
            'course_num'=>$request->course_num,
            'credit_hour_course'=>$request->credit_hour_course,
            'previous_course_name'=>$request->previous_course_name,
            
        ]);
          return $this->apiResponse($course,'Course Updated successfully',201);
    }

    elseif($team_num == 4 && $team_name == 'is'){
        $course = FourthIs_courses_General::find($id);
        if(!$course){
            return $this->apiResponse(null,'Not Found',404);
        }
        $course->update([
            'course_name'=>$request->course_name,
            'course_num'=>$request->course_num,
            'credit_hour_course'=>$request->credit_hour_course,
            'previous_course_name'=>$request->previous_course_name,
            
        ]);
          return $this->apiResponse($course,'Course Updated successfully',201);
    }

    elseif($team_num == 4 && $team_name == 'it'){
        $course = FourthIt_courses_General::find($id);
        if(!$course){
            return $this->apiResponse(null,'Not Found',404);
        }
        $course->update([
            'course_name'=>$request->course_name,
            'course_num'=>$request->course_num,
            'credit_hour_course'=>$request->credit_hour_course,
            'previous_course_name'=>$request->previous_course_name,
            
        ]);
          return $this->apiResponse($course,'Course Updated successfully',201);
    }
    else
          return $this->apiResponse(null,'Not Found',404);
}
#################################################################################################################################
    public function DeleteCourse($team_num,$id,$team_name){
        if($team_num == 1 && $team_name == 'null'){
            $course = First_courses_General::find($id);
            if(!$course){
                return $this->apiResponse(null,'Not Found',404);
            }
            $course->delete();
            return $this->apiResponse(null,'Course Deleted successfully',201);
        }

        elseif($team_num == 2 && $team_name == 'null'){
            $course = Second_courses_General::find($id);
            if(!$course){
                return $this->apiResponse(null,'Not Found',404);
            }
            $course->delete();
            return $this->apiResponse(null,'Course Deleted successfully',201);
        }

        elseif($team_num == 3 && $team_name == 'cs'){
            $course = ThirdCs_courses_General::find($id);
            if(!$course){
                return $this->apiResponse(null,'Not Found',404);
            }
            $course->delete();
            return $this->apiResponse(null,'Course Deleted successfully',201);
        }

        elseif($team_num == 3 && $team_name == 'is'){
            $course = ThirdIs_courses_General::find($id);
            if(!$course){
                return $this->apiResponse(null,'Not Found',404);
            }
            $course->delete();
            return $this->apiResponse(null,'Course Deleted successfully',201);
        }

        elseif($team_num == 3 && $team_name == 'it'){
            $course = ThirdIt_courses_General::find($id);
            if(!$course){
                return $this->apiResponse(null,'Not Found',404);
            }
            $course->delete();
            return $this->apiResponse(null,'Course Deleted successfully',201);
        }

        elseif($team_num == 4 && $team_name == 'cs'){
            $course = FourthCs_courses_General::find($id);
            if(!$course){
                return $this->apiResponse(null,'Not Found',404);
            }
            $course->delete();
                return $this->apiResponse(null,'Course Deleted successfully',201);
        }

        elseif($team_num == 4 && $team_name == 'is'){
            $course = FourthIs_courses_General::find($id);
            if(!$course){
                return $this->apiResponse(null,'Not Found',404);
            }
            $course->delete();
                return $this->apiResponse(null,'Course Deleted successfully',201);
        }

        elseif($team_num == 4 && $team_name == 'it'){
            $course = FourthIt_courses_General::find($id);
            if(!$course){
                return $this->apiResponse(null,'Not Found',404);
            }
            $course->delete();
                return $this->apiResponse(null,'Course Deleted successfully',201);
        }
}
#################################################################################################################################
    public function uploadFile(Request $request,$team_num,$team_name){
        $vaildator = Validator::make($request->all(),[
            'title'=>'required',
            'file'=>'required|file|mimes:pdf|max:2048',
        ]);
        if($vaildator->fails()){
                 return $this->apiResponse(null,$vaildator->errors(),404);
        }
        if($team_num == 1 && $team_name == 'null'){
            $file = $request->file('file')->getClientOriginalName();
            $title = $request->file('file')->store('public/bio/uploads');
            $files = First_examnation_general::create([
                'title'=>$request->title,
                'file'=>$file
            ]);
                 return $this->apiResponse($files, 'file save successfully', 201);
        }
        elseif($team_num == 2 && $team_name == 'null'){
            $file = $request->file('file')->getClientOriginalName();
            $title = $request->file('file')->store('public/bio/uploads');
            $files = Second_examnation_general::create([
                'title'=>$request->title,
                'file'=>$file
            ]);
                 return $this->apiResponse($files, 'file save successfully', 201);
        }

        elseif($team_num == 3 && $team_name == 'cs'){
            $file = $request->file('file')->getClientOriginalName();
            $title = $request->file('file')->store('public/bio/uploads');
            $files = ThirdCs_examnation_general::create([
                'title'=>$request->title,
                'file'=>$file
            ]);
                  return $this->apiResponse($files, 'file save successfully', 201);
        }

        elseif($team_num == 3 && $team_name == 'is'){
            $file = $request->file('file')->getClientOriginalName();
            $title = $request->file('file')->store('public/general/uploads');
            $files = ThirdIs_examnation_general::create([
                'title'=>$request->title,
                'file'=>$file
            ]);
                  return $this->apiResponse($files, 'file save successfully', 201);
        }

        elseif($team_num == 3 && $team_name == 'it'){
            $file = $request->file('file')->getClientOriginalName();
            $title = $request->file('file')->store('public/general/uploads');
            $files = ThirdIt_examnation_general::create([
                'title'=>$request->title,
                'file'=>$file
            ]);
                  return $this->apiResponse($files, 'file save successfully', 201);
        }

        elseif($team_num == 4 && $team_name == 'cs'){
            $file = $request->file('file')->getClientOriginalName();
            $title = $request->file('file')->store('public/general/uploads');
            $files = FourthCs_examnation_general::create([
                'title'=>$request->title,
                'file'=>$file
            ]);
                 return $this->apiResponse($files, 'file created successfully', 201);
        }  

        elseif($team_num == 4 && $team_name == 'is'){
            $file = $request->file('file')->getClientOriginalName();
            $title = $request->file('file')->store('public/general/uploads');
            $files = FourthIs_examnation_general::create([
                'title'=>$request->title,
                'file'=>$file
            ]);
                 return $this->apiResponse($files, 'file created successfully', 201);
        }  

        elseif($team_num == 4 && $team_name == 'cs'){
            $file = $request->file('file')->getClientOriginalName();
            $title = $request->file('file')->store('public/general/uploads');
            $files = FourthIt_examnation_general::create([
                'title'=>$request->title,
                'file'=>$file
            ]);
                 return $this->apiResponse($files, 'file created successfully', 201);
        }  
        else
                 return $this->apiResponse(null, 'Not Found', 400);
    }
#################################################################################################################################    
    public function getFile($team_num,$team_name){
        if($team_num == 1 && $team_name == 'null'){
          $exam = First_examnation_general::all();
          return $this->apiResponse($exam,'Done',201);
        }

        else if($team_num == 2 && $team_name == 'null'){
            $exam = Second_examnation_general::all();
            return $this->apiResponse($exam,'Done',201);
          }

        else if($team_num == 3 && $team_name == 'cs'){
            $exam = ThirdCs_examnation_general::all();
            return $this->apiResponse($exam,'Done',201);
          }

          else if($team_num == 3 && $team_name == 'is'){
            $exam = ThirdIs_examnation_general::all();
            return $this->apiResponse($exam,'Done',201);
          }

          else if($team_num == 3 && $team_name == 'it'){
            $exam = ThirdIt_examnation_general::all();
            return $this->apiResponse($exam,'Done',201);
          }

        else if($team_num == 4 && $team_name == 'cs'){
            $exam = FourthCs_examnation_general::all();
            return $this->apiResponse($exam,'Done',201);
          }

          else if($team_num == 4 && $team_name == 'is'){
            $exam = FourthIs_examnation_general::all();
            return $this->apiResponse($exam,'Done',201);
          }

          else if($team_num == 4 && $team_name == 'it'){
            $exam = FourthIt_examnation_general::all();
            return $this->apiResponse($exam,'Done',201);
          }
        else
                return $this->apiResponse(null,' Num Not Found',404);
    }
#################################################################################################################################
    public function UpdateFile(Request $request,$team_num,$id,$team_name){
        $vaildator = Validator::make($request->all(),[
            'title'=>'required',
            'file'=>'required|file|mimes:pdf|max:2048',
           
        ]);
    
        if($vaildator->fails()){
            return $this->apiResponse(null,$vaildator->errors(),404);
        }
            if($team_num == 1 && $team_name == 'null') {
                $file = First_examnation_general::find($id);
                if(!$file) {
                    return $this->apiResponse(null, 'Not Found', 404);
                }
                $file->update([
                    'title'=>$request->title,
                    'file'=>$request->file('file')->getClientOriginalName()
                ]);
                return $this->apiResponse($file, 'File Updated Successfully', 201);
            }

        elseif($team_num == 2 && $team_name == 'null'){
            $file = Second_examnation_general::find($id);
            if(!$file){
                return $this->apiResponse(null,'Not Found',404);
            }
            $file->update([
                'title'=>$request->title,
                'file'=>$request->file('file')->getClientOriginalName()
            ]);
                return $this->apiResponse($file,'File Updated Successfully',201);
        }

        elseif($team_num == 3 && $team_name == 'cs'){
            $file = ThirdCs_examnation_general::find($id);
            if(!$file){
                return $this->apiResponse(null,'Not Found',404);
            }
            $file->update([
                'title'=>$request->title,
                'file'=>$request->file('file')->getClientOriginalName()
            ]);
                return $this->apiResponse($file,'File Updated Successfully',201);
        }

        elseif($team_num == 3 && $team_name == 'is'){
            $file = ThirdIs_examnation_general::find($id);
            if(!$file){
                return $this->apiResponse(null,'Not Found',404);
            }
            $file->update([
                'title'=>$request->title,
                'file'=>$request->file('file')->getClientOriginalName()
            ]);
                return $this->apiResponse($file,'File Updated Successfully',201);
        }

        elseif($team_num == 3 && $team_name == 'it'){
            $file = ThirdIt_examnation_general::find($id);
            if(!$file){
                return $this->apiResponse(null,'Not Found',404);
            }
            $file->update([
                'title'=>$request->title,
                'file'=>$request->file('file')->getClientOriginalName()
            ]);
                return $this->apiResponse($file,'File Updated Successfully',201);
        }

        elseif($team_num == 4 && $team_name == 'cs'){
            $file = FourthCs_examnation_general::find($id);
            if(!$file){
                return $this->apiResponse(null,'Not Found',404);
            }
            $file->update([
                'title'=>$request->title,
                'file'=>$request->file('file')->getClientOriginalName()
            ]);
                return $this->apiResponse($file,'File Updated Successfully',201);
        }

        elseif($team_num == 4 && $team_name == 'is'){
            $file = FourthIs_examnation_general::find($id);
            if(!$file){
                return $this->apiResponse(null,'Not Found',404);
            }
            $file->update([
                'title'=>$request->title,
                'file'=>$request->file('file')->getClientOriginalName()
            ]);
                return $this->apiResponse($file,'File Updated Successfully',201);
        }

        elseif($team_num == 4 && $team_name == 'it'){
            $file = FourthIt_examnation_general::find($id);
            if(!$file){
                return $this->apiResponse(null,'Not Found',404);
            }
            $file->update([
                'title'=>$request->title,
                'file'=>$request->file('file')->getClientOriginalName()
            ]);
                return $this->apiResponse($file,'File Updated Successfully',201);
        }
        else
                return $this->apiResponse(null,' Num Not Found',404);
    }
##################################################################################################################################
    public function DeleteFile($team_num,$id,$team_name){
        if($team_num == 1 && $team_name == 'null'){
            $file = First_examnation_general::find($id);
            if(!$file){
                return $this->apiResponse(null,'Not Found',404);
            }
            $file->delete();
                return $this->apiResponse(null,'File Deleted Successfully',201);
        }

        elseif($team_num == 2 && $team_name == 'null'){
            $file = Second_examnation_general::find($id);
            if(!$file){
                return $this->apiResponse(null,'Not Found',404);
            }
            $file->delete();
                return $this->apiResponse(null,'File Deleted Successfully',201);
        }

        elseif($team_num == 3 && $team_name == 'cs'){
            $file = ThirdCs_examnation_general::find($id);
            if(!$file){
                return $this->apiResponse(null,'Not Found',404);
            }
            $file->delete();
                return $this->apiResponse(null,'File Deleted Successfully',201);
        }

        elseif($team_num == 3 && $team_name == 'is'){
            $file = ThirdIs_examnation_general::find($id);
            if(!$file){
                return $this->apiResponse(null,'Not Found',404);
            }
            $file->delete();
                return $this->apiResponse(null,'File Deleted Successfully',201);
        }

        elseif($team_num == 3 && $team_name == 'it'){
            $file = ThirdIt_examnation_general::find($id);
            if(!$file){
                return $this->apiResponse(null,'Not Found',404);
            }
            $file->delete();
                return $this->apiResponse(null,'File Deleted Successfully',201);
        }

        elseif($team_num == 4 && $team_name == 'cs'){
            $file = FourthCs_examnation_general::find($id);
            if(!$file){
                return $this->apiResponse(null,'Not Found',404);
            }
            $file->delete();
                return $this->apiResponse(null,'File Deleted Successfully',201);
        }

        elseif($team_num == 4 && $team_name == 'is'){
            $file = FourthIs_examnation_general::find($id);
            if(!$file){
                return $this->apiResponse(null,'Not Found',404);
            }
            $file->delete();
                return $this->apiResponse(null,'File Deleted Successfully',201);
        }

        elseif($team_num == 4 && $team_name == 'it'){
            $file = FourthIt_examnation_general::find($id);
            if(!$file){
                return $this->apiResponse(null,'Not Found',404);
            }
            $file->delete();
                return $this->apiResponse(null,'File Deleted Successfully',201);
        }
        else
                return $this->apiResponse(null,'Num Not Found',404);

    }
}
