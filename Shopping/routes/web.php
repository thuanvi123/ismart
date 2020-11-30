<?php

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
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::prefix('frontend')->group(function (){
    Route::get('category/{slug}/{id}','FrontendCategoryController@index')->name('category');
    //giỏ hàng

    Route::get('cart/show-add','FrontendCartController@show_add')->name('cart.show_add');
    Route::get('cart/add/{id}','FrontendCartController@add')->name('cart.add');
    Route::get('cart/update/{id}','FrontendCartController@update')->name('cart.update');
    Route::get('cart/remove/{rowId}','FrontendCartController@remove')->name('cart.remove');
    Route::get('cart/destroy}','FrontendCartController@destroy')->name('cart.destroy');
    //thanh toán
    Route::get('payment/thanh-toan','FrontendPaymentController@index')->name('payment.index');
    Route::post('payment/thanh-toan','FrontendPaymentController@saveInfoCart')->name('cart.save');
    Route::get('sendmail','DemoController@sendmail');
    //Liên hệ
    Route::get('lien-he', 'ContactController@getContact')->name('get.contact');
    Route::post('lien-he','ContactController@saveContact');
    //Gioi thiệu
    Route::get('ve-chung-toi','PageStaticController@aboutUs')->name('get.about');
    //Sản phẩm
    Route::get('san-pham/{slug}-{id}','FrontendProductController@index')->name('product.detail');
    //Blog
    Route::get('blog','FrontendBlogController@index')->name('post');
    Route::get('blog/{slug}-{id}','FrontendBlogController@detail')->name('post.detail');
    //Tìm kiêm
    Route::get('search','FrontendSearchController@index');

});


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('dashboard','DashboardController@show');
Route::middleware('auth')->group(function (){
    Route::prefix('admin')->group(function (){
        //Danh sách thành viên
        Route::get('user/list','Admin\AdminController@index');
        //Thêm thành viên mới
        Route::get('user/add','Admin\AdminController@add');
        Route::post('user/store','Admin\AdminController@store')->name('admin.store');
        //Sửa thông tin thành viên
        Route::get('user/edit/{id}','Admin\AdminController@edit');
        Route::post('user/update/{id}','Admin\AdminController@update')->name('admin.update');
        //Xóa thành viên
        Route::get('user/delete/{id}','Admin\AdminController@delete');
        //
        Route::post('user/action','Admin\AdminController@action');

        //Quản lý sản phẩm
        /*
         * Quản lý danh mục
         */
        Route::get('category/list','Admin\CategoryController@index')->middleware('can:category-list');
        Route::get('category/add','Admin\CategoryController@add')->middleware('can:category-add');
        Route::post('category/store','Admin\CategoryController@store')->name('admin.category.store');
        Route::get('category/edit/{id}','Admin\CategoryController@edit');
        Route::post('category/update/{id}','Admin\CategoryController@update')->name('admin.category.update')->middleware('can:category-update');
        Route::get('category/{action}/{id}','Admin\CategoryController@action')->middleware('can:category-delete')->name('admin.get.action.category');
        /*
         * Quản lý sản phẩm
         */
        Route::get('product/list','Admin\AdminProductController@index')->middleware('can:product-list');
        Route::get('product/add','Admin\AdminProductController@add');
        Route::post('product/store','Admin\AdminProductController@store')->name('admin.product.store');
        Route::get('product/edit/{id}','Admin\AdminProductController@edit')->middleware('can:product-edit,id');
        Route::post('product/update/{id}','Admin\AdminProductController@update')->name('admin.product.update');
        Route::get('product/delete/{id}','Admin\AdminProductController@delete');

        //Quản lý menu
        Route::get('menu/list','Admin\MenuController@index');
        Route::get('menu/add','Admin\MenuController@add');
        Route::post('menu/store','Admin\MenuController@store')->name('admin.menu.store');
        Route::get('menu/edit/{id}','Admin\MenuController@edit');
        Route::post('menu/update/{id}','Admin\MenuController@update')->name('admin.menu.update');
        Route::get('menu/delete/{id}','Admin\MenuController@delete');

        //Quản lý slider
        Route::get('slider/list','Admin\AdminSliderController@index');
        Route::get('slider/add','Admin\AdminSliderController@add');
        Route::post('slider/store','Admin\AdminSliderController@store')->name('admin.store');
        Route::get('slider/edit/{id}','Admin\AdminSliderController@edit');
        Route::post('slider/update/{id}','Admin\AdminSliderController@update')->name('admin.slider.update');
        Route::get('slider/delete/{id}','Admin\AdminSliderController@delete');

        //Quản lý setting
        Route::get('setting/list','Admin\AdminSettingController@index');
        Route::get('setting/add','Admin\AdminSettingController@add');
        Route::post('setting/store','Admin\AdminSettingController@store')->name('admin.setting.store');
        Route::get('setting/edit/{id}','Admin\AdminSettingController@edit');
        Route::post('setting/update/{id}','Admin\AdminSettingController@update')->name('admin.setting.update');
        Route::get('setting/delete/{id}','Admin\AdminSettingController@delete');
        //Quản lý roles
        Route::get('roles/list','Admin\AdminRoleController@index');
        Route::get('roles/add','Admin\AdminRoleController@add');
        Route::post('roles/store','Admin\AdminRoleController@store')->name('admin.roles.store');
        Route::get('roles/edit/{id}','Admin\AdminRoleController@edit');
        Route::post('roles/update/{id}','Admin\AdminRoleController@update')->name('admin.roles.update');
        Route::get('roles/delete/{id}','Admin\AdminRoleController@delete');
        //Thêm dữ liệu bảng permission
        Route::get('permission/add','Admin\AdminPermissionController@add')->name('permission.add');
        Route::post('permission/store','Admin\AdminPermissionController@store')->name('admin.permission.store');
        //Quản lý đơn hàng
        Route::get('/order/list','Admin\AdminOrderController@index')->name('order.index');
        Route::get('/order/view/{id}','Admin\AdminOrderController@viewOrder')->name('admin.get.view.order');
        Route::get('order/{action}/{id}','Admin\AdminOrderController@action')->name('admin.get.action.order');

        //Quản lý danh mục bài viết
        Route::get('post/list','Admin\AdminPostController@index');
        Route::get('post/add','Admin\AdminPostController@add');
        Route::post('post/store','Admin\AdminPostController@store')->name('admin.post.store');
        Route::get('post/edit/{id}','Admin\AdminPostController@edit')->name('admin.post.edit');
        Route::post('post/update/{id}','Admin\AdminPostController@update')->name('admin.post.update');
        Route::get('post/delete/{id}','Admin\AdminPostController@delete')->name('admin.get.action.post');

        //Quản lý Blog
        Route::get('article/list','Admin\AdminArticleController@index');
        Route::get('article/add','Admin\AdminArticleController@add');
        Route::post('article/store','Admin\AdminArticleController@store')->name('admin.article.store');
        Route::get('article/edit/{id}','Admin\AdminArticleController@edit')->name('admin.article.edit');
        Route::post('article/update/{id}','Admin\AdminArticleController@update')->name('admin.article.update');
        Route::get('article/delete/{id}','Admin\AdminArticleController@delete')->name('admin.get.action.article');
        //Quản lý about
        Route::get('about/list','Admin\AdminAboutController@index');
        Route::get('about/add','Admin\AdminAboutController@add');
        Route::post('about/store','Admin\AdminAboutController@store')->name('admin.about.store');
        Route::get('about/edit/{id}','Admin\AdminAboutController@edit')->name('admin.about.edit');
        Route::post('about/update/{id}','Admin\AdminAboutController@update')->name('admin.about.update');
        Route::get('about/delete/{id}','Admin\AdminAboutController@delete')->name('admin.get.action.about');



    });




});
