<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//Controller-уудыг оруулж ирэх

use App\Http\Controllers\StatController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AttendanceController;

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

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/statuses', [StatController::class, 'index']);
Route::post('/status', [StatController::class, 'create']);
Route::get('/status/{id}', [StatController::class, 'show']);


// Route::get('/greeting', function () {
//     return 'Hello World';
// });

// Route::get('/teachers', [TeacherController::class, 'index']);
// Route::get('/teachers/{id}', [TeacherController::class, 'show']);
// Route::post('/teachers', [TeacherController::class, 'create']);

// Route::group(
//     [
//         'prefix'=>'v1',
//         //'middleware'=>'auth:sanctum'
//     ],
//     function(){
//         Route::apiResource('/stats',StatController::class);
//         Route::apiResource('/students',StudentController::class);
//     }
    
//);


    Route::get('/courses', [CourseController::class, 'index']);
    Route::get('/courses/{id}', [CourseController::class, 'show']);
    Route::post('/courses', [CourseController::class, 'create']);
    Route::post('/courses/{id}', [CourseController::class, 'update']);
    // Route::delete('/courses/{id}', [CourseController::class, 'destroy']);

    // Teacher dr route turshiv
    Route::get('/teacher',[TeacherController::class,'index'])->name('teachers.index');
    Route::get('/teacher/create',[TeacherController::class,'create'])->name('teachers.create');
    Route::post('/teacher',[TeacherController::class,'store'])->name('teachers.store');
    Route::get('/teacher/{teacher}/edit',[TeacherController::class,'edit'])->name('teachers.edit');
    Route::put('/teacher/{teacher}/update',[TeacherController::class,'update'])->name('teachers.update');

    // students
    Route::get('/students', [StudentController::class, 'index']);
    Route::get('/students/{id}', [StudentController::class, 'show']);
    Route::post('/students', [StudentController::class, 'create']);
    Route::post('/students/{id}', [StudentController::class, 'update']);

    // Attendance
    Route::get('/attendance', [AttendanceController::class, 'index']);
    Route::get('/attendance/{id}', [AttendanceController::class, 'show']);
    Route::post('/attendance', [AttendanceController::class, 'create']);
    Route::post('/attendance/{id}', [AttendanceController::class, 'update']);
    // Route::group(
    //         [
    //             'prefix'=>'v1',
    //             //'middleware'=>'auth:sanctum'
    //         ],
    //         function(){
    //                 Route::get('/courses', [CourseController::class, 'index']);
    //                 Route::get('/courses/{id}', [CourseController::class, 'show']);
    //                 Route::post('/courses', [CourseController::class, 'create']);
    //                 Route::post('/courses/{id}', [CourseController::class, 'update']);
    //                 Route::delete('/courses/{id}', [CourseController::class, 'destroy']);
    //         }
            
    //     );
