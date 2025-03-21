<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentsActionController;
use App\Http\Controllers\DepartmentsQueryController;
use App\Http\Controllers\LocationsActionController;
use App\Http\Controllers\LocationsQueryController;
use App\Http\Controllers\RolesActionController;
use App\Http\Controllers\RolesQueryController;
use App\Http\Controllers\UserRolesActionController;
use App\Http\Controllers\UserRolesQueryController;
use App\Http\Controllers\UsersActionController;
use App\Http\Controllers\UsersQueryController;
use App\Http\Controllers\StatusesActionController;
use App\Http\Controllers\StatusesQueryController;
use App\Http\Controllers\CriticalityLevelsActionController;
use App\Http\Controllers\CriticalityLevelsQueryController;
use App\Http\Controllers\ClassificationsActionController;
use App\Http\Controllers\ClassificationsQueryController;
use App\Http\Controllers\AssetTypesActionController;
use App\Http\Controllers\AssetTypesQueryController;
use App\Http\Controllers\AssetsActionController;
use App\Http\Controllers\AssetsQueryController;
use App\Http\Controllers\ActionsActionController;
use App\Http\Controllers\ActionsQueryController;

include('listas.php');
    Route::prefix('departments')->group(function () {
        Route::post('/', [DepartmentsActionController::class, 'store']);
        Route::delete('/{id}', [DepartmentsActionController::class, 'destroy']);
        Route::get('/{id}', [DepartmentsQueryController::class, 'show']);

    });
    Route::get('departments/list', [DepartmentsQueryController::class, 'Information']);
    Route::prefix('locations')->group(function () {
        Route::post('/', [LocationsActionController::class, 'store']);
        Route::delete('/{id}', [LocationsActionController::class, 'destroy']);
        Route::get('/{id}', [LocationsQueryController::class, 'show']);
        Route::get('/list', [LocationsQueryController::class, 'index']);
    });

    Route::prefix('roles')->group(function () {
        Route::post('/', [RolesActionController::class, 'store']);
        Route::delete('/{id}', [RolesActionController::class, 'destroy']);
        Route::get('/{id}', [RolesQueryController::class, 'show']);
        Route::get('/list', [RolesQueryController::class, 'index']);
    });

    Route::prefix('user-roles')->group(function () {
        Route::post('/', [UserRolesActionController::class, 'store']);
        Route::delete('/{user_id}/{role_id}', [UserRolesActionController::class, 'destroy']);
        Route::get('/{RoleID}', [UserRolesQueryController::class, 'show']);
        Route::get('/list', [UserRolesQueryController::class, 'index']);
    });

    Route::prefix('users')->group(function () {
        Route::post('/add', [UsersActionController::class, 'store']);
        Route::post('/login', [UsersActionController::class, 'login']);
        Route::delete('/{id}', [UsersActionController::class, 'destroy']);
        Route::get('/{id}', [UsersQueryController::class, 'show']);

    });

        Route::get('users/list', [UsersQueryController::class, 'Information']);


    Route::prefix('statuses')->group(function () {
        Route::post('/', [StatusesActionController::class, 'store']);
        Route::delete('/{id}', [StatusesActionController::class, 'destroy']);
        Route::get('/{id}', [StatusesQueryController::class, 'show']);
        Route::get('/list', [StatusesQueryController::class, 'index']);
    });

    Route::prefix('criticality-levels')->group(function () {
        Route::post('/', [CriticalityLevelsActionController::class, 'store']);
        Route::delete('/{id}', [CriticalityLevelsActionController::class, 'destroy']);
        Route::get('/{id}', [CriticalityLevelsQueryController::class, 'show']);
        Route::get('/list', [CriticalityLevelsQueryController::class, 'index']);
    });

    Route::prefix('classifications')->group(function () {
        Route::post('/', [ClassificationsActionController::class, 'store']);
        Route::delete('/{id}', [ClassificationsActionController::class, 'destroy']);
        Route::get('/{id}', [ClassificationsQueryController::class, 'show']);
        Route::get('/list', [ClassificationsQueryController::class, 'index']);
    });

    Route::prefix('asset-types')->group(function () {
        Route::post('/', [AssetTypesActionController::class, 'store']);
        Route::delete('/{id}', [AssetTypesActionController::class, 'destroy']);
        Route::get('/{id}', [AssetTypesQueryController::class, 'show']);
        Route::get('/list', [AssetTypesQueryController::class, 'index']);
    });

    Route::prefix('assets')->group(function () {
        Route::post('/', [AssetsActionController::class, 'store']);
        Route::delete('/{id}', [AssetsActionController::class, 'destroy']);
        Route::get('/{id}', [AssetsQueryController::class, 'show']);
        Route::post('/{id}', [AssetsActionController::class, 'update']);
    });

    Route::prefix('actions')->group(function () {
        Route::post('/', [ActionsActionController::class, 'store']);
        Route::delete('/{id}', [ActionsActionController::class, 'destroy']);
        Route::get('/{id}', [ActionsQueryController::class, 'show']);
        Route::get('/list', [ActionsQueryController::class, 'index']);
    });
