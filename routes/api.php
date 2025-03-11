<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserRolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StatusesController;
use App\Http\Controllers\CriticalityLevelsController;
use App\Http\Controllers\ClassificationsController;
use App\Http\Controllers\AssetTypesController;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\ActionsController;


Route::prefix('api/')->group(function () {
    Route::prefix('departments')->group(function () {
        Route::post('/', [DepartmentsController::class, 'store']);
        Route::delete('/{id}', [DepartmentsController::class, 'destroy']);
        Route::get('/{id}', [DepartmentsController::class, 'show']);
    });

    Route::prefix('locations')->group(function () {
        Route::post('/', [LocationsController::class, 'store']);
        Route::delete('/{id}', [LocationsController::class, 'destroy']);
        Route::get('/{id}', [LocationsController::class, 'show']);
    });

    Route::prefix('roles')->group(function () {
        Route::post('/', [RolesController::class, 'store']);
        Route::delete('/{id}', [RolesController::class, 'destroy']);
        Route::get('/{id}', [RolesController::class, 'show']);
    });

    Route::prefix('user-roles')->group(function () {
        Route::post('/', [UserRolesController::class, 'store']);
        Route::delete('/{user_id}/{role_id}', [UserRolesController::class, 'destroy']);
        Route::get('/{user_id}/{role_id}', [UserRolesController::class, 'show']);
    });

    Route::prefix('users')->group(function () {
        Route::post('/', [UsersController::class, 'store']);
        Route::delete('/{id}', [UsersController::class, 'destroy']);
        Route::get('/{id}', [UsersController::class, 'show']);
    });

    Route::prefix('statuses')->group(function () {
        Route::post('/', [StatusesController::class, 'store']);
        Route::delete('/{id}', [StatusesController::class, 'destroy']);
        Route::get('/{id}', [StatusesController::class, 'show']);
    });

    Route::prefix('criticality-levels')->group(function () {
        Route::post('/', [CriticalityLevelsController::class, 'store']);
        Route::delete('/{id}', [CriticalityLevelsController::class, 'destroy']);
        Route::get('/{id}', [CriticalityLevelsController::class, 'show']);
    });

    Route::prefix('classifications')->group(function () {
        Route::post('/', [ClassificationsController::class, 'store']);
        Route::delete('/{id}', [ClassificationsController::class, 'destroy']);
        Route::get('/{id}', [ClassificationsController::class, 'show']);
    });

    Route::prefix('asset-types')->group(function () {
        Route::post('/', [AssetTypesController::class, 'store']);
        Route::delete('/{id}', [AssetTypesController::class, 'destroy']);
        Route::get('/{id}', [AssetTypesController::class, 'show']);
    });

    Route::prefix('assets')->group(function () {
        Route::post('/', [AssetsController::class, 'store']);
        Route::delete('/{id}', [AssetsController::class, 'destroy']);
        Route::get('/{id}', [AssetsController::class, 'show']);
    });

    Route::prefix('actions')->group(function () {
        Route::post('/', [ActionsController::class, 'store']);
        Route::delete('/{id}', [ActionsController::class, 'destroy']);
        Route::get('/{id}', [ActionsController::class, 'show']);
    });
});