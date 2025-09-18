<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Src\Evento\Controllers\EventoController;
use App\Src\Cliente\Controllers\ClienteController;
use App\Src\Proveedor\Controllers\ProveedorController;
use App\Src\Servicio\Controllers\ServicioController;
use App\Src\Reserva\Controllers\ReservaController;
use App\Src\Calificacion\Controllers\CalificacionController;
use App\Src\Agenda\Controllers\AgendaController;

Route::view('/', 'welcome')->name('welcome');

Route::resource('eventos', EventoController::class);
Route::get('eventos/pendientes', [EventoController::class, 'pendientes'])->name('eventos.pendientes');

Route::resource('clientes', ClienteController::class);
Route::resource('proveedores', ProveedorController::class);
Route::resource('servicios', ServicioController::class);
Route::resource('reservas', ReservaController::class)->only(['index','create','store','show','destroy','edit','update']);
Route::resource('calificaciones', CalificacionController::class)->only(['index','store']);

Route::get('agenda', [AgendaController::class, 'index'])->name('agenda.index');
Route::view('configuracion', 'modulos.configuracion.index')->name('configuracion.index');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
