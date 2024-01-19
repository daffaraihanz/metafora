<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestSpaceController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\UserHistoryController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CountdownTimerController;

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

Route::get('/send-otp', [AuthController::class, 'sendOtp'])->name('send-otp');
Route::put('/send-otp', [AuthController::class, 'updateOtp']);
Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');
Route::post('/forgot-password', [AuthController::class, 'updateForgotPassword']);
Route::get('/reset-password/{dataId}', [AuthController::class, 'resetPassword'])->name('reset-password');
Route::put('/reset-password/{dataId}', [AuthController::class, 'updatePassword'])->name('reset-password');

Route::get('/registration', [RegistrationController::class, 'index'])->middleware(['auth', 'must-user']);
Route::post('/registration', [RegistrationController::class, 'store'])->middleware(['auth', 'must-user']);

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating']);

Route::get('/login2', [AuthController::class, 'login2'])->name('login2')->middleware('guest');
Route::post('/login2', [AuthController::class, 'authenticating2']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);

Route::get('/landing-page-after', [LandingPageController::class, 'lpAfterIndex'])->middleware(['auth', 'must-user']);
Route::get('/', [LandingPageController::class, 'lpBeforeIndex']);

Route::get('/dashboard-forgot', [DashboardController::class, 'dashboardForgot'])->middleware(['auth', 'must-admin']);
Route::get('/add-otp/{id}', [DashboardController::class, 'addOtp'])->middleware(['auth', 'must-admin']);
Route::put('/add-otp/{id}', [DashboardController::class, 'updateOtp'])->middleware(['auth', 'must-admin']);

Route::get('/dashboard-user', [DashboardController::class, 'dashboardUser'])->middleware(['auth', 'must-admin']);
Route::get('/dashboard-admin', [DashboardController::class, 'dashboardAdmin'])->middleware(['auth', 'must-admin']);

Route::get('/dashboard-request', [DashboardController::class, 'dashboardRequest'])->middleware(['auth', 'must-admin']);
Route::get('/dashboard-purchased', [DashboardController::class, 'dashboardPurchased'])->middleware(['auth', 'must-admin']);
Route::get('/dashboard-test', [DashboardController::class, 'dashboardTest'])->middleware(['auth', 'must-admin']);
Route::get('/dashboard-completed', [DashboardController::class, 'dashboardCompleted'])->middleware(['auth', 'must-admin']);
Route::get('/dashboard-histories/{id}', [DashboardController::class, 'dashboardHistories'])->middleware(['auth', 'must-admin']);

Route::get('/dashboard-question-package', [DashboardController::class, 'dashboardQuestionPackage'])->middleware(['auth', 'must-admin']);
Route::get('/dashboard-question-package-edit/{id}', [DashboardController::class, 'editDashboardQuestionPackage'])->middleware(['auth', 'must-admin']);
Route::put('/dashboard-question-package-edit/{id}', [DashboardController::class, 'updateDashboardQuestionPackage'])->middleware(['auth', 'must-admin']);
Route::get('/add-question-package', [DashboardController::class, 'addQuestionPackage'])->middleware(['auth', 'must-admin']);
Route::post('/add-question-package', [DashboardController::class, 'storeQuestionPackage'])->middleware(['auth', 'must-admin'])->name('timer.update');

Route::get('/add-bab/{id}', [DashboardController::class, 'addBab'])->middleware(['auth', 'must-admin']);
Route::post('/add-bab/{id}', [DashboardController::class, 'storeAddBab'])->middleware(['auth', 'must-admin']);
Route::get('/add-aspect/{id}', [DashboardController::class, 'addAspect'])->middleware(['auth', 'must-admin']);
Route::get('/delete-aspect/{id}', [DashboardController::class, 'deleteAspect'])->middleware(['auth', 'must-admin']);
Route::delete('/delete-aspect/{id}', [DashboardController::class, 'destroyAspect'])->middleware(['auth', 'must-admin']);
Route::post('/add-aspect/{id}', [DashboardController::class, 'storeAspect'])->middleware(['auth', 'must-admin']);

Route::get('/add-question/{id}', [DashboardController::class, 'addQuestion'])->middleware(['auth', 'must-admin']);
Route::post('/add-question/{id}', [DashboardController::class, 'storeAddQuestion'])->middleware(['auth', 'must-admin']);
Route::get('/delete-question/{id}', [DashboardController::class, 'deleteQuestion'])->middleware(['auth', 'must-admin']);
Route::any('/delete-question/{id}', [DashboardController::class, 'destroyQuestion'])->middleware(['auth', 'must-admin']);


Route::get('question-edit/{idQue}/{idQuestionPackage}', [DashboardController::class, 'editQuestion'])->middleware(['auth', 'must-admin']);
Route::put('question-edit/{idQue}/{idQuestionPackage}', [DashboardController::class, 'updateQuestion'])->middleware(['auth', 'must-admin']);
Route::get('answer-edit/{idAns}/{idQuestionPackage}', [DashboardController::class, 'editAnswer'])->middleware(['auth', 'must-admin']);
Route::put('answer-edit/{idAns}/{idQuestionPackage}', [DashboardController::class, 'updateAnswer'])->middleware(['auth', 'must-admin']);

Route::get('/dashboard-question-package', [DashboardController::class, 'dashboardQuestionPackage'])->middleware(['auth', 'must-admin']);
Route::get('/dashboard-question-package-edit/{id}', [DashboardController::class, 'editDashboardQuestionPackage'])->middleware(['auth', 'must-admin']);
Route::put('/dashboard-question-package-edit/{id}', [DashboardController::class, 'updateDashboardQuestionPackage'])->middleware(['auth', 'must-admin']);

Route::put('/dashboard-question-package-update-flag/{id}', [DashboardController::class, 'updateDashboardBab'])->middleware(['auth', 'must-admin']);
Route::get('/dashboard-question-package-update-flag-confirmation/{id}', [DashboardController::class, 'editQuestionPackageFlagConfirmation'])->middleware(['auth', 'must-admin']);

Route::get('/dashboard-aspect/{id}', [DashboardController::class, 'dashboardAspect'])->middleware(['auth', 'must-admin']);
Route::get('/dashboard-aspect-edit/{idQuestionPackage}/{idAspect}', [DashboardController::class, 'editDashboardAspect'])->middleware(['auth', 'must-admin']);
Route::put('/dashboard-aspect-edit/{idAspect}/{idQuestionPackage}', [DashboardController::class, 'updateDashboardAspect'])->middleware(['auth', 'must-admin']);

Route::get('/dashboard-edit-data/{id}', [DashboardController::class, 'edit'])->middleware(['auth', 'must-admin']);
Route::put('/dashboard-update-data-request/{id}', [DashboardController::class, 'update'])->middleware(['auth', 'must-admin']);
Route::get('/delete-data-completed/{id}', [DashboardController::class, 'deleteDataDashboardCompleted'])->middleware(['auth', 'must-admin']);
Route::get('/delete-data-request/{id}', [DashboardController::class, 'deleteDataDashboardRequest'])->middleware(['auth', 'must-admin']);
Route::delete('/destroy-data-request/{id}', [DashboardController::class, 'destroyDataDashboardRequest'])->middleware(['auth', 'must-admin']);
Route::get('/delete-data-purchased/{id}', [DashboardController::class, 'deleteDataDashboardPurchased'])->middleware(['auth', 'must-admin']);
Route::delete('/destroy-data-purchased/{id}', [DashboardController::class, 'destroyDataDashboardPurchased'])->middleware(['auth', 'must-admin']);
Route::delete('/destroy-data/{id}', [DashboardController::class, 'destroy'])->middleware(['auth', 'must-admin']);
Route::delete('/destroy-data-completed/{id}', [DashboardController::class, 'destroyDataCompleted'])->middleware(['auth', 'must-admin']);

Route::get('/generate-confirmation/{id}', [DashboardController::class, 'generateConfirmation'])->middleware(['auth', 'must-admin']);
Route::put('/dashboard-update-data-purchased/{id}', [DashboardController::class, 'updateGenerateInformation'])->middleware(['auth', 'must-admin']);

Route::get('/dashboard-sub-aspect/{id}', [DashboardController::class, 'dashboardSubAspect'])->middleware(['auth', 'must-admin']);
Route::get('/add-sub-aspect/{id}', [DashboardController::class, 'addDashboardSubAspect'])->middleware(['auth', 'must-admin']);
Route::post('/add-sub-aspect/{id}', [DashboardController::class, 'storeDashboardSubAspect'])->middleware(['auth', 'must-admin']);
Route::get('/edit-sub-aspect/{idSubAspect}/{idAspect}', [DashboardController::class, 'editDashboardSubAspect'])->middleware(['auth', 'must-admin']);
Route::put('/update-sub-aspect/{idSubAspect}/{idAspect}', [DashboardController::class, 'updateDashboardSubAspect'])->middleware(['auth', 'must-admin']);
Route::get('/delete-sub-aspect/{idSubAspect}/{idAspect}', [DashboardController::class, 'deleteDashboardSubAspect'])->middleware(['auth', 'must-admin']);
Route::any('/delete-sub-aspect/{idSubAspect}/{idAspect}', [DashboardController::class, 'destroyDashboardSubAspect'])->middleware(['auth', 'must-admin']);
// Route::post('/add-dashbord-result', [DashboardController::class, 'storeDashboardSubAspect'])->middleware('auth');

Route::get('/user-history/{id}', [UserHistoryController::class, 'index'])->middleware(['auth', 'must-user']);

Route::get('/test-rules/{id}', [TestSpaceController::class, 'testRules'])->middleware(['auth', 'must-user', 'must-that-user-test']);
Route::any('/test-space/{id}', [TestSpaceController::class, 'testSpace'])->middleware(['auth', 'must-user', 'must-that-user-test']);

Route::get('/test-space-confirmation', [TestSpaceController::class, 'testSpaceConfirmation'])->middleware(['auth', 'must-user']);

Route::get('/result', [TestSpaceController::class, 'resultTimeOut'])->middleware(['auth', 'must-user'])->name('result');
Route::get('/result/{id}', [TestSpaceController::class, 'result'])->middleware(['auth', 'must-user', 'must-that-user-result'])->name('result');

Route::put('update-value-helper-prev/{idReg}', [TestSpaceController::class, 'updateValueHelperPrev'])->middleware(['auth', 'must-user']);
Route::put('update-value-helper-next/{idQue}/{idReg}', [TestSpaceController::class, 'updateValueHelperNext'])->middleware(['auth', 'must-user']);
Route::put('update-value-helper-done/{idQue}/{idReg}', [TestSpaceController::class, 'doneValueHelperNext'])->middleware(['auth', 'must-user']);

// Route::get('/create-timer', [CountdownTimerController::class, 'create']);
// Route::post('/update-timer', [CountdownTimerController::class, 'update'])->name('timer.update');
// Route::get('/view-timer', [CountdownTimerController::class, 'view']);
