<?php

use App\Http\Controllers\ControllerEpisodes;
use App\Http\Controllers\ControllerSeasons;
use App\Http\Controllers\ControllerSeries;
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

Route::get('/ola', function () { ?>
    <h1 style="display: grid; place-items: center;">Olá Mundo</h1>
<?php });

Route::resource('/series', ControllerSeries::class)->except(['show']);

Route::get('/episodes', [ControllerEpisodes::class, 'index'])->name('episodes.index');

Route::get('/series/{series}/seasons', [ControllerSeasons::class, 'index'])->name('seasons.index');