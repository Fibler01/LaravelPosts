<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

/* seguindo padrao mvc, model view controller */
Route::get('/post', [PostController::class, 'index'])->middleware(['auth'])->name('post');



/* rota para ir para a página de criação de novo post */
Route::get('/post/new', [PostController::class, 'create'])->middleware(['auth'])->name('new-post');

/* rota para ir para a pagina de edição de post */
Route::get('/post/edit/{id}', [PostController::class, 'edit'])->middleware(['auth']);

/* rota para criar post */
Route::post('/post/create', [PostController::class, 'store'])->middleware(['auth']);

/* rota para atualizar post */
Route::post('/post/update/{id}', [PostController::class, 'update'])->middleware(['auth']);

/* rota para deletar o post */
Route::get('/post/delete/{id}', [PostController::class, 'destroy'])->middleware(['auth']);

/* rota para listagem de usuarios */
Route::get('/user', [UserController::class, 'index'])->middleware(['auth'])->name('user');

/* rota para visualizar unico post */
Route::get('/post/view/{id}', [PostController::class, 'show'])->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
