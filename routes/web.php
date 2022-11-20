<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ExcelController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\Api\UserController as Ucon; 
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

Route::get('/',[HomeController::class,'Home'])->name('home');
Route::get('user/ParallelReading',[HomeController::class,'ParallelReading'])->name('user.parallelreading');
Route::get('user/PickVersions',[HomeController::class,'PickVersions'])->name('user.pickversions');
Route::get('user/PickBooksBoth',[HomeController::class,'PickBooksBoth'])->name('user.pickbooksboth');
Route::get('user/ChaptersCountBoth',[HomeController::class,'ChaptersCountBoth'])->name('user.chapterscountboth');
Route::get('user/LeftHandSide',[HomeController::class,'LeftHandSide'])->name('user.lefthandside');
Route::get('user/RightHandSide',[HomeController::class,'RightHandSide'])->name('user.righthandside');
Route::post('user/GetAllChaptersOptions',[HomeController::class,'GetAllChaptersOptions'])->name('user.getallchaptersoptions');
Route::post('user/RegistrationPost',[HomeController::class,'RegistrationPost'])->name('user.registrationpost');
Route::post('user/GetLeftHandSide',[HomeController::class,'GetLeftHandSide'])->name('user.getlefthandside');
Route::post('user/GetRightHandSide',[HomeController::class,'GetRightHandSide'])->name('user.getrighthandside');
Route::post('user/getBooks',[HomeController::class,'getBooks'])->name('user.getbooks');
Route::get('user/VersionsView/{version_id}',[HomeController::class,'VersionsView'])->name('user.versionsview');
Route::post('user/getChapters',[HomeController::class,'getChapters'])->name('user.getchapters');
Route::post('user/getVerses',[HomeController::class,'getVerses'])->name('user.getverses');
Route::get('user/ChapterList/{version_id}/{book_num}/{chapter_num}',[HomeController::class,'ChapterList'])->name('user.chapterlist');
Route::get('user/Bible',[HomeController::class,'Bible'])->name('user.bible');
Route::get('user/Login',[LoginController::class,'Login'])->name('user.login');
Route::get('user/Logout',[HomeController::class,'Logout'])->name('user.logout');
Route::post('user/LoginPost',[HomeController::class,'LoginPost'])->name('user.loginpost');
Route::get('user/Registration',[LoginController::class,'Registration'])->name('user.registration');
Route::get('user/ForgetPassword',[HomeController::class,'ForgetPassword'])->name('user.forgetpassword');
Route::post('user/ForgetPasswordPost',[HomeController::class,'ForgetPasswordPost'])->name('user.forgetpasswordpost');
Route::get('user/ConfirmOtp',[HomeController::class,'ConfirmOtp'])->name('user.confirmotp');
Route::get('user/SetPassword',[HomeController::class,'SetPassword'])->name('user.setpassword');
Route::get('user/AboutUs',[HomeController::class,'AboutUs'])->name('user.aboutus');
Route::get('user/ContactUs',[HomeController::class,'ContactUs'])->name('user.contactus');
Route::get('login/google',[SocialController::class,'GoogleRedirect'])->name('user.googleredirect');
Route::get('login/facebook',[SocialController::class,'FacebookRedirect'])->name('user.googleredirect');
Route::get('google/callback',[SocialController::class,'GoogleCallback'])->name('user.googlecallback');
Route::get('facebook/callback',[SocialController::class,'FacebookCallback'])->name('user.googlecallback');
Route::post('user/ConfirmOtpPost',[HomeController::class,'ConfirmOtpPost'])->name('user.confirmotppost');
Route::post('user/SetPasswordPost',[HomeController::class,'SetPasswordPost'])->name('user.setpasswordpost');


//Route::get('/',[AdminController::class,'GetPrayerData'])->name('getprayerdata');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::prefix('user')->name('user.')->group(function(){
  
//     Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
//           Route::get('/sample',[UserController::class,'sample'])->name('sample');
//           Route::view('/login','dashboard.user.login')->name('login');
//           Route::view('/register','dashboard.user.register')->name('register');
//           Route::post('/create',[UserController::class,'create'])->name('create');
//           Route::post('/check',[UserController::class,'check'])->name('check');
//     });

//     Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
//           Route::view('/home','dashboard.user.home')->name('home');
//           Route::post('/logout',[UserController::class,'logout'])->name('logout');
//           Route::get('/add-new',[UserController::class,'add'])->name('add');
//     });

// });

Route::prefix('admin')->name('admin.')->group(function(){
   
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.admin.login')->name('login');
          Route::post('/loginPost',[AdminController::class,'loginpost'])->name('loginPost');

    });
    
    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::get('/Dashboard',[AdminController::class,'dashboard'])->name('dashboard');
        Route::get('/ForCronBook',[ExcelController::class,'ForCronBook'])->name('forcronbook');
        Route::get('/ViewBookList/{pagenumber}/{id}',[ExcelController::class,'ViewBookList'])->name('viewbooklist');
        Route::get('/ViewVerseList/{pagenumber}/{id}',[ExcelController::class,'ViewVerseList'])->name('viewverselist');
        Route::get('/UploadHistory',[ExcelController::class,'UploadHistory'])->name('uploadhistry');
        Route::get('/viewUploadRecords/{id}',[ExcelController::class,'viewUploadRecords'])->name('viewuploadrecords');
        Route::get('/NewUpload',[ExcelController::class,'NewUpload'])->name('newupload');
        Route::get('/BookUpload',[ExcelController::class,'BookUpload'])->name('bookupload');
        Route::get('/VersUpload',[ExcelController::class,'VersUpload'])->name('versupload');
        Route::get('/ExportVersions',[ExcelController::class,'ExportVersions'])->name('exportversions');
        Route::get('/ExportBooks',[ExcelController::class,'ExportBooks'])->name('exportbooks');
        Route::get('/ExportChapters',[ExcelController::class,'ExportChapters'])->name('exportchapters');
        Route::get('/ExportRecords',[ExcelController::class,'ExportRecords'])->name('exportrecords');
        Route::get('/ManageVersion/{pagenumber}',[AdminController::class,'ManageVersion'])->name('manageversion');
        Route::get('/ManageBooks/{pagenumber}',[AdminController::class,'ManageBooks'])->name('managebooks');
        Route::get('/ManageChapters/{pagenumber}',[AdminController::class,'ManageChapters'])->name('managechapters');
        Route::get('/ManageRecords/{pagenumber}',[AdminController::class,'ManageRecords'])->name('managerecords');
        Route::get('/EditVersions/{id}',[AdminController::class,'EditVersions'])->name('editversions');
        Route::get('/EditBooks/{id}',[AdminController::class,'EditBooks'])->name('editbooks');
        Route::get('/EditChapters/{id}',[AdminController::class,'EditChapters'])->name('editchapters');
        Route::get('/EditRecords/{id}',[AdminController::class,'EditRecords'])->name('editrecords');
        Route::get('/getVersions/{pagenumber}',[AdminController::class,'getVersions'])->name('getversions');
        Route::get('/AddVersions',[AdminController::class,'AddVersions'])->name('addversions');
        Route::get('/AddBooks',[AdminController::class,'AddBooks'])->name('addbooks');
        Route::get('/AddRecords',[AdminController::class,'AddRecords'])->name('addrecords');
        Route::get('/AddChapter',[AdminController::class,'AddChapter'])->name('addchapter');
        Route::post('/PickBooks',[AdminController::class,'PickBooks'])->name('pickbooks');
        Route::post('/StatusChange',[ExcelController::class,'StatusChange'])->name('statuschange');
        Route::post('/BookUploadPost',[ExcelController::class,'BookUploadPost'])->name('bookuploadpost');
        Route::post('/VerseUploadPost',[ExcelController::class,'VerseUploadPost'])->name('verseuploadpost');
        Route::post('/ConfirmRecord',[ExcelController::class,'ConfirmRecord'])->name('confirmrecord');
        Route::post('/ConfirmAll',[ExcelController::class,'ConfirmAll'])->name('confirmall');
        Route::post('/RejectAll',[ExcelController::class,'RejectAll'])->name('rejectall');
        Route::post('/RejectRecord',[ExcelController::class,'RejectRecord'])->name('rejectrecord');
        Route::post('/RevertRecord',[ExcelController::class,'RevertRecord'])->name('revertrecord');
        Route::post('/PickChapters',[AdminController::class,'PickChapters'])->name('pickchapters');
        
        Route::post('/versUploadVersion',[ExcelController::class,'versUploadVersion'])->name('versuploadversion');
        Route::post('/UploadVersion',[ExcelController::class,'UploadVersion'])->name('uploadversion');
        Route::post('/PickVersions',[AdminController::class,'PickVersions'])->name('pickversions');
        Route::post('/PickChapters',[AdminController::class,'PickChapters'])->name('pickchapters');
        Route::post('/AddVersionsPost',[AdminController::class,'AddVersionsPost'])->name('addversionpost');
        Route::post('/AddChapterPost',[AdminController::class,'AddChapterPost'])->name('addchapterpost');
        Route::post('/AddRecordPost',[AdminController::class,'AddRecordPost'])->name('addrecordpost');
        Route::post('/AddBooksPost',[AdminController::class,'AddBooksPost'])->name('addbookspost');
        Route::post('/UpdateVersionPost',[AdminController::class,'UpdateVersionPost'])->name('updateversionpost');
        Route::post('/UpdateBooksPost',[AdminController::class,'UpdateBooksPost'])->name('updatebookspost');
        Route::post('/UpdateChapterPost',[AdminController::class,'UpdateChapterPost'])->name('updatechapterpost');
        Route::post('/UpdateRecordsPost',[AdminController::class,'UpdateRecordsPost'])->name('updaterecordspost');
        Route::post('/DeleteVersionRecord',[AdminController::class,'DeleteVersionRecord'])->name('deleteversionrecord');
        Route::post('/DeleteBookRecord',[AdminController::class,'DeleteBookRecord'])->name('deletebookrecord');
        Route::post('/DeleteChapterRecord',[AdminController::class,'DeleteChapterRecord'])->name('deletechapterrecord');
        Route::get('/logout',[ AdminController::class,'logout'])->name('logout');
    });

});




