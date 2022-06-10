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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::prefix('/admin')->namespace('Admin')->group(function() {
   // All the admin routes will be defined here :-

    Route::match(['get','post'],'/', 'AdminController@login');

    Route::group(['middleware'=>['admin']],function(){

        Route::get('turnoff', 'AdminController@turnoff');
        Route::get('dashboard', 'AdminController@dashboard');
        Route::get('settings', 'AdminController@settings');
        Route::get('logout', 'AdminController@logout');
        Route::post('check-current-pwd', 'AdminController@chkCurrentPassword');
        Route::post('update-current-pwd', 'AdminController@updateCurrentPassword');
        Route::match(['get','post'],'update-admin-details','AdminController@updateAdminDetails');

        // Sections
        Route::get('sections','SectionController@sections');
        Route::post('update-section-status', 'SectionController@updateSectionStatus');

        // Banners
        Route::get('banners', 'BannersController@banners');
        Route::match(['get','post'],'add-edit-banner/{id?}', 'BannersController@addEditBanner');
        Route::post('update-banner-status', 'BannersController@updateBannerStatus');
        Route::get('delete-banner/{id}', 'BannersController@deleteBanner');

        // Main Page Our Projects Block
        Route::get('ourProjects', 'OurProjectsController@ourProjects');
        Route::match(['get','post'],'add-edit-ourProjects/{id?}', 'OurProjectsController@addEditOurProjects');
        Route::post('update-ourProjects-status', 'OurProjectsController@updateOurProjects');
        Route::get('delete-ourProjects/{id}', 'OurProjectsController@deleteOurProjects');

        // Main Page Our Projects Slider Block
        Route::get('ourProjectsSlider', 'OurProjectsSliderController@ourProjectsSlider');
        Route::match(['get','post'],'add-edit-ourProjectsSlider/{id?}', 'OurProjectsSliderController@addEditOurProjectsSlider');
        Route::post('update-ourProjectsSlider-status', 'OurProjectsSliderController@updateOurProjectsSlider');
        Route::get('delete-ourProjectsSlider/{id}', 'OurProjectsSliderController@deleteOurProjectsSlider');

        // Videos
        Route::get('videos', 'VideosController@videos');
        Route::match(['get','post'],'add-edit-our-videos/{id?}', 'VideosController@addEditOurVideos');
        Route::post('update-video-status', 'VideosController@updateVideos');
        Route::get('delete-ourVideo/{id}', 'VideosController@deleteVideos');

        // Special
        Route::get('special', 'SpecialController@special');
        Route::match(['get','post'],'add-edit-special/{id?}', 'SpecialController@addEditSpecial');
        Route::post('update-special-status', 'SpecialController@updateSpecial');
        Route::get('delete-special/{id}', 'SpecialController@deleteSpecial');

        // Second Banner for About us page
        Route::get('second-banner', 'SecondBannerController@secondBanner');
        Route::match(['get','post'],'add-edit-secondBanner/{id?}', 'SecondBannerController@addEditSecondBanner');
        Route::post('update-secondBanner-status', 'SecondBannerController@updateSecondBanner');
        Route::get('delete-secondBanner/{id}', 'SecondBannerController@deleteSecondBanner');

        // About Slider
        Route::get('about-slider', 'AboutSliderController@aboutSlider');
        Route::match(['get','post'],'add-edit-aboutSlider/{id?}', 'AboutSliderController@addEditAboutSlider');
        Route::post('update-aboutSlider-status', 'AboutSliderController@updateAboutSlider');
        Route::get('delete-aboutSlider/{id}', 'AboutSliderController@deleteAboutSlider');

        // Staf
        Route::get('staf', 'StafController@staf');
        Route::match(['get','post'],'add-edit-staf/{id?}', 'StafController@addEditStaf');
        Route::post('update-sta-status', 'StafController@updateStaStatus');
        Route::get('delete-staf/{id}', 'StafController@deleteStaf');

        // Motto
        Route::get('motto', 'MottoController@motto');
        Route::match(['get','post'],'add-edit-motto/{id?}', 'MottoController@addEditMotto');
        Route::post('update-motto-status', 'MottoController@updateMottoStatus');
        Route::get('delete-motto/{id}', 'MottoController@deleteMotto');

        // Blog
        Route::get('blog', 'BlogController@blog');
        Route::match(['get','post'],'add-edit-blog/{id?}', 'BlogController@addEditBlog');
        Route::post('update-blog-status', 'BlogController@updateBlogStatus');
        Route::get('delete-blog/{id}', 'BlogController@deleteBlog');

        // Contact
        Route::get('contactBanner', 'contactBannerController@contactBanner');
        Route::match(['get','post'],'add-edit-contactBanner/{id?}', 'contactBannerController@addEditContactBanner');
        Route::post('update-contactBanner-status', 'contactBannerController@updateContactBannerStatus');
        Route::get('delete-contactBanner/{id}', 'contactBannerController@deleteContactBanner');

        // Contact Block
        Route::get('contactBlock', 'ContactBlockController@contactBlock');
        Route::match(['get','post'],'add-edit-contactBlock/{id?}', 'ContactBlockController@addEditcontactBlock');
        Route::post('update-contactBlock-status', 'contactBlockController@updateContactBlockStatus');
        Route::get('delete-contactBlock/{id}', 'contactBlockController@deletecontactBlock');

        // Our Projects Banner
        Route::get('ourProjectBanner', 'OurProjectBannerController@ourProjectBanner');
        Route::match(['get','post'],'add-edit-ourProjectsBanner/{id?}', 'OurProjectBannerController@addEditOurProjectsBanner');
        Route::post('update-ourProjectsBanner-status', 'OurProjectBannerController@updateOurProjectsBannerStatus');
        Route::get('delete-ourProjectsBanner/{id}', 'OurProjectBannerController@deleteOurProjectBanner');

        // Our Projects Blocks
        Route::get('ourProjectBlock', 'OurProjectsBlocksController@ourProjectsBlocks');
        Route::match(['get','post'],'add-edit-ourProjectsBlocks/{id?}', 'OurProjectsBlocksController@addEditOurProjectsBlocks');
        Route::post('update-ourProjectsBlocks-status', 'OurProjectsBlocksController@updateOurProjectsBlocksStatus');
        Route::get('delete-ourProjectsBlocks/{id}', 'OurProjectsBlocksController@deleteOurProjectBlock');

        // Blog Banner
        Route::get('blogBanner', 'BlogBannerController@blogBanner');
        Route::match(['get','post'],'add-edit-blogBanner/{id?}', 'BlogBannerController@addEditBlogBanner');
        Route::post('update-blogBanner-status', 'BlogBannerController@updateBlogBannerStatus');
        Route::get('delete-blogBanner/{id}', 'BlogBannerController@deleteBlogBanner');

        // Project Filter
        Route::get('projectFilter', 'ProjectFilterController@projectFilter');
        Route::match(['get','post'],'add-edit-projectFilter/{id?}', 'ProjectFilterController@addEditProjectFilter');
        Route::post('update-projectFilter-status', 'ProjectFilterController@updateProjectFilterStatus');
        Route::get('delete-projectFilter/{id}', 'ProjectFilterController@deleteProjectFilter');
    });
});


Route::namespace('Front')->middleware('turn')->group(function() {
    Route::get('/', 'IndexController@index');
    Route::get('about_us','AboutController@about');
    Route::get('news', 'NewsController@news');
    Route::get('projects', 'ProjectsController@projects');
    Route::get('contact', 'ContactController@contact');
    Route::get('project_filter/{id}', 'ProjectFilterController@projectFilter');
});
Route::get('turn', function () {
    return view('admin.turn.turn');
});

