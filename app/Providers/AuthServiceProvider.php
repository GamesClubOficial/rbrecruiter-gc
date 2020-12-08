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

namespace App\Providers;

use App\Application;
use App\Appointment;
use App\Ban;
use App\Form;
use App\Policies\ApplicationPolicy;
use App\Policies\AppointmentPolicy;
use App\Policies\BanPolicy;
use App\Policies\FormPolicy;
use App\Policies\ProfilePolicy;
use App\Policies\TeamPolicy;
use App\Policies\UserPolicy;
use App\Policies\VacancyPolicy;
use App\Policies\VotePolicy;
use App\Team;
use App\User;
use App\Vacancy;
use App\Vote;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Application::class => ApplicationPolicy::class,
        Profile::class => ProfilePolicy::class,
        User::class => UserPolicy::class,
        Vacancy::class => VacancyPolicy::class,
        //Form::class => FormPolicy::class
        'App\Form' => 'App\Policies\FormPolicy',
        Vote::class => VotePolicy::class,
        Ban::class => BanPolicy::class,
        Appointment::class => AppointmentPolicy::class,
        Team::class => TeamPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //
    }
}
