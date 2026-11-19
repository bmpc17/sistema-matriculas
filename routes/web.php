<?php
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('inicio'))->name('inicio');