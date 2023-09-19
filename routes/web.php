<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });



Auth::routes(['verify' => true]);

// Route::post('resetPassword', 'ResetPasswordController@reset');
/*
|--------------------------------------------------------------------------
| Builder Generator Routes
|--------------------------------------------------------------------------
*/

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');



///////////////////////////////////////////////////////////////////////////
///								end builder routes 						///
///////////////////////////////////////////////////////////////////////////


Route::get('/', function () {
    return view('welcome');
})->name('website.home');







/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
*/

Route::get('logout', 'AuthController@logout')->name('logout');

Route::group(['prefix' => 'adminPanel', 'namespace' => 'AdminPanel', 'as' => 'adminPanel.'], function () {
    Route::get('logout', 'AuthController@logout')->name('logout');

    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/postLogin', 'AuthController@postLogin')->name('postLogin');


    Route::group(['middleware' => ['auth:admin', 'permissionHandler']], function () {

        Route::get('/', 'DashboardController@dashboard')->name('dashboard');

        // Roles CRUD
        Route::resource('roles', 'RolesController');
        Route::get('updatePermissions', 'RolesController@updatePermissions')->name('roles.updatePermissions');

        // Admins CRUD
        Route::resource('admins', 'AdminController');

        //Metas CRUD
        Route::resource('metas', 'MetaController');


        // Pages CRUD
        Route::resource('pages', 'PageController');
        Route::resource('pages.paragraphs', 'ParagraphController')->shallow();
        Route::resource('pages.images', 'imagesController')->shallow();
        Route::resource('socialLinks', 'SocialLinkController');

        // CkEditor Upload Image By Ajax
        Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');

        // User CURD
        Route::resource('users', 'UserController')->only(['index', 'show', 'update']);
        Route::get('transactions', 'UserController@transactions')->name('users.transactions');

        Route::patch('users/approve/{id}', 'UserController@approve')->name('user.approve');

        // Informations CURD
        Route::resource('information', 'InformationController');

        // Slider CURD
        Route::resource('sliders', 'sliderController');

        // Contact Us CURD
        Route::resource('contacts', 'ContactController');

        // Newsletter CURD
        Route::resource('newsletters', 'NewsletterController');

        // Categories CURD
        Route::resource('categories', 'CategoryController');

        // Product CURD
        Route::resource('products', 'ProductController')->only(['index', 'show', 'edit', 'update']);
        Route::get('balance-mail/{id}', 'ProductController@balanceMail')->name('products.balanceMail');



        Route::patch('products/approve/{id}', 'ProductController@approve')->name('product.approve');

        Route::delete('photo/{image}', 'ProductController@destroyImage')->name('products.destroyImage');

        Route::resource('faqCategories', 'FaqCategoryController');
        Route::resource('faqs', 'FaqController');

        Route::resource('rules', 'RuleController');

        Route::get('reviews', 'ReviewController@index')->name('reviews.index');
        Route::get('reviews/{id}', 'ReviewController@show')->name('reviews.show');
        Route::patch('reviews/add-to-home/{id}', 'ReviewController@addToHome')->name('reviews.addToHome');
        Route::patch('reviews/remove-from-home/{id}', 'ReviewController@removeFromHome')->name('reviews.removeFromHome');

        Route::resource('siteOptions', 'SiteOptionController')->only(['edit', 'update']);
        // //Settings
        Route::get('customSettings', 'CustomSettingController@settings')->name('customSettings.show');
        Route::patch('customSettings/{id}', 'CustomSettingController@update')->name('customSettings.update');
    });
});

///////////////////////////////////////////////////////////////////////////
///								end admin panel routes 					///
///////////////////////////////////////////////////////////////////////////
