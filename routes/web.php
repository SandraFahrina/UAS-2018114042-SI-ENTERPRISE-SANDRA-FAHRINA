<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PresentController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ContractcoursesController;
use Illuminate\Support\Facades\Route;

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
Route::get('/beranda', function () {
    return view('beranda');
});
route::get('', [StudentController::class, "index"]);
route::get('', [PresentController::class, "index"]);
route::get('', [CoursesController::class, "index"]);
route::get('', [ScheduleController::class, "index"]);
Route::post('/schedules/create', [ScheduleController::class, 'create']);
route::post('/schedules', [Schedulecontroller::class, "store"]);
route::get('/schedules/{id}', [Schedulecontroller::class, "show"]);
route::get('/schedules/{id}/edit', [Schedulecontroller::class, "edit"]);
route::put('/schedules/{id}', [Schedulecontroller::class, "update"]);
Route::delete('/schedules/{id}', [ScheduleController::class, 'destroy']);
Route::get('/contractcourses/create', [ContractcoursesController::class, 'create']);
route::post('/contractcourses', [Contractcoursescontroller::class, "store"]);
route::get('/contractcourses/{id}', [Contractcoursescontroller::class, "show"]);
route::get('/contractcourses/{id}/edit', [Contractcoursescontroller::class, "edit"]);
route::put('/contractcourses/{id}', [Contractcoursescontroller::class, "update"]);
Route::delete('/contractcourses/{id}', [ContractcoursesController::class, 'destroy']);
route::get('', [SemesterController::class, "index"]);
//route::get('/customers', [cobacontroller::class, "index"]);
//route::get('/customers/create', [cobacontroller::class, "create"]);
//route::post('/customers', [cobacontroller::class, "store"]);
//route::get('/customers/{id}', [cobacontroller::class, "show"]);
//route::get('/customers/{id}/edit', [cobacontroller::class, "edit"]);
//route::put('/customers/{id}', [cobacontroller::class, "update"]);
//Route::delete('/customers/{id}', [CobaController::class, 'destroy']);

Route::resources([
    'students' => StudentController::class,
    'presents' => PresentController::class,
    'courses' => CoursesController::class,
    'Schedules' => ScheduleController::class,
    'contractcourses' => ContractcoursesController::class,
    'semesters' => SemesterController::class,
]);