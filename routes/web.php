<?php

use App\Http\Controllers\ControllerEpisodes;
use App\Http\Controllers\ControllerSeasons;
use App\Http\Controllers\ControllerSeries;
use App\Http\Controllers\ControllerTeste;
use App\Http\Controllers\ControllerUsers;
use App\Http\Middleware\Autenticador;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Logging\TeamCity;

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

Route::get('/ola', function () { ?>
    <h1 style="box-sizing:border-box; display: grid; place-items: center; ">Olá Mundo</h1>
<?php })->name('ola');

Route::get('/', function() {
    return to_route('series.index');
})->middleware(Autenticador::class);

Route::get('/login', function () {
    return to_route('user.index');
})->name('login')->middleware(Autenticador::class);

Route::resource('/user', ControllerUsers::class)->only(['index', 'store', 'destroy'])->middleware(Autenticador::class);

Route::resource('/series', ControllerSeries::class)->except(['show'])->middleware(Autenticador::class);

Route::get('/series/{series}/seasons', [ControllerSeasons::class, 'index'])->name('seasons.index')->middleware(Autenticador::class);

Route::get('/seasons/{season}/episodes', [ControllerEpisodes::class, 'index'])->name('episodes.index')->middleware(Autenticador::class);

Route::post('/seasons/{season}/episodes', [ControllerEpisodes::class, 'update'])->name('episodes.update')->middleware(Autenticador::class);
