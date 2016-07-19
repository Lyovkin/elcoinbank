<?php

namespace App\Providers;

use App\Http\Controllers\AdminCurrencyController;
use Collective\Annotations\AnnotationsServiceProvider as ServiceProvider;

/**
 * Class AnnotationServiceProvider
 * @package App\Providers
 */
class AnnotationServiceProvider extends ServiceProvider
{
    /**
     * The classes to scan for event annotations.
     *
     * @var array
     */
    protected $scanEvents = [];

    /**
     * The classes to scan for route annotations.
     *
     * @var array
     */
    protected $scanRoutes = [
        App\Http\Controllers\Admin\AdminController::class,
        App\Http\Controllers\Admin\AdminCourseController::class,
        App\Http\Controllers\Admin\AdminBanksController::class,
        App\Http\Controllers\Admin\AdminRequestsController::class,
        App\Http\Controllers\Admin\AdminPlansController::class,
        App\Http\Controllers\Admin\AdminUserController::class,
        App\Http\Controllers\Admin\AdminDepositController::class,
        App\Http\Controllers\Admin\AdminPullOffMoneyController::class,
        App\Http\Controllers\UserProfileController::class,
        App\Http\Controllers\BuyController::class,
        App\Http\Controllers\PlanController::class,
        App\Http\Controllers\TransactionController::class,
        App\Http\Controllers\DepositController::class,
        App\Http\Controllers\PullOffMoneyController::class,
    ];

    /**
     * The classes to scan for model annotations.
     *
     * @var array
     */
    protected $scanModels = [
        App\Models\Currency::class,
        App\Models\Course::class,
        App\Models\Banks::class,
        App\Models\Purchase::class,
        App\Models\Plan::class,
        App\Models\Profile::class,
        App\Models\Deposit::class,
        App\Models\PullOffMoney::class,
    ];

    /**
     * Determines if we will auto-scan in the local environment.
     *
     * @var bool
     */
    protected $scanWhenLocal = true;

    /**
     * Determines whether or not to automatically scan the controllers
     * directory (App\Http\Controllers) for routes
     *
     * @var bool
     */
    protected $scanControllers = true;

    /**
     * Determines whether or not to automatically scan all namespaced
     * classes for event, route, and model annotations.
     *
     * @var bool
     */
    protected $scanEverything = true;

}