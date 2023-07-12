<?php

use App\Http\Controllers\api\AdminController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\bio\CouncilBioController;
use App\Http\Controllers\api\bio\ManageController;
use App\Http\Controllers\api\bio\RegulationBioController;
use App\Http\Controllers\api\bio\TeamBioController;
use App\Http\Controllers\api\general\CollegecouncilController;
use App\Http\Controllers\api\general\ManagementGeneralController;
use App\Http\Controllers\api\general\StudentsAffairsontroller;
use App\Http\Controllers\api\general\CommunityServiceController;
use App\Http\Controllers\api\general\DiplomaController;
use App\Http\Controllers\api\general\RegulationController;
use App\Http\Controllers\api\general\GraduateStudiesontroller;
use App\Http\Controllers\api\general\TeamGeneralController;
use App\Http\Controllers\api\general\StudiesGraduateController;
use App\Http\Controllers\api\soft\ManageSoftController;
use App\Http\Controllers\api\soft\councilSoftController;
use App\Http\Controllers\api\soft\RegulationSoftController;
use App\Http\Controllers\api\soft\TeamSoftController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::group([
  'middleware' => 'api',
  'prefix' => 'auth'

], function ($router) {
  Route::post('/login', [AuthController::class, 'login']);
  Route::post('/register', [AuthController::class, 'register']);
  Route::post('/logout', [AuthController::class, 'logout']);
  Route::post('/refresh', [AuthController::class, 'refresh']);
  Route::get('/admin-profile', [AuthController::class, 'userProfile']);
});



Route::middleware('jwt.verify')->group(function(){

  ##########################################   General API  ##############################################
  Route::controller(ManagementGeneralController::class)->group(function(){
    Route::get('/get_general_manager', 'GetManager');
    Route::get('/show_general_manager/{id}', 'ShowManager');
    Route::post('/store_general_manager', 'StoreManager');
    Route::post('/update_general_manager/{id}','UpdateManager');
    Route::post('/delete_general_manager/{id}','DeleteManager');
});

Route::controller(TeamGeneralController::class)->group(function(){
  Route::post('upload_general_image/{team_num}/{team_name}','UploadImage');
  Route::get('get_general_image/{team_num}/{id}/{team_name}','getImage');
  Route::post('update_general_image/{team_num}/{id}/{team_name}','UpdateImage');
  Route::post('delete_general_image/{team_num}/{id}/{team_name}','DeleteImage');

  Route::post('upload_general_courses/{team_num}/{team_name}','UploadCourses');
  Route::get('get_general_courses/{team_num}/{team_name}','getCourses');
  Route::post('update_general_courses/{team_num}/{id}/{team_name}','UpdateCourse');
  Route::post('delete_general_courses/{team_num}/{id}/{team_name}','DeleteCourse');

  Route::post('upload_general_examnation/{team_num}/{team_name}','uploadFile');
  Route::get('get_general_examnation/{team_num}/{team_name}','getFile');
  Route::post('update_general_examnation/{team_num}/{id}/{team_name}','UpdateFile');
  Route::post('delete_general_examnation/{team_num}/{id}/{team_name}','DeleteFile');
});

Route::controller(StudiesGraduateController::class)->group(function(){
    Route::post('/uploadstudiesgraduatefile', 'uploadstudiesgraduatefile');
    Route::get('/ShowstudiesgraduateFile', 'ShowstudiesgraduateFile');
    Route::post('/UpdatestudiesgraduateFile/{id}', 'UpdatestudiesgraduateFile');
    Route::post('/deletestudiesgraduatefile/{id}', 'DeletestudiesgraduateFile');

});
Route::controller(StudentsAffairsontroller::class)->group(function(){
  Route::post('/uploadaffairfile', 'uploadfile');
  Route::get('/showaffairfile/{id}', 'ShowFile');
  Route::get('getaffair','getAffair');
  Route::post('/updateaffairfile/{id}', 'UpdateFile');
  Route::post('/deleteaffairfile/{id}','DeleteFile');

  Route::post('/uploadaffairmembers', 'uploadmembers');
  Route::get('/showaffairmembers', 'getMembers');
  Route::post('/updateaffairmembers/{id}', 'updatemembers');
  Route::post('/deleteaffairmembers/{id}','deletemembers');

  Route::post('/manageraffairupload', 'managerupload');
  Route::get('/showaffairbiofraphy', 'showbiofraphy');
  Route::post('/updateaffairbiography/{id}', 'updatebiography');
  Route::post('/deleteaffairbiography/{id}','deletebiography');

});

Route::controller(CommunityServiceController::class)->group(function(){
  Route::post('/uploadcommunityfile', 'uploadfile');
  Route::get('/getcommunity', 'ShowFile');
  Route::post('/updatecommunityfile/{id}', 'UpdateFile');
  Route::post('/deletecommunityfile/{id}','DeleteFile');

  Route::post('/uploadcommunitymembers', 'uploadmembers');
  Route::get('/showcommunitymembers', 'showmembers');
  Route::post('/updatecommunitymembers/{id}', 'updatemembers');
  Route::post('/deletecommunitymembers/{id}','deletemembers');
  
  Route::post('/managercommunityupload', 'managerupload');
  Route::get('/showcommunitybiofraphy', 'showbiofraphy');
  Route::post('/updatecommunitybiography/{id}', 'updatebiography');
  Route::post('/deletecommunitybiography/{id}','deletebiography');
});

Route::controller(GraduateStudiesontroller::class)->group(function(){
  Route::post('/uploadstudiefile', 'uploadfile');
  Route::get('/showstudiefile', 'ShowFile');
  Route::post('/updatestudiefile/{id}', 'UpdateFile');
  Route::post('/deletestudiefile/{id}','DeleteFile');

  Route::post('/uploadstudiemembers', 'uploadmembers');
  Route::get('/showstudiemembers', 'showmembers');
  Route::post('/updatestudiemembers/{id}', 'updatemembers');
  Route::post('/deletestudiemembers/{id}','deletemembers');

  Route::post('/managerstudieupload', 'managerupload');
  Route::get('/showstudiebiofraphy', 'showbiofraphy');
  Route::post('/updatestudiebiography/{id}', 'updatebiography');
  Route::post('/deletestudiebiography/{id}','deletebiography');
});

Route::controller(DiplomaController::class)->group(function(){
  Route::post('/uploaddiplomafile', 'uploaddiplomafile');
  Route::get('/ShowdiplomaFile', 'ShowdiplomaFile');
  Route::post('/UpdatediplomaFile/{id}', 'UpdatediplomaFile');
  Route::post('/deletediplomafile/{id}','DeletediplomaFile');

  Route::post('/uploadmasterfile', 'uploadmasterfile');
  Route::get('/ShowmasterFile', 'ShowmasterFile');
  Route::post('/UpdatemasterFile/{id}', 'UpdatemasterFile');
  Route::post('/DeletemasterFile/{id}','DeletemasterFile');

  Route::post('/uploadgraduatestudiesfile', 'uploadgraduatestudiesfile');
  Route::get('/ShowgraduatestudiesFile', 'ShowgraduatestudiesFile');
  Route::post('/UpdategraduatestudiesFile/{id}', 'UpdategraduatestudiesFile');
  Route::post('/DeletegraduatestudiesFile/{id}','DeletegraduatestudiesFile');
});

Route::controller(CollegecouncilController::class)->group(function(){
    Route::post('/uploadcouncilfile', 'uploadfile');
    Route::get('/showcouncilfile', 'ShowFile');
    Route::post('/updatecouncilfile/{id}', 'UpdateFile');
    Route::post('/deletecouncilfile/{id}','DeleteFile');

    Route::post('/uploadmembers', 'uploadmembers');
    Route::get('/showmembers', 'showmembers');
    Route::post('/updatemembers/{id}', 'updatemembers');
    Route::post('/deletemembers/{id}','deletemembers');
    
    Route::post('/biographyupload', 'biographyupload');
    Route::get('/showbiography', 'showbiography');
    Route::post('/updatebiography/{id}', 'updatebiography');
    Route::post('/deletebiography/{id}','deletebiography');
});

Route::controller(RegulationController::class)->group(function(){
  Route::post('/Upload_Regulation_general','UploadRegulation');
  Route::get('/Get_Regulation_general','GetRegulation');
  Route::post('/Update_Regulation_general/{id}','UpdateRegulation');
  Route::post('/Delete_Regulation_general/{id}','DeleteRegulation');
});
##########################################   BIO API  ##############################################
  Route::controller(ManageController::class)->group(function(){
    Route::get('/get_bio_managers', 'index');
    Route::get('/show_bio_manager/{id}', 'show');
    Route::post('/store_bio_manager', 'store');
    Route::post('/update_bio_manager/{id}','update');
    Route::post('/delete_bio_manager/{id}','destroy');
});

Route::controller(CouncilBioController::class)->group(function(){
  Route::post('/upload_bio_council','StoreCouncil');
  Route::get('/get_bio_council','GetCouncil');
  Route::get('/show_bio_council/{id}','ShowCouncil');
  Route::post('/update_bio_council/{id}','UpdateCouncil');
  Route::get('/delete_bio_council/{id}','destDeleteCouncilory');
});
Route::controller(RegulationBioController::class)->group(function(){
  Route::post('/Upload_Regulation_bio','UploadRegulation');
  Route::get('/Get_Regulation_bio','GetRegulation');
  Route::post('/Update_Regulation_bio/{id}','UpdateRegulation');
  Route::post('/Delete_Regulation_bio/{id}','DeleteRegulation');
});

Route::controller(TeamBioController::class)->group(function(){
  Route::post('upload_bio_image/{team_num}','UploadImage');
  Route::get('get_bio_image/{team_num}/{id}','getImage');
  Route::post('update_bio_image/{team_num}/{id}','UpdateImage');
  Route::post('delete_bio_image/{team_num}/{id}','DeleteImage');

  Route::post('upload_bio_courses/{team_num}','UploadCourses');
  Route::get('get_bio_courses/{team_num}','getCourses');
  Route::post('update_bio_courses/{team_num}/{id}','UpdateCourse');
  Route::post('delete_bio_courses/{team_num}/{id}','DeleteCourse');

  Route::post('upload_bio_examnation/{team_num}','uploadFile');
  Route::get('get_bio_examnation/{team_num}','getFile');
  Route::post('update_bio_examnation/{team_num}/{id}','UpdateFile');
  Route::post('delete_bio_examnation/{team_num}/{id}','DeleteFile');
});

##########################################   SOFT API  ##############################################
Route::controller(ManageSoftController::class)->group(function(){
  Route::get('/Get_soft_Manager', 'GetManager');
  Route::post('/Upload_soft_Manager', 'UploadManager');
  Route::get('/Show_soft_Manager/{id}', 'ShowManager');
  Route::post('/Update_soft_Manager/{id}','UpdateManager');
  Route::post('/Delete_soft_Manager/{id}','DeleteManager');
});

Route::controller(councilSoftController::class)->group(function(){
  Route::post('/Store_soft_Council','StoreCouncil');
  Route::get('/Get_soft_Council','GetCouncil');
  Route::get('/Show_soft_Council/{id}','ShowCouncil');
  Route::post('/Update_soft_Council/{id}','UpdateCouncil');
  Route::post('/Delete_soft_Council/{id}','DeleteCouncil');
});

Route::controller(RegulationSoftController::class)->group(function(){
  Route::post('/Upload_Regulation_soft','UploadRegulation');
  Route::get('/Get_Regulation_soft','GetRegulation');
  Route::post('/Update_Regulation_soft/{id}','UpdateRegulation');
  Route::post('/Delete_Regulation_soft/{id}','DeleteRegulation');
});

Route::controller(TeamSoftController::class)->group(function(){
  Route::post('upload_soft_image/{team_num}','UploadImage');
  Route::get('get_soft_image/{team_num}/{id}','getImage');
  Route::post('update_soft_image/{team_num}/{id}','UpdateImage');
  Route::post('delete_soft_image/{team_num}/{id}','DeleteImage');

  Route::post('upload_soft_courses/{team_num}','UploadCourses');
  Route::get('get_soft_courses/{team_num}','getCourses');
  Route::post('update_soft_courses/{team_num}/{id}','UpdateCourse');
  Route::post('delete_soft_courses/{team_num}/{id}','DeleteCourse');

  Route::post('upload_soft_examnation/{team_num}','uploadFile');
  Route::get('get_soft_examnation/{team_num}','getFile');
  Route::post('update_soft_examnation/{team_num}/{id}','UpdateFile');
  Route::post('delete_soft_examnation/{team_num}/{id}','DeleteFile');
});

});
 