<?php

use App\Models\Badge;
use App\Models\Challenge;
use App\Models\User;
use App\Models\Vraag;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/overzicht', function () {
    return view('overzicht', [
        'vragen' => Vraag::with('categorieen')->get(),
        'challenges' => Challenge::all(),
        'badges' => Badge::all(),
        'gebruikers' => User::orderByDesc('score')->get(),
    ]);
});