<?php

use Illuminate\Support\Facades\Route;
 
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\KmsDrivenController;
use App\Http\Controllers\FuelTypeController;
use App\Http\Controllers\BodyTypeController;
use App\Http\Controllers\TransmissionController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\SeatsController;
use App\Http\Controllers\RTOController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\SpinnyHubsController;
use App\Http\Controllers\CarDetailController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');

Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
    'products' => ProductController::class,
    'permission' => PermissionsController::class,
    'category' => CategoryController::class,
    'brand' => BrandController::class,
    'year' => YearController::class,
    'kms-driven' => KmsDrivenController::class,
    'fuel-type' => FuelTypeController::class,
    'body-type' => BodyTypeController::class,
    'transmission'=> TransmissionController::class,
    'color'=> ColorController::class,
    'features'=>FeaturesController::class,
    'seats'=>SeatsController::class,
    'rto'=>RTOController::class,
    'owner'=>OwnerController::class,
    'spinnyhubs'=>SpinnyHubsController::class,
    'car-detail'=>CarDetailController::class,
]);
   
    Route::get('banner', [UserController::class,'banner'])->name('banner.index');
	Route::get('banner-create', [UserController::class,'bannerCreate'])->name('banner.create');
    Route::post('banner-store', [UserController::class,'bannerStore'])->name('banner.store');
	Route::get('banner-delete/{id}', [UserController::class,'bannerDelete'])->name('banner.delete');
    
    Route::get('category-edit/{id}', [CategoryController::class,'edit'])->name('category.edits');
    Route::get('category-delete/{id}', [CategoryController::class,'categoryDelete'])->name('category.delete');

    Route::get('brand-edit/{id}', [BrandController::class,'edit'])->name('brand.edits');
    Route::get('brand-delete/{id}', [BrandController::class,'brandDelete'])->name('brand.delete');

    Route::get('year-edit/{id}', [YearController::class,'edit'])->name('year.edits');
    Route::get('year-delete/{id}', [YearController::class,'yearDelete'])->name('year.delete');
    
    Route::get('kms-edit/{id}', [KmsDrivenController::class,'edit'])->name('kms-driven.edits');
    Route::get('kms-delete/{id}', [KmsDrivenController::class,'kmsDrivenDelete'])->name('kms-driven.delete');

    Route::get('fuel-type-edit/{id}', [FuelTypeController::class,'edit'])->name('fuel-type.edits');
    Route::get('fuel-type-delete/{id}', [FuelTypeController::class,'fuelTypeDelete'])->name('fuel-type.delete');

    Route::get('body-type-edit/{id}', [BodyTypeController::class,'edit'])->name('body-type.edits');
    Route::get('body-type-delete/{id}', [BodyTypeController::class,'bodyTypeDelete'])->name('body-type.delete');
    
    Route::get('transmission-edit/{id}', [TransmissionController::class,'edit'])->name('transmission.edits');
    Route::get('transmission-delete/{id}', [TransmissionController::class,'transmissionDelete'])->name('transmission.delete');
    
    Route::get('color-edit/{id}', [ColorController::class,'edit'])->name('color.edits');
    Route::get('color-delete/{id}', [ColorController::class,'colorDelete'])->name('color.delete');

    Route::get('features-edit/{id}', [FeaturesController::class,'edit'])->name('features.edits');
    Route::get('features-delete/{id}', [FeaturesController::class,'featuresDelete'])->name('features.delete');
    
    Route::get('seats-edit/{id}', [SeatsController::class,'edit'])->name('seats.edits');
    Route::get('seats-delete/{id}', [SeatsController::class,'seatsDelete'])->name('seats.delete');

    Route::get('rto-edit/{id}', [RTOController::class,'edit'])->name('rto.edits');
    Route::get('rto-delete/{id}', [RTOController::class,'rtoDelete'])->name('rto.delete');
    
    Route::get('owner-edit/{id}', [OwnerController::class,'edit'])->name('owner.edits');
    Route::get('owner-delete/{id}', [OwnerController::class,'ownerDelete'])->name('owner.delete');
    
    Route::get('spinnyhubs-edit/{id}', [SpinnyHubsController::class,'edit'])->name('spinnyhubs.edits');
    Route::get('spinnyhubs-delete/{id}', [SpinnyHubsController::class,'spinnyhubsDelete'])->name('spinnyhubs.delete');

    Route::get('car-detail-edit/{id}', [CarDetailController::class,'edit'])->name('car-detail.edits');
    Route::get('car-detail-delete/{id}', [CarDetailController::class,'car-detailDelete'])->name('car-detail.delete');


    Route::get('request-user', [UserController::class,'requestUser'])->name('request-user.index');
	
 