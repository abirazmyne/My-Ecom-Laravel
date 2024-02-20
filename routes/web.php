<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerProfileController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\SliderControllr;

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

Route::get('/', [WebsiteController::class,'index'])->name('home');
Route::get('/product/category/{id}', [WebsiteController::class,'categoryProduct'])->name('product.category');
Route::get('/product/subCategory/{id}', [WebsiteController::class,'subCategoryProduct'])->name('product.subCategory');
Route::get('/product/detail/{id}', [WebsiteController::class,'productDetails'])->name('product.detail');

Route::get('/web/blog', [BlogController::class,'blgIndex'])->name('web.blog');
Route::get('/customer/contact', [CContactController::class,'contIndex'])->name('customer.contact');


Route::post('/cart/add/{id}', [CartController::class,'cartIndex'])->name('cart.add');
Route::get('/cart/show', [CartController::class,'show'])->name('cart.show');
Route::post('/cart/update/{rowId}', [CartController::class,'update'])->name('cart.update');
Route::get('/cart/remove/{rowId}', [CartController::class,'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class,'checkoutIndex'])->name('checkout');
Route::post('/new-order', [CheckoutController::class,'newOrder'])->name('new.order');
Route::get('/complete-detail', [CheckoutController::class,'completeOrder'])->name('complete-order');



Route::get('/customer-logout', [CustomerAuthController::class,'logout'])->name('customer.logout');
Route::get('/customer-login', [CustomerAuthController::class,'index'])->name('customer.loginload');
Route::post('customer/login', [CustomerAuthController::class,'login'])->name('customer.login');
Route::get('/customer-register', [CustomerAuthController::class,'register'])->name('customer.register');
Route::post('/customer-register', [CustomerAuthController::class,'newCustomer'])->name('customer.register');

Route::middleware(['customer'])->group(function (){

Route::get('/customer-dashboard', [CustomerProfileController::class,'index'])->name('customer.dashboard');
Route::get('/customer-profile/{id}', [CustomerProfileController::class,'editprofile'])->name('customer.profile');
Route::post('/customer-updatepro/{id}', [CustomerProfileController::class,'updateprofle'])->name('profile.update');

Route::get('/customer-order', [CustomerProfileController::class,'order'])->name('customer.order');
Route::get('/customer-order-detail/{id}', [CustomerProfileController::class,'orderdetail'])->name('customer.order-detail');
Route::get('/customer-payment', [CustomerProfileController::class,'payment'])->name('customer.payment');
Route::get('/customer-change-password', [CustomerProfileController::class,'changePassword'])->name('customer.change-password');

} );

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/slider/add', [SliderControllr::class, 'index'])->name('slider.add');
    Route::post('/slider/create', [SliderControllr::class, 'create'])->name('slider.create');
    Route::get('/slider/edit/{id}', [SliderControllr::class, 'edit'])->name('slider.edit');
    Route::post('/slider/update/{id}', [SliderControllr::class, 'update'])->name('slider.update');
    Route::get('/slider/delete/{id}', [SliderControllr::class, 'delete'])->name('slider.delete');
    Route::get('/slider/manage', [SliderControllr::class, 'manage'])->name('slider.manage');

    Route::get('/category/add', [CategoryController::class, 'index'])->name('category.add');
    Route::post('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/category/manage', [CategoryController::class, 'manage'])->name('category.manage');

    Route::get('/subCategory/add', [SubCategoryController::class, 'index'])->name('subCategory.add');
    Route::post('/subCategory/create', [SubCategoryController::class, 'create'])->name('subCategory.create');
    Route::get('/subCategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('subCategory.edit');
    Route::post('/subCategory/update/{id}', [SubCategoryController::class, 'update'])->name('subCategory.update');
    Route::get('/subCategory/delete/{id}', [SubCategoryController::class, 'delete'])->name('subCategory.delete');
    Route::get('/subCategory/manage', [SubCategoryController::class, 'manage'])->name('subCategory.manage');

    Route::get('/brand/add', [BrandController::class, 'index'])->name('brand.add');
    Route::post('/brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
    Route::get('/brand/manage', [BrandController::class, 'manage'])->name('brand.manage');

    Route::get('/unit/add', [UnitController::class, 'index'])->name('unit.add');
    Route::post('/unit/create', [UnitController::class, 'create'])->name('unit.create');
    Route::get('/unit/edit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
    Route::post('/unit/update/{id}', [UnitController::class, 'update'])->name('unit.update');
    Route::get('/unit/delete/{id}', [UnitController::class, 'delete'])->name('unit.delete');
    Route::get('/unit/manage', [UnitController::class, 'manage'])->name('unit.manage');

    Route::get('/courier/add', [CourierController::class, 'index'])->name('courier.add');
    Route::post('/courier/create', [CourierController::class, 'create'])->name('courier.create');
    Route::get('/courier/edit/{id}', [CourierController::class, 'edit'])->name('courier.edit');
    Route::post('/courier/update/{id}', [CourierController::class, 'update'])->name('courier.update');
    Route::get('/courier/delete/{id}', [CourierController::class, 'delete'])->name('courier.delete');
    Route::get('/courier/manage', [CourierController::class, 'manage'])->name('courier.manage');


    Route::get('/order/all', [AdminOrderController::class, 'index'])->name('admin-order.all');
    Route::get('admin.order-detail/{id}', [AdminOrderController::class, 'details'])->name('admin.order-detail');
    Route::get('admin.order-edit/{id}', [AdminOrderController::class, 'edit'])->name('admin.order-edit');
    Route::post('admin.order-update/{id}', [AdminOrderController::class, 'update'])->name('admin.order-update');
    Route::get('admin.order-invoice/{id}', [AdminOrderController::class, 'invoice'])->name('admin.order-invoice');
    Route::get('admin.download-invoice/{id}', [AdminOrderController::class, 'downloadinvoice'])->name('admin.download-invoice');
    Route::get('admin.order-delete/{id}', [AdminOrderController::class, 'delete'])->name('admin.order-delete');
    Route::get('admin.order-pdelete/{id}', [AdminOrderController::class, 'pdelete'])->name('admin.order-p-delete');


    Route::resource('product',ProductController::class);
    Route::get('get-sub-category-by-category', [ProductController::class,'getSubcategoryByCategory'])->name('get-sub-category-by-category');
});
