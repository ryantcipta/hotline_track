<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\UserController;
use App\Models\Order;
use App\Models\Pengiriman;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Models\User;

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





//route order
Route::group(['middleware'=>['auth']], function(){
Route::group(['middleware'=>['ceklogin:admin']], function(){
    Route::get('/order',[OrderController::class,'index'])->name('order');
    Route::post('/order/import_excel', [OrderController::class,'import_excel']);
    Route::get('/order/{id}/edit',[OrderController::class, 'edit'])->name('order.edit');
    Route::put('/order/{id}',[OrderController::class, 'update'])->name('order.update');
    Route::delete('/order{id}/destroy',[OrderController::class, 'destroy'])->name('order.destroy');
    Route::delete('/delete-all', [OrderController::class, 'deleteAll'])->name('delete.all');
});
});



Route::get('/login', [UserController::class,'showLoginForm']);
Route::post('/login', [UserController::class,'login'])->name('auth.login'); 
// Route::get('/register', [UserController::class, 'showRegistrationForm']);
// Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
 
//route tracking
Route::get('/tracking-hotline', [TrackingController::class, 'index']);
Route::get('/search', [TrackingController::class, 'index'])->name('search');


//route dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('ceklogin:admin');
});


Route::get('/forgot-password', function(){
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function  (Request $request)
{
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
    ? back()->with(['status' => __($status)])
    : back()->withErrors(['email' => __($status)]);

})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token){
    return view('auth.reset-password', ['token' => $token]);

})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('auth.login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');


Route::group(['middleware'=>['auth']], function(){
    Route::group(['middleware'=>['ceklogin:admin']], function(){
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/change-password', [ProfileController::class, 'showChangePasswordForm'])->name('password.change');
        Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('update.password');
    });
});
    


// Route::get('/user',[UserController::class, 'edit_list']);
    
