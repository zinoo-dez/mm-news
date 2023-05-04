<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// query builder
Route::get("/query", function () {
    // $users = DB::table('users')->get();

    // $user = DB::table('users')->where('id', "1")->first();
    // $user = DB::table('users')->where('id', "1")->value('name');
    // $user = DB::table('users')->where('id', "155")->orWhere('email', "colby.rogahn@example.com")->value('email');
    // $user = DB::table('users')->find(3);
    // $user = DB::table('users')->pluck('name');
    // $user = DB::table('users')->pluck('name', 'email'); //object
    // $user = DB::table('users')->count();
    // min,max,average
    // $user = DB::table('users')->count();
    // $user = DB::table('users')->select('name', 'email')->get(); //array
    // $user = DB::table('users')->distinct()->get();
    // $user = DB::table('users')
    //     ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
    //     ->get();
    // $user = DB::table('users')
    //     ->rightJoin('posts', 'users.id', '=', 'posts.user_id')
    //     ->get();
    $user = DB::table('users')
        ->join('posts', 'users.id', '=', 'posts.user_id')
        ->select('users.*', 'posts.description')
        ->get();
    return $user;
});


// Laravel Collection(Model)

Route::get("/col", function () {
    $users = User::all();
    // $users->append('name');
    // $users->contains(User::find(1));
    // $users = $users->diff(User::whereIn('id', [1, 2, 3])->get());
    // $users = $users->except([1, 2, 3, 4]);
    // $users = $users->intersect(User::whereIn('id', [1, 2, 3])->get());
    // return $users->modelKeys();
    $users = $users->only([1, 2, 3]);
    return $users;
});
// $users = User::all();
// $user = User::all()->where('id', 2);
