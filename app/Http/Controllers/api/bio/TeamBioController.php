<?php

namespace App\Http\Controllers\api\bio;

use App\Http\Controllers\api\TraitResponse;
use App\Http\Controllers\Controller;
use App\Models\bio\First_Bio;
use App\Models\bio\First_courses_Bio;
use App\Models\bio\First_examnation_bio;
use App\Models\bio\Fourth_Bio;
use App\Models\bio\Fourth_courses_Bio;
use App\Models\bio\Fourth_examnation_bio;
use App\Models\bio\Second_Bio;
use App\Models\bio\Second_courses_Bio;
use App\Models\bio\Second_examnation_bio;
use App\Models\bio\Third_Bio;
use App\Models\bio\Third_courses_Bio;
use App\Models\bio\Third_examnation_bio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamBioController extends Controller
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
        $title = $request->file('image')->storeAs('public/bio/uploads',$image);
        $save = First_Bio::create([
            'image'=>$image
        ]);
        return $this->apiResponse($save, 'Image save successfully', 201);
    }

    elseif($team_num == 2){
        $vaildator = Validator::make($request->all(),[
            'image'=>'required|image|mimes:png,jpg,jpeg'
        ]);

        $image = $request->file('image')->getClientOriginalName();
        $title = $request->file('image')->store('public/bio/uploads');
        $save = Second_Bio::create([
            'image'=>$image
        ]);
        return $this->apiResponse($save, 'Image save successfully', 201);

    }

    elseif($team_num ==3){
        $vaildator = Validator::make($request->all(),[
            'image'=>'required|image|mimes:png,jpg,jpeg'
        ]);

        $image = $request->file('image')->getClientOriginalName();
        $title = $request->file('image')->store('public/bio/uploads');
        $save = Third_Bio::create([
            'image'=>$image
        ]);
        return $this->apiResponse($save, 'Image save successfully', 201);

    }

    elseif($team_num ==4){
        $vaildator = Validator::make($request->all(),[
            'image'=>'required|image|mimes:png,jpg,jpeg'
        ]);

        $image = $request->file('image')->getClientOriginalName();
        $title = $request->file('image')->store('public/bio/uploads');
        $save = Fourth_Bio::create([
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
            $image = First_Bio::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $imageonly = First_Bio::where('id',$id)->pluck('image');
            return $this->apiResponse($imageonly,'Done',201);
        }

        elseif($team_num == 2){
            $image = Second_Bio::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $imageonly = Second_Bio::where('id',$id)->pluck('image');
            return $this->apiResponse($imageonly,'Done',201);
        }

        elseif($team_num == 3){
            $image = Third_Bio::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $imageonly = Third_Bio::where('id',$id)->pluck('image');
            return $this->apiResponse($imageonly,'Done',201);
        }

        elseif($team_num == 4){
            $image = Fourth_Bio::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $imageonly = Fourth_Bio::where('id',$id)->pluck('image');
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
            $image = First_Bio::find($id);
            if(!$image){
             return $this->apiResponse(null,'Not Found',404);
            }
            
            $image->update([
                'image'=>$request->file('image')->getClientOriginalName(),
              ]);
            return $this->apiResponse($image,'Image Updated Successfully',201);
        }

        elseif($team_num == 2){
            $image = Second_Bio::find($id);
            if(!$image){
             return $this->apiResponse(null,'Not Found',404);
            }
            
            $image->update([
                'image'=>$request->file('image')->getClientOriginalName(),
              ]);
            return $this->apiResponse($image,'Image Updated Successfully',201);
        }

        elseif($team_num == 3){
            $image = Third_Bio::find($id);
            if(!$image){
             return $this->apiResponse(null,'Not Found',404);
            }
            
            $image->update([
                'image'=>$request->file('image')->getClientOriginalName(),
              ]);
            return $this->apiResponse($image,'Image Updated Successfully',201);
        }

        elseif($team_num == 4){
            $image = Fourth_Bio::find($id);
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
            $image = First_Bio::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $image->delete();
            return $this->apiResponse(null,'Image Deleted Successfully',201);
        }

        elseif($team_num == 2){
            $image = Second_Bio::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $image->delete();
            return $this->apiResponse(null,'Image Deleted Successfully',201);
        }

        elseif($team_num == 3){
            $image = Third_Bio::find($id);
            if(!$image){
                return $this->apiResponse(null,'Not Found',404);
            }
            $image->delete();
            return $this->apiResponse(null,'Image Deleted Successfully',201);
        }

        elseif($team_num == 4){
            $image = Fourth_Bio::find($id);
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
            $course = First_courses_Bio::create([
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
            $course = Second_courses_Bio::create([
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
            $course = Third_courses_Bio::create([
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
            $course = Fourth_courses_Bio::create([
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
       $course = First_courses_Bio::all();
       return $this->apiResponse($course,'Done',201);
    }
    elseif($team_num == 2){
        $course = Second_courses_Bio::all();
        return $this->apiResponse($course,'Done',201);
     }

    elseif($team_num == 3){
        $course = Third_courses_Bio::all();
        return $this->apiResponse($course,'Done',201);
     }
    else if($team_num == 3){
        $course = Fourth_courses_Bio::all();
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
        $course = First_courses_Bio::find($id);
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
        $course = Second_courses_Bio::find($id);
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
        $course = Third_courses_Bio::find($id);
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
        $course = Fourth_courses_Bio::find($id);
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
            $course = First_courses_Bio::find($id);
            if(!$course){
                return $this->apiResponse(null,'Not Found',404);
            }
            $course->delete();
            return $this->apiResponse(null,'Course Deleted successfully',201);
        }

        elseif($team_num == 2){
            $course = Second_courses_Bio::find($id);
            if(!$course){
                return $this->apiResponse(null,'Not Found',404);
            }
            $course->delete();
            return $this->apiResponse(null,'Course Deleted successfully',201);
        }

        elseif($team_num == 3){
            $course = Third_courses_Bio::find($id);
            if(!$course){
                return $this->apiResponse(null,'Not Found',404);
            }
            $course->delete();
            return $this->apiResponse(null,'Course Deleted successfully',201);
        }

        elseif($team_num == 4){
            $course = Fourth_courses_Bio::find($id);
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
            $title = $request->file('file')->store('public/bio/uploads');
            $files = First_examnation_bio::create([
                'title'=>$request->title,
                'file'=>$file
            ]);
                 return $this->apiResponse($files, 'file save successfully', 201);
        }
        elseif($team_num == 2){
            $file = $request->file('file')->getClientOriginalName();
            $title = $request->file('file')->store('public/bio/uploads');
            $files = Second_examnation_bio::create([
                'title'=>$request->title,
                'file'=>$file
            ]);
                 return $this->apiResponse($files, 'file save successfully', 201);
        }

        elseif($team_num == 3){
            $file = $request->file('file')->getClientOriginalName();
            $title = $request->file('file')->store('public/bio/uploads');
            $files = Third_examnation_bio::create([
                'title'=>$request->title,
                'file'=>$file
            ]);
                  return $this->apiResponse($files, 'file save successfully', 201);
        }

        elseif($team_num == 4){
            $file = $request->file('file')->getClientOriginalName();
            $title = $request->file('file')->store('public/bio/uploads');
            $files = Fourth_examnation_bio::create([
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
          $exam = First_examnation_bio::all();
          return $this->apiResponse($exam,'Done',201);
        }

        else if($team_num == 2){
            $exam = Second_examnation_bio::all();
            return $this->apiResponse($exam,'Done',201);
          }

        else if($team_num == 3){
            $exam = Third_examnation_bio::all();
            return $this->apiResponse($exam,'Done',201);
          }

        else if($team_num == 4){
            $exam = Fourth_examnation_bio::all();
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
                $file = First_examnation_bio::find($id);
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
            $file = Second_examnation_bio::find($id);
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
            $file = Third_examnation_bio::find($id);
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
            $file = Fourth_examnation_bio::find($id);
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
            $file = First_examnation_bio::find($id);
            if(!$file){
                return $this->apiResponse(null,'Not Found',404);
            }
            $file->delete();
                return $this->apiResponse(null,'File Deleted Successfully',201);
        }

        elseif($team_num == 2){
            $file = Second_examnation_bio::find($id);
            if(!$file){
                return $this->apiResponse(null,'Not Found',404);
            }
            $file->delete();
                return $this->apiResponse(null,'File Deleted Successfully',201);
        }

        elseif($team_num == 3){
            $file = Third_examnation_bio::find($id);
            if(!$file){
                return $this->apiResponse(null,'Not Found',404);
            }
            $file->delete();
                return $this->apiResponse(null,'File Deleted Successfully',201);
        }

        elseif($team_num == 4){
            $file = Fourth_examnation_bio::find($id);
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
