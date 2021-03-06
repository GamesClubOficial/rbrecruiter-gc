<?php

/*
 * Copyright © 2020 Miguel Nogueira
 *
 *   This file is part of Raspberry Staff Manager.
 *
 *     Raspberry Staff Manager is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU General Public License as published by
 *     the Free Software Foundation, either version 3 of the License, or
 *     (at your option) any later version.
 *
 *     Raspberry Staff Manager is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public License
 *     along with Raspberry Staff Manager.  If not, see <https://www.gnu.org/licenses/>.
 */

use App\Http\Controllers\ApplicationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['api'])->group(function (){


    Route::group(['prefix' => 'applications'], function () {

        Route::get('/', [ApplicationController::class, 'showAllApps']);
        Route::get('view/{application}', [ApplicationController::class, 'showUserApp']);
        Route::post('apply/{vacancySlug}', [ApplicationController::class, 'saveApplicationAnswers']);
        Route::patch('update/{application}/{newStatus}', [ApplicationController::class, 'updateApplicationStatus']);
        Route::delete('delete/{application}', [ApplicationController::class, 'delete']);

    });

    Route::group(['prefix' => 'vacancies'], function () {

    });

});
