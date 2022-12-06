<?php

use Illuminate\Support\Facades\Route;
      // admin
use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\admin\EvaluationCotroller;
use App\Http\Controllers\admin\TrainCotroller;
use App\Http\Controllers\admin\TimekeepingCotroller;
use App\Http\Controllers\admin\SalaryCotroller;
use App\Http\Controllers\admin\DocumentCotroller;
use App\Http\Controllers\admin\RequestController;
use App\Http\Controllers\admin\DisciplineController;
use App\Http\Controllers\admin\LaudatoryController;
// use App\Http\Controllers\admin\WorkController;
use App\Http\Controllers\admin\DepartmentController;
use App\Http\Controllers\admin\tailieuController;

    // work
use App\Http\Controllers\work\WorkController;

  //meetting
use  App\Http\Controllers\meetting\MeettingController;

    // profile
use App\Http\Controllers\profile\ProfileController;

   // Excel
use App\Http\Controllers\chat\ChatController;
    // Excel
use App\Http\Controllers\excel\ExcelExport;
    // word  
use App\Http\Controllers\word\WordController;
    // user
use App\Http\Controllers\user\ContaindocController;
use App\Http\Controllers\user\ReportController;
use App\Http\Controllers\user\TrainingController;
use App\Http\Controllers\user\DocumentUserController;
// use App\Http\Controllers\user\WorkUserController;
// use App\Http\Controllers\user\ChatController;
use App\Http\Controllers\user\AttendanceController;
use App\Http\Controllers\user\EvaluationUserCotroller;
use App\Http\Controllers\user\SalaryUserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
                // ĐĂNG NHẬP

Route::get('/',[loginController::class, 'index'])->name('index');
Route::post('login',[loginController::class, 'check'])->name('login');
Route::get('/logoutadmin',[loginController::class, 'logoutadmin'])->name('logoutadmin');

                 // Trang chủ ADMIN
Route::middleware(['Checklogin'])->prefix('admin')->group(function () {
                                  // ĐĂNG XUẤT 
    
                // . trang chính 
    Route::get('/', [HomeController::class, 'homeadmin'])->name('trangchu');

                // profile  
    Route::get('/profileadmin', [ProfileController::class, 'admin'])->name('profileadmin');
    Route::get('/profileadmin/edit', [ProfileController::class, 'update'])->name('updateadmin');
                //updateimage  
    Route::post('/updateimage', [ProfileController::class, 'UpdateImage'])->name('updateimage_admin');

                // .đổi mật khẩu admin
    Route::get('/changepasswordadmin',[LoginController::class, 'changepassadmin'])->name('changepassadmin');
                
    // lịch họp
    Route::prefix('meetting')->group(function () {
      Route::post('/create', [MeettingController::class, 'store'])->name('createmeetting');                   
      Route::post('/update/{id}', [MeettingController::class, 'update'])->name('updatemeetting');                   
      Route::post('/detroy/{id}', [MeettingController::class, 'destroy'])->name('destroymeetting');                   

    });

                // quản lý nhân viên
    Route::prefix('employee')->group(function () {
    // danh sách nhân viên
    Route::get('/',[EmployeeController::class, 'index'])->name('listemployee'); 
    Route::get('/create',[EmployeeController::class, 'pagecreate'])->name('create');
    Route::post('/store',[EmployeeController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [EmployeeController::class, 'pageedit'])->name('updateemployee');
    Route::post('/update/{id}', [EmployeeController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [EmployeeController::class, 'destroy'])->name('deleteemployee');
    Route::get('/detail/{id}', [EmployeeController::class, 'detailofemployee'])->name('detailemployee');
    Route::get('/dataemployee', [EmployeeController::class, 'data'])->name('detailemployee');
    
    });
                 
              // danh sách phòng ban
      Route::prefix('department')->group(function () {
      
        Route::get('/',[DepartmentController::class, 'index'])->name('department');
        Route::post('/create',[DepartmentController::class, 'store'])->name('storedepart');
        Route::post('/edit/{id}',[DepartmentController::class, 'update'])->name('updatedepart');
        Route::get('/delete/{id}',[DepartmentController::class, 'destroy'])->name('destroydepart');
        Route::get('/detail/{id}',[DepartmentController::class, 'detail'])->name('detaildepart');
        Route::get('/detailemployee/{id}',[EmployeeController::class, 'detailofemployee'])->name('detailemployeeofdepart');
      });
                // danh sách trình độ
      Route::get('/listdegree',[EmployeeController::class, 'degree'])->name('listdegree');

                // danh sách chức vụ
      Route::get('/listposition',[EmployeeController::class, 'position'])->name('listposition');
            
   

           // xuất file excel nhân viên
      Route::get('/excelemployee',[ExcelExport::class, 'exportlistemployee'])->name('exportlistemployee');

    
                    // quản lý danh sách yêu cầu 

    Route::prefix('request')->group(function () {
      Route::get('/',[RequestController::class, 'index'])->name('request');
      Route::post('/agree/{id}',[RequestController::class, 'agree'])->name('agreerequest');
      Route::post('/remove/{id}',[RequestController::class, 'remove'])->name('removerequest');
    });
                        // đánh giá nhân viên
    Route::prefix('evaluation')->group(function () {
      Route::get('/',[EvaluationCotroller::class, 'index'])->name('evaluation'); 
      Route::post('/create',[EvaluationCotroller::class, 'store'])->name('storeevaluation');
      Route::get('/edit/{id}',[EvaluationCotroller::class, 'edit'])->name('editevaluation');
      Route::post('/update/{id}',[EvaluationCotroller::class, 'update'])->name('updateevaluation');
      Route::get('/destroy/{id}',[EvaluationCotroller::class, 'destroy'])->name('destroyevaluation');
    });

                    // công việc
    Route::prefix('work')->group(function () {
      Route::get('/', [WorkController::class, 'admin'])->name('workadmin');                   
      Route::post('/create', [WorkController::class, 'store'])->name('storework');   
      Route::post('/edit/{id}', [WorkController::class, 'edit'])->name('editwork_admin');  
      Route::post('/updateofderpantment/{id}', [WorkController::class, 'updatederpantment'])->name('updateworkderpartment');  
      Route::post('/updateofemployee/{id}', [WorkController::class, 'updateemployee'])->name('updateworkemployee');  
      Route::post('/remove/{id}', [WorkController::class, 'remove'])->name('removework');                   
  
    });
                    // kỷ luật

    Route::get('/discipline',[DisciplineController::class, 'index'])->name('discipline');
    Route::post('/discipline/create',[DisciplineController::class, 'store'])->name('creatediscipline');

                    // khen thưởng

    Route::get('/laudatory',[LaudatoryController::class, 'index'])->name('laudatory');
    Route::post('/laudatory/create',[LaudatoryController::class, 'store'])->name('createlaudatory');

    // Route::get('/evaluation',[EvaluationCotroller::class, 'index'])->name('evaluation');

                    // Quản lý đào tạo
    Route::prefix('train')->group(function (){
                    // danh sách đào tạo
       Route::get('/',[TrainCotroller::class, 'index'])->name('train');
       Route::get('/create',[TrainCotroller::class, 'pagecreatetrain'])->name('createtrain');
       Route::post('/store',[TrainCotroller::class, 'storetrain'])->name('stroretrain');
       Route::get('/edit/{id}',[TrainCotroller::class, 'pageedittrain']);
       Route::post('/update/{id}',[TrainCotroller::class, 'updatetrain'])->name('updatetrain');
       Route::get('/delete/{id}',[TrainCotroller::class, 'destroytrain'])->name('destroytrain');
       Route::get('/detail/{id}',[TrainCotroller::class, 'detailtrain'])->name('detailtrain')   ;
       Route::post('/add',[TrainCotroller::class, 'addEmployeeTrain'])->name('addEmployeeTrain')   ;
       
       // loại đào tạo
      Route::prefix('typeoftraining')->group(function () {
       Route::get('/',[TrainCotroller::class, 'typeoftraining'])->name('typeoftraining');
       Route::post('/store',[TrainCotroller::class, 'storetypeoftraining'])->name('storetypeoftraining');
       Route::get('/delete/{id}',[TrainCotroller::class, 'destroytypeoftraining'])->name('destroytypetrain');
    
      //  Route::get('/delete/{id}',[TrainCotroller::class, 'destroytypeoftraining'])->name('deletetypeoftraining');
       Route::post('/edit',[TrainCotroller::class, 'edittypeoftraining'])->name('edittypeoftraining');
        });    

        // kết quả đào tạo
      Route::prefix('trainingresults')->group(function () {
        Route::get('/',[TrainCotroller::class, 'trainingresults'])->name('trainingresults'); 
        Route::get('/create',[TrainCotroller::class, 'pagecreateresults'])->name('pagecreateresult');
        
        Route::post('/store ',[TrainCotroller::class, 'storeresults'])->name('storeresult');
        // Route::post('/storedetail ',[TrainCotroller::class, 'storedetail'])->name('storedetail');
       
       //  Route::get('/edit/{id}',[TrainCotroller::class, 'pageeditresults']);
        Route::post('/update/{id}',[TrainCotroller::class, 'updateresults'])->name('updateresults');
        Route::get('/detete/{id}',[TrainCotroller::class, 'destroyresults'])->name('destroyresults'); 
       });
    });
      
                    // Tài liệu
    Route::prefix('tailieu')->group(function () {
      Route::get('/',[tailieuController::class, 'index'])->name('tailieu');
      Route::post('/store',[tailieuController::class, 'store'])->name('storetailieu');
      Route::get('/delete/{id}',[tailieuController::class, 'destroy'])->name('destroytailieu');
      // Route::get('/',[tailieuController::class, 'index'])->name('tailieu');
    });
                    // Chấm Công
    Route::prefix('timekeeping')->group(function () {
      Route::get('/',[TimekeepingCotroller::class, 'index'])->name('timekeeping');
      Route::post('/Search',[TimekeepingCotroller::class, 'Search'])->name('timekeepingsearch');
      Route::post('/create',[TimekeepingCotroller::class, 'store'])->name('createtimekeeping');
      // Route::post('/update',[TimekeepingCotroller::class, 'update'])->name('updatetimekeeping');
      Route::post('/updatetimework/{id}',[TimekeepingCotroller::class, 'update'])->name('updatetimekeeping');
      Route::get('/delete/{id}',[TimekeepingCotroller::class, 'delete'])->name('deletetimekeeping');
      
      Route::get('/loaddata',[TimekeepingCotroller::class, 'data']);
      
    });
                    // Lương
    Route::prefix('salary')->group(function () {
      Route::get('/',[SalaryCotroller::class, 'index'])->name('salary');
      Route::get('/detail/{id}',[SalaryCotroller::class, 'detail'])->name('detailsalary');
      Route::get('/detailEmployee/{id}', [EmployeeController::class, 'detailofemployee'])->name('detailemployeesalary');
      Route::get('/excelsalary',[ExcelExport::class, 'exportsalary'])->name('exportsalary');
      Route::post('/updatesalary/{id}',[SalaryCotroller::class, 'update'])->name('updatesalary');
      Route::get('/destroysalary/{id}',[SalaryCotroller::class, 'destroy'])->name('destroysalary');
      Route::post('/getday',[SalaryCotroller::class, 'getday']);
      Route::post('/search',[SalaryCotroller::class, 'searchdate'])->name('searchsalary');
    
      // ngạch - bậc
      Route::get('/levelofsalary',[SalaryCotroller::class, 'levelofsalary'])->name('levelofsalary');
      Route::post('/storengach',[SalaryCotroller::class, 'storengach'])->name('storengach');
      Route::post('/storebac',[SalaryCotroller::class, 'storebac'])->name('storebac');
      Route::post('/updatengach/{id}',[SalaryCotroller::class, 'updatengach'])->name('updatengach');
      Route::post('/updatebac/{id}',[SalaryCotroller::class, 'updatebac'])->name('updatebac');
      Route::get('/destroyngach/{id}',[SalaryCotroller::class, 'destroyngach'])->name('destroyngach');
      Route::get('/destroybac/{id}',[SalaryCotroller::class, 'destroybac'])->name('destroybac');

     
      
    
    });
                       
                  // Họp
    // Route::get('/meeting',[SalaryCotroller::class, 'index'])->name('meeting');

                    // quản lý văn bản

    Route::prefix('document')->group(function () {
      Route::get('/',[DocumentCotroller::class, 'index'])->name('document');
      Route::get('/create',[DocumentCotroller::class, 'createdoc'])->name('createdoc');
      Route::post('/store',[DocumentCotroller::class, 'storedoc'])->name('storedoc');
      Route::get('/edit/{id}',[DocumentCotroller::class, 'editdoc']);
      Route::post('/update/{id}',[DocumentCotroller::class, 'updatedoc']);
      Route::get('/delete/{id}',[DocumentCotroller::class, 'destroydoc']);
      Route::get('/detail/{id}',[DocumentCotroller::class, 'detaildoc']);
      Route::get('/exportword/{id}',[WordController::class, 'exportworddoc']);

      
      // loại văn bản
      Route::get('/typeofdocument',[DocumentCotroller::class, 'typedoc'])->name('typedoc');
      Route::post('/typeofdocument/store',[DocumentCotroller::class, 'storetypedoc'])->name('storetypedoc');
      Route::post('/typeofdocument/edit',[DocumentCotroller::class, 'edittypedoc'])->name('edittypedoc');      
      Route::post('/typeofdocument/delete/{id}',[DocumentCotroller::class, 'destroytypedoc']);
    });
        //chat
    Route::prefix('chat')->group(function () {
      Route::get('/', [ChatController::class, 'chat_admin'])->name('chat_admin');
      Route::get('/loadchat/{id}', [ChatController::class, 'data'])->name('loadchat');
      Route::get('/loadchatbox', [ChatController::class, 'datachatbox_admin']);
      Route::post('/createchat', [ChatController::class, 'createchat'])->name('createchat');
      Route::get('/store', [ChatController::class, 'createchat_admin']);
      Route::post('/update/{id}', [ChatController::class, 'updatechat'])->name('updatechat');
      Route::get('/detail/{id}', [ChatController::class, 'detail_admin'])->name('detail_adminchat');
      Route::post('/delete/{id}', [ChatController::class, 'detroychat_admin'])->name('destroychat');
      Route::post('/add', [ChatController::class, 'addchat'])->name('addchat_admin');
      // Route::get('/delete/{id}', [ContaindocController::class, 'destroy'])->name('destroycontaineruser');
    });
    // Route::get('/document',[DocumentCotroller::class, 'index'])->name('document');
});

  // Trang chủ USER

Route::middleware(['checkloginuser'])->prefix('user')->group(function () {
    Route::get('/logoutuser',[loginController::class, 'logoutuser'])->name('logoutuser');
    Route::get('/changpassuser',[loginController::class, 'changepassuser'])->name('changepassuser');
        // trang chủ user 
    Route::get('/', [HomeController::class, 'homeuser'])->name('trangchuuser');
        
        // điểm danh
    Route::get('/attendance', [AttendanceController::class, 'check'])->name('attendanceuser');
      // page chứa tài liệu và chia sẽ tài liệu
    Route::prefix('containdoc')->group(function () {
      Route::get('/', [ContaindocController::class, 'index'])->name('containdocuser');
      Route::post('/create', [ContaindocController::class, 'create'])->name('addcontaineruser');
      Route::get('/delete/{id}', [ContaindocController::class, 'destroy'])->name('destroycontaineruser');
      
    });

      // văn bản user
    Route::prefix('document')->group(function () {
      Route::get('/', [DocumentUserController::class, 'index_user'])->name('docuser');
      Route::get('/detaildocument/{id}', [DocumentUserController::class, 'detail_user'])->name('detail_user');
      Route::get('/exportword/{id}',[WordController::class, 'exportworddoc'])->name('exportword_user');
      Route::post('/search',[DocumentUserController::class, 'search'])->name('searchdoc_user');
      
    });

      // báo cáo user
      Route::prefix('report')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('reportuser');
        Route::post('/request', [ReportController::class, 'create'])->name('requestreportuser');
        // Route::get('/delete/{id}', [ContaindocController::class, 'destroy'])->name('destroycontaineruser');
      });
      // đào tạo user 
    // Route::get('/training', [TrainingController::class, 'index'])->name('traininguser');
    Route::prefix('training')->group(function () {
      Route::get('/', [TrainingController::class, 'index'])->name('traininguser');
      Route::post('/regist', [TrainingController::class, 'regist'])->name('registtraininguser');
      Route::post('/removeregist/{id}', [TrainingController::class, 'removeregist'])->name('removerigistryuser');
      
      // Route::get('/delete/{id}', [ContaindocController::class, 'destroy'])->name('destroycontaineruser');
    });
      // công việc user 
    Route::prefix('work')->group(function () {
      Route::get('/', [WorkController::class, 'user'])->name('workuser');
      Route::post('/udpate/{id}', [WorkController::class, 'updateemployee'])->name('updatework_user');
      Route::post('/assign', [WorkController::class, 'store'])->name('assignwork_user');
      Route::post('/evaluate/{id}', [WorkController::class, 'evaluatework'])->name('evaluatework_user');
      Route::get('/destroy/{id}', [WorkController::class, 'remove'])->name('destroywork_user');
      Route::post('/udpateWork/{id}', [WorkController::class, 'edit'])->name('editwork_user');
      Route::post('/completethework/{id}', [WorkController::class, 'complete'])->name('completework_user');

      
    });
    // đánh giá user
    Route::prefix('evaluation')->group(function () {
      Route::get('/', [EvaluationUserCotroller::class, 'index'])->name('evaluateemployee_user');
      Route::post('/store', [EvaluationUserCotroller::class, 'store'])->name('storeevaluation_user');
      Route::post('/udpate/{id}', [EvaluationUserCotroller::class, 'update'])->name('updateevaluation_user');
      Route::post('/delete/{id}', [EvaluationUserCotroller::class, 'destroy'])->name('destroyevaluation_user');
      // Route::get('/evaluate/{id}', [WorkController::class, 'user'])->name('evaluatework_user');
      // Route::get('/destroy/{id}', [WorkController::class, 'user'])->name('destroywork_user');
    });
      // chat user 
    Route::prefix('chat')->group(function () {
      Route::get('/', [ChatController::class, 'chat_user'])->name('chat_user');
      Route::get('/load/{id}', [ChatController::class, 'data']);
      Route::get('/loadchatbox', [ChatController::class, 'datachatbox_user']);
      Route::get('/detail/{id}', [ChatController::class, 'detailchat_user'])->name('detailchat_user');
      Route::post('/update/{id}', [ChatController::class, 'updatechat'])->name('updatechat_user');
      Route::get('/store', [ChatController::class, 'storechat_user'])->name('storechat_user');
      Route::post('/add', [ChatController::class, 'add'])->name('addchat_user');
      Route::post('/createchat', [ChatController::class, 'createchat'])->name('createchat_user');
      
      // Route::post('/add', [ChatController::class, 'add'])->name('addchat_user');
      
    });
    //Lương của User
    Route::prefix('salary')->group(function () {
      Route::get('/', [SalaryUserController::class, 'index'])->name('salary_user');
      
    });
    // profile user 
    Route::get('/profileuser', [ProfileController::class, 'user'])->name('profileuser');
      //updateimage  
    Route::post('/updateimage', [ProfileController::class, 'UpdateImage'])->name('updateimage_user');
    // create meetting user 
    Route::post('/createmeetting', [MeettingController::class, 'createmt_user'])->name('createmt_user');
});




