<?php
use App\EndPoints\Library\GetLibraryAction;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ArticleController;
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