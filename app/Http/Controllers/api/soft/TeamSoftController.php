<?php

namespace App\Http\Controllers\api\soft;

use App\Http\Controllers\api\TraitResponse;
use App\Http\Controllers\Controller;
use App\Models\soft\First_courses_Soft;
use App\Models\soft\First_examnation_soft;
use App\Models\soft\First_Soft;
use App\Models\soft\Fourth_courses_Soft;
use App\Models\soft\Fourth_examnation_soft;
use App\Models\soft\Fourth_Soft;
use App\Models\soft\Second_courses_Soft;
use App\Models\soft\Second_examnation_soft;
use App\Models\soft\Second_Soft;
use App\Models\soft\Third_courses_Soft;
use App\Models\soft\Third_examnation_soft;
use App\Models\soft\Third_Soft;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TeamSoftController extends Controller
{
    use TraitResponse;
    public function UploadImage(Request $request, $team_num ){
        $vaildator = Validator::make($request->all(),[
            'image'=>'required|image|mimes:png,jpg,jpeg'
        ]);
        if($vaildator->fails()){
            return $this->apiResponse(null,$vaildator->errors(),404);
        }
    if($team_num == 1) {
        $image = $request->file('image')->getClientOriginalName();
        $title = $request->file('image')->storeAs('public/soft/uploads',$image);
        $save = First_Soft::create([
            'image'=>$image
        ]);
        return $this->apiResponse($save, 'Image save successfully', 201);
    }

    elseif($team_num == 2){
        $vaildator = Validator::make($request->all(),[
            'image'=>'required|image|mimes:png,jpg,jpeg'
        ]);

        $image = $request->file('image')->getClientOriginalName();
        $title = $request->file('image')->store('public/soft/uploads');
        $save = Second_Soft::create([
            'image'=>$image
        ]);
        return $this->apiResponse($save, 'Image save successfully', 201);

    }

    elseif($team_num ==3){
        $vaildator = Validator::make($request->all(),[
            'image'=>'required|image|mimes:png,jpg,jpeg'
        ]);

        $image = $request->file('image')->getClientOriginalName();
        $title = $request->file('image')->store('public/soft/uploads');
        $save = Third_Soft::create([
            'image'=>$image
        ]);
        return $this->apiResponse($save, 'Image save successfully', 201);

    }

    elseif($team_num ==4){
        $vaildator = Validator::make($request->all(),[
            'image'=>'required|image|mimes:png,jpg,jpeg'
        ]);

        $image = $request->file('image')->getClientOriginalName();
        $title = $request->file('image')->store('public/soft/uploads');
        $save = Fourth_Soft::create([
            'image'=>$image
        ]);
        return $this->apiResponse($save, 'Image save successfully', 201);

    }
    else 
    return $this->apiResponse(null,'Not Found',404);

    }

 #############################################################################################################################
 
    public function getImage($team_num,$id){

        if($team_num ==1){
            $image = First_Soft::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $imageonly = First_Soft::where('id',$id)->pluck('image');
            return $this->apiResponse($imageonly,'Done',201);
        }

        elseif($team_num == 2){
            $image = Second_Soft::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $imageonly = Second_Soft::where('id',$id)->pluck('image');
            return $this->apiResponse($imageonly,'Done',201);
        }

        elseif($team_num == 3){
            $image = Third_Soft::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $imageonly = Third_Soft::where('id',$id)->pluck('image');
            return $this->apiResponse($imageonly,'Done',201);
        }

        elseif($team_num == 4){
            $image = Fourth_Soft::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $imageonly = Fourth_Soft::where('id',$id)->pluck('image');
            return $this->apiResponse($imageonly,'Done',201);
        }
        else
        return $this->apiResponse(null,' Num Not Found',404);

    }
 ##############################################################################################################################
    public function UpdateImage( Request $request,$team_num,$id){
        $vaildator = Validator::make($request->all(),[
            'image'=>'required|image|mimes:png,jpg'
        ]);
        if($vaildator->fails()){
            return $this->apiResponse(null,$vaildator->errors(),404);
        }
        if($team_num == 1){
            $image = First_Soft::find($id);
            if(!$image){
             return $this->apiResponse(null,'Not Found',404);
            }
            
            $image->update([
                'image'=>$request->file('image')->getClientOriginalName(),
              ]);
            return $this->apiResponse($image,'Image Updated Successfully',201);
        }

        elseif($team_num == 2){
            $image = Second_Soft::find($id);
            if(!$image){
             return $this->apiResponse(null,'Not Found',404);
            }
            
            $image->update([
                'image'=>$request->file('image')->getClientOriginalName(),
              ]);
            return $this->apiResponse($image,'Image Updated Successfully',201);
        }

        elseif($team_num == 3){
            $image = Third_Soft::find($id);
            if(!$image){
             return $this->apiResponse(null,'Not Found',404);
            }
            
            $image->update([
                'image'=>$request->file('image')->getClientOriginalName(),
              ]);
            return $this->apiResponse($image,'Image Updated Successfully',201);
        }

        elseif($team_num == 4){
            $image = Fourth_Soft::find($id);
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
    public function DeleteImage($team_num,$id){
        if($team_num == 1){
            $image = First_Soft::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $image->delete();
            return $this->apiResponse(null,'Image Deleted Successfully',201);
        }

        elseif($team_num == 2){
            $image = Second_Soft::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $image->delete();
            return $this->apiResponse(null,'Image Deleted Successfully',201);
        }

        elseif($team_num == 3){
            $image = Third_Soft::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $image->delete();
            return $this->apiResponse(null,'Image Deleted Successfully',201);
        }

        elseif($team_num == 4){
            $image = Third_Soft::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $image->delete();
            return $this->apiResponse(null,'Image Deleted Successfully',201);
        }

    }

##############################################################################################################################
    public function UploadCourses(Request $request, $team_num){

        $vaildator = Validator::make($request->all(),[
            'course_name'=>'required',
            'course_num'=>'required',
            'credit_hour_course'=>'required',
            'previous_course_name'=>'required',
        ]);

        if($vaildator->fails()){
            return $this->apiResponse(null,$vaildator->errors(),404);
        }
        if($team_num == 1){
            $course = First_courses_Soft::create([
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

        elseif($team_num == 2){
            $course = Second_courses_Soft::create([
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

        elseif($team_num == 3){
            $course = Third_courses_Soft::create([
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

        elseif($team_num == 4){
            $course = Fourth_courses_Soft::create([
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
public function getCourses($team_num){
    if($team_num == 1){
       $course = First_courses_Soft::all();
       return $this->apiResponse($course,'Done',201);
    }
    elseif($team_num == 2){
        $course = Second_courses_Soft::all();
        return $this->apiResponse($course,'Done',201);
     }

    elseif($team_num == 3){
        $course = Third_courses_Soft::all();
        return $this->apiResponse($course,'Done',201);
     }
    else if($team_num == 3){
        $course = Fourth_courses_Soft::all();
        return $this->apiResponse($course,'Done',201);
     }
    else
       return $this->apiResponse(null,'Not Found',404);
   }    
#################################################################################################################################
       public function UpdateCourse(Request $request,$team_num,$id){

    $vaildator = Validator::make($request->all(),[
        'course_name'=>'required',
        'course_num'=>'required',
        'credit_hour_course'=>'required',
        'previous_course_name'=>'required',
    ]);

    if($vaildator->fails()){
        return $this->apiResponse(null,$vaildator->errors(),404);
    }

    if($team_num == 1){
        $course = First_courses_Soft::find($id);
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

    elseif($team_num == 2){
        $course = Second_courses_Soft::find($id);
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

    elseif($team_num == 3){
        $course = Third_courses_Soft::find($id);
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

    elseif($team_num == 4){
        $course = Fourth_courses_Soft::find($id);
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
    public function DeleteCourse($team_num,$id){
        if($team_num == 1){
            $course = First_courses_Soft::find($id);
            if(!$course){
                return $this->apiResponse(null,'Not Found',404);
            }
            $course->delete();
            return $this->apiResponse(null,'Course Deleted successfully',201);
        }

        elseif($team_num == 2){
            $course = Second_courses_Soft::find($id);
            if(!$course){
                return $this->apiResponse(null,'Not Found',404);
            }
            $course->delete();
            return $this->apiResponse(null,'Course Deleted successfully',201);
        }

        elseif($team_num == 3){
            $course = Third_courses_Soft::find($id);
            if(!$course){
                return $this->apiResponse(null,'Not Found',404);
            }
            $course->delete();
            return $this->apiResponse(null,'Course Deleted successfully',201);
        }

        elseif($team_num == 4){
            $course = Fourth_courses_Soft::find($id);
            if(!$course){
                return $this->apiResponse(null,'Not Found',404);
            }
            $course->delete();
                return $this->apiResponse(null,'Course Deleted successfully',201);
        }
}
#################################################################################################################################
    public function uploadFile(Request $request,$team_num){
        $vaildator = Validator::make($request->all(),[
            'title'=>'required',
            'file'=>'required|file|mimes:pdf|max:2048',
        ]);
        if($vaildator->fails()){
                 return $this->apiResponse(null,$vaildator->errors(),404);
        }
        if($team_num == 1){
            $file = $request->file('file')->getClientOriginalName();
            $title = $request->file('file')->store('public/soft/uploads');
            $files = First_examnation_soft::create([
                'title'=>$request->title,
                'file'=>$file
            ]);
                 return $this->apiResponse($files, 'file save successfully', 201);
        }
        elseif($team_num == 2){
            $file = $request->file('file')->getClientOriginalName();
            $title = $request->file('file')->store('public/soft/uploads');
            $files = Second_examnation_soft::create([
                'title'=>$request->title,
                'file'=>$file
            ]);
                 return $this->apiResponse($files, 'file save successfully', 201);
        }

        elseif($team_num == 3){
            $file = $request->file('file')->getClientOriginalName();
            $title = $request->file('file')->store('public/soft/uploads');
            $files = Third_examnation_soft::create([
                'title'=>$request->title,
                'file'=>$file
            ]);
                  return $this->apiResponse($files, 'file save successfully', 201);
        }

        elseif($team_num == 4){
            $file = $request->file('file')->getClientOriginalName();
            $title = $request->file('file')->store('public/soft/uploads');
            $files = Fourth_examnation_soft::create([
                'title'=>$request->title,
                'file'=>$file
            ]);
                 return $this->apiResponse($files, 'file created successfully', 201);
        }  
        else
                 return $this->apiResponse(null, 'Not Found', 400);
    }
#################################################################################################################################    
    public function getFile($team_num){
        if($team_num == 1){
          $exam = First_examnation_soft::all();
          return $this->apiResponse($exam,'Done',201);
        }

        else if($team_num == 2){
            $exam = Second_examnation_soft::all();
            return $this->apiResponse($exam,'Done',201);
          }

        else if($team_num == 3){
            $exam = Third_examnation_soft::all();
            return $this->apiResponse($exam,'Done',201);
          }

        else if($team_num == 4){
            $exam = Fourth_examnation_soft::all();
            return $this->apiResponse($exam,'Done',201);
          }
        else
                return $this->apiResponse(null,' Num Not Found',404);
    }
#################################################################################################################################
    public function UpdateFile(Request $request,$team_num,$id){
        $vaildator = Validator::make($request->all(),[
            'title'=>'required',
            'file'=>'required|file|mimes:pdf|max:2048',
           
        ]);
    
        if($vaildator->fails()){
            return $this->apiResponse(null,$vaildator->errors(),404);
        }
            if($team_num == 1) {
                $file = First_examnation_soft::find($id);
                if(!$file) {
                    return $this->apiResponse(null, 'Not Found', 404);
                }
                $file->update([
                    'title'=>$request->title,
                    'file'=>$request->file('file')->getClientOriginalName()
                ]);
                return $this->apiResponse($file, 'File Updated Successfully', 201);
            }

        elseif($team_num == 2){
            $file = Second_examnation_soft::find($id);
            if(!$file){
                return $this->apiResponse(null,'Not Found',404);
            }
            $file->update([
                'title'=>$request->title,
                'file'=>$request->file('file')->getClientOriginalName()
            ]);
                return $this->apiResponse($file,'File Updated Successfully',201);
        }

        elseif($team_num == 3){
            $file = Third_examnation_soft::find($id);
            if(!$file){
                return $this->apiResponse(null,'Not Found',404);
            }
            $file->update([
                'title'=>$request->title,
                'file'=>$request->file('file')->getClientOriginalName()
            ]);
                return $this->apiResponse($file,'File Updated Successfully',201);
        }

        elseif($team_num == 4){
            $file = Fourth_examnation_soft::find($id);
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
    public function DeleteFile($team_num,$id){
        if($team_num == 1){
            $file = First_examnation_soft::find($id);
            if(!$file){
                return $this->apiResponse(null,'Not Found',404);
            }
            $file->delete();
                return $this->apiResponse(null,'File Deleted Successfully',201);
        }

        elseif($team_num == 2){
            $file = Second_examnation_soft::find($id);
            if(!$file){
                return $this->apiResponse(null,'Not Found',404);
            }
            $file->delete();
                return $this->apiResponse(null,'File Deleted Successfully',201);
        }

        elseif($team_num == 3){
            $file = Third_examnation_soft::find($id);
            if(!$file){
                return $this->apiResponse(null,'Not Found',404);
            }
            $file->delete();
                return $this->apiResponse(null,'File Deleted Successfully',201);
        }

        elseif($team_num == 4){
            $file = Fourth_examnation_soft::find($id);
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
