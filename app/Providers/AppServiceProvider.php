<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Users\UsersActionInterface;
use App\Contracts\Users\UsersQueryInterface;
use App\Contracts\Roles\RolesActionInterface;
use App\Contracts\Roles\RolesQueryInterface;
use App\Contracts\UserRoles\UserRolesActionInterface;
use App\Contracts\UserRoles\UserRolesQueryInterface;
use App\Contracts\AssetTypes\AssetTypesActionInterface;
use App\Contracts\AssetTypes\AssetTypesQueryInterface;
use App\Contracts\Locations\LocationsActionInterface;
use App\Contracts\Locations\LocationsQueryInterface;
use App\Contracts\Departments\DepartmentsActionInterface;
use App\Contracts\Departments\DepartmentsQueryInterface;
use App\Contracts\Statuses\StatusesActionInterface;
use App\Contracts\Statuses\StatusesQueryInterface;
use App\Contracts\Classifications\ClassificationsActionInterface;
use App\Contracts\Classifications\ClassificationsQueryInterface;
use App\Contracts\CriticalityLevels\CriticalityLevelsActionInterface;
use App\Contracts\CriticalityLevels\CriticalityLevelsQueryInterface;
use App\Contracts\Actions\ActionsActionInterface;
use App\Contracts\Actions\ActionsQueryInterface;
use App\Contracts\Assets\AssetsActionInterface;
use App\Contracts\Assets\AssetsQueryInterface;
use App\Repository\Users\UsersActionRepository;
use App\Repository\Users\UsersQueryRepository;
use App\Repository\Roles\RolesActionRepository;
use App\Repository\Roles\RolesQueryRepository;
use App\Repository\UserRoles\UserRolesActionRepository;
use App\Repository\UserRoles\UserRolesQueryRepository;
use App\Repository\AssetTypes\AssetTypesActionRepository;
use App\Repository\AssetTypes\AssetTypesQueryRepository;
use App\Repository\Locations\LocationsActionRepository;
use App\Repository\Locations\LocationsQueryRepository;
use App\Repository\Departments\DepartmentsActionRepository;
use App\Repository\Departments\DepartmentsQueryRepository;
use App\Repository\Statuses\StatusesActionRepository;
use App\Repository\Statuses\StatusesQueryRepository;
use App\Repository\Classifications\ClassificationsActionRepository;
use App\Repository\Classifications\ClassificationsQueryRepository;
use App\Repository\CriticalityLevels\CriticalityLevelsActionRepository;
use App\Repository\CriticalityLevels\CriticalityLevelsQueryRepository;
use App\Repository\Actions\ActionsActionRepository;
use App\Repository\Actions\ActionsQueryRepository;
use App\Repository\Assets\AssetsActionRepository;
use App\Repository\Assets\AssetsQueryRepository;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UsersActionInterface::class, UsersActionRepository::class);
        $this->app->bind(UsersQueryInterface::class, UsersQueryRepository::class);
        $this->app->bind(RolesActionInterface::class, RolesActionRepository::class);
        $this->app->bind(RolesQueryInterface::class, RolesQueryRepository::class);
        $this->app->bind(UserRolesActionInterface::class, UserRolesActionRepository::class);
        $this->app->bind(UserRolesQueryInterface::class, UserRolesQueryRepository::class);
        $this->app->bind(AssetTypesActionInterface::class, AssetTypesActionRepository::class);
        $this->app->bind(AssetTypesQueryInterface::class, AssetTypesQueryRepository::class);
        $this->app->bind(LocationsActionInterface::class, LocationsActionRepository::class);
        $this->app->bind(LocationsQueryInterface::class, LocationsQueryRepository::class);
        $this->app->bind(DepartmentsActionInterface::class, DepartmentsActionRepository::class);
        $this->app->bind(DepartmentsQueryInterface::class, DepartmentsQueryRepository::class);
        $this->app->bind(StatusesActionInterface::class, StatusesActionRepository::class);
        $this->app->bind(StatusesQueryInterface::class, StatusesQueryRepository::class);
        $this->app->bind(ClassificationsActionInterface::class, ClassificationsActionRepository::class);
        $this->app->bind(ClassificationsQueryInterface::class, ClassificationsQueryRepository::class);
        $this->app->bind(CriticalityLevelsActionInterface::class, CriticalityLevelsActionRepository::class);
        $this->app->bind(CriticalityLevelsQueryInterface::class, CriticalityLevelsQueryRepository::class);
        $this->app->bind(ActionsActionInterface::class, ActionsActionRepository::class);
        $this->app->bind(ActionsQueryInterface::class, ActionsQueryRepository::class);
        $this->app->bind(AssetsActionInterface::class, AssetsActionRepository::class);
        $this->app->bind(AssetsQueryInterface::class, AssetsQueryRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
