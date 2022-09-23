<?php

use App\Http\Livewire\Championship\ChampionshipDashboard;
use App\Http\Livewire\Championship\ChampionshipIndex;
use App\Http\Livewire\Player\PlayerIndex;
use App\Http\Livewire\Team\RankingIndex;
use App\Http\Livewire\Team\TeamIndex;
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

Route::get('/dashboard', function () {
    return view('welcome');
})->name('dashboard');

Route::get('/players', PlayerIndex::class)->name('players.index');
Route::get('/teams', TeamIndex::class)->name('teams.index');
Route::get('/championships', ChampionshipIndex::class)->name('championships.index');
route::get('/championship/dashboard/{championship}', ChampionshipDashboard::class)->name('championship.dashboard');
route::get('/teams/rankings', RankingIndex::class)->name('rankings.index');
