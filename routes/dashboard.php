<?php

use App\Http\Controllers\Dashboard\DepartmentsController;
use App\Http\Controllers\Dashboard\LeavesController;
use App\Http\Controllers\Dashboard\LeaveTypesController;
use App\Http\Controllers\DashboardController;
use App\Models\Leavetype;
use Illuminate\Support\Facades\Route;


Route::group([

  'middleware' => ['auth'],
  'as' => 'dashboard.',
  'prefix' =>'dashboard'
], function(){
  Route::get('/',[DashboardController::class,'index'])
    ->name('dashboard'); // name for the route
  
  Route::resource('/departments',DepartmentsController::class);
  Route::resource('/leavetypes',LeaveTypesController::class);
  Route::resource('/leaves',LeavesController::class);

});


