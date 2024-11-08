<?php

use App\Models\Table;
use App\Models\Ticket;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReCAPTCHAController;

Route::get('/', function () {
    $groups = App\Models\Group::all();
    $products = App\Models\Product::all();
    $productsTpv = App\Models\Table::find(session('tableSelected'))->products ?? [];

    return view('welcome', compact('groups', 'products','productsTpv'));
})->name('index');

Route::get('tickets/{ticket}/show', [TicketController::class, 'show'])->name('tickets.show');

route::get('return-form-ticket', function() {
    $table = Table::find(session('tableSelected'));

    $table->products()->detach();
    
    session()->forget('tableSelected');
    session()->flash('ticket_creado_correctamente');
    return response()->json('variable flash creada correctamente');
})->name('return-from-ticket');

Route::resources([
    'tickets' => TicketController::class,
    'groups' => GroupController::class,
    'products' => ProductController::class
]);

Route::get('/verify-recaptcha', [ReCAPTCHAController::class, 'show'])->name('recaptcha.verify');
Route::post('/verify-recaptcha', [ReCAPTCHAController::class, 'verify']);