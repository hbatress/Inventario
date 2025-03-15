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

    Route::get('departments/list', [DepartmentsQueryController::class, 'Information']);
    Route::get('locations/list', [LocationsQueryController::class, 'index']);
    Route::get('roles/list', [RolesQueryController::class, 'index']);
    Route::get('user-roles/list', [UserRolesQueryController::class, 'index']);
    Route::get('users/list', [UsersQueryController::class, 'Information']);
    Route::get('statuses/list', [StatusesQueryController::class, 'index']);
    Route::get('criticality-levels/list', [CriticalityLevelsQueryController::class, 'index']);
    Route::get('classifications/list', [ClassificationsQueryController::class, 'index']);
    Route::get('asset-types/list', [AssetTypesQueryController::class, 'index']);
    Route::get('/assets/{idTipo}/{listtipo}', [AssetsQueryController::class, 'lisTipo']);
    Route::get('actions/list', [ActionsQueryController::class, 'index']);
    Route::get('assets/list', [AssetsQueryController::class, 'listadosindex']);


