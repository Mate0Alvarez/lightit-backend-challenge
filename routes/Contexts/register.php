<?php

use Illuminate\Support\Facades\Route;
use Src\Register\Infrastructure\Controllers\CreatePatientController;

Route::post(
    'createPatient',
    CreatePatientController::class
);