<?php
use App\EndPoints\Library\GetLibraryAction;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FooterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Mail\MyEmail;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/home', [HomeController::class, 'index']);
Route::get('/home-about', [HomeController::class, 'about']);
Route::get('/service', [ServiceController::class, 'index']);
Route::get('/faq', [FaqController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/footer', [FooterController::class, 'index']);
Route::get('/library', [LibraryController::class, 'index']);
// Route::get('/library', GetLibraryAction::class);
Route::get('/library/{slug}', [LibraryController::class, 'show']);
Route::get('/article', [ArticleController::class, 'index']);
Route::get('/article/{slug}', [ArticleController::class, 'show']);
Route::post('/article/add/{slug}', [ArticleController::class, 'addLike']);
Route::post('/send-email', function (Request $request) {
    $mailSender=$request->email;
    // Mail::to('mailforpanda0@gmail.com')->send(new MyEmail());
    Mail::to($request->value['email'])->send(new MyEmail($request->value['name'], $request->value['message']));
    return "Email sent successfully!";
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});