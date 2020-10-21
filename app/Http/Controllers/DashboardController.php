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

namespace App\Http\Controllers;

use App\Application;
use App\User;
use App\Vacancy;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPeerReview = Application::where('applicationStatus', 'STAGE_PEERAPPROVAL')->get()->count();
        $totalNewApplications = Application::where('applicationStatus', 'STAGE_SUBMITTED')->get()->count();
        $totalDenied = Application::where('applicationStatus', 'DENIED')->get()->count();

        return view('dashboard.dashboard')
            ->with([
                'vacancies' => Vacancy::all(),
                'totalUserCount' => User::all()->count(),
                'totalDenied' => $totalDenied,
                'totalPeerReview' => $totalPeerReview,
                'totalNewApplications' => $totalNewApplications,
            ]);
    }
}
