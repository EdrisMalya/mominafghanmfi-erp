<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|lang
*/

Route::middleware(['auth:sanctum'])->group(function(){

    Route::group(['prefix' => 'financing-mode', 'middleware' => ['checkEmployeeProfile']], function (){
        Route::group(['prefix' => 'murabeha'], function (){
            Route::get('requests', [\App\Http\Controllers\FinanceMode\MurabehaController::class, 'index']);
            Route::match(['POST', 'DELETE', 'PUT', 'GET'], 'steps-progress/{step}/{request_id?}', [\App\Http\Controllers\FinanceMode\MurabehaController::class, 'processStep']);
            Route::get('steps-request/{request}/', [\App\Http\Controllers\FinanceMode\MurabehaController::class, 'getStepRequest']);
        });
    });

    Route::group(['prefix' => 'general'], function (){
       Route::get('country-provinces', [\App\Http\Controllers\GeneralController::class, 'countryProvinces']);
       Route::match(['POST', 'GET', 'DELETE'],'asset-types', [\App\Http\Controllers\GeneralController::class, 'assetTypes']);
    });

    Route::get('/user', [\App\Http\Controllers\UserManagement\UserManagementController::class, 'user']);
    Route::post('/change-password', [\App\Http\Controllers\UserManagement\UserManagementController::class, 'changePassword']);

    Route::group(['prefix' => 'customer-management'], function (){
       Route::resource('customers', \App\Http\Controllers\CustomerServices\CustomerController::class);
    });

    Route::group(['prefix' => 'user-management'], function (){
        Route::resource('users', \App\Http\Controllers\UserManagement\UserManagementController::class);
        Route::match(['GET', 'POST'],'user/profile/{user}', [\App\Http\Controllers\UserManagement\UserManagementController::class, 'userProfile']);

        Route::resource('roles', \App\Http\Controllers\UserManagement\RoleController::class);

        Route::middleware(['isSuperAdmin'])->group(function(){
            Route::resource('permission-groups', \App\Http\Controllers\UserManagement\PermissionGroupController::class);
            Route::post('permission-groups/update-order', [\App\Http\Controllers\UserManagement\PermissionGroupController::class, 'updatePermissionSort']);
            Route::resource('permission', \App\Http\Controllers\UserManagement\PermissionController::class);
        });

        Route::group(['prefix' => 'activity-log'], function (){
            Route::get('', [\App\Http\Controllers\UserManagement\ActivityLogController::class, 'index']);
            Route::get('user-log/{user}', [\App\Http\Controllers\UserManagement\ActivityLogController::class, 'getUserLog']);
            Route::get('{log}', [\App\Http\Controllers\UserManagement\ActivityLogController::class, 'getActivityLog']);
            Route::post('restore-log/{log}', [\App\Http\Controllers\UserManagement\ActivityLogController::class, 'restoreLog']);
        });

        Route::get('login-log', [\App\Http\Controllers\UserManagement\UserManagementController::class, 'loginLog']);
    });

    Route::group(['prefix' => 'configurations'], function(){

        Route::group(['prefix' => 'system-configurations'], function (){
            Route::resource('branch-province', \App\Http\Controllers\Configurations\SystemConfigurations\ProvinceController::class);
            Route::resource('branch', \App\Http\Controllers\Configurations\SystemConfigurations\BranchController::class);
            Route::resource('financing-mode', \App\Http\Controllers\Configurations\SystemConfigurations\FinancingModeController::class);

            Route::get('financing-mode-step-configurations/{financing_mode}', [\App\Http\Controllers\Configurations\SystemConfigurations\FinancingModeController::class, 'financingModeStepConfigurations']);
            Route::post('financing-mode-step-configurations', [\App\Http\Controllers\Configurations\SystemConfigurations\FinancingModeController::class, 'stepConfigurations']);

            Route::match(['GET', 'POST'], '', [\App\Http\Controllers\Configurations\SystemConfigurations\SystemConfigurationsController::class, 'config']);
        });

        Route::resource('languages', \App\Http\Controllers\Configurations\LanguagesController::class);
        Route::resource('language/words', \App\Http\Controllers\Configurations\LanguageWordController::class);
        Route::get('backup/run', [\App\Http\Controllers\Configurations\BackupController::class, 'run']);
        Route::get('backup/list', [\App\Http\Controllers\Configurations\BackupController::class, 'list']);
        Route::post('backup/change', [\App\Http\Controllers\Configurations\BackupController::class, 'change']);
        Route::delete('backup/delete/{db}', [\App\Http\Controllers\Configurations\BackupController::class, 'delete']);
        Route::resource('backup', \App\Http\Controllers\Configurations\BackupController::class);
    });

    Route::resource('notifications', \App\Http\Controllers\NotificationController::class);

});
Route::get('language/words', [\App\Http\Controllers\Configurations\LanguagesController::class, 'languageWords']);
Route::middleware('auth:sanctum')->post('/logout', [\App\Http\Controllers\UserManagement\UserManagementController::class, 'logout']);

Route::post('/login', [\App\Http\Controllers\UserManagement\UserManagementController::class, 'login']);

