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

namespace App\Listeners;

use App\Events\ApplicationApprovedEvent;
use App\Notifications\ApplicationApproved;
use Illuminate\Support\Facades\Log;

class PromoteUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param ApplicationApprovedEvent $event
     * @return void
     */
    public function handle(ApplicationApprovedEvent $event)
    {
        Log::info('User '.$event->application->user->name . 'has just been promoted (application approved)');

        $event->application->setStatus('APPROVED');
        $event->application->response->vacancy->decrease();
        $event->application->user->assignRole('reviewer');

        $event->application->user->notify(new ApplicationApproved($event->application));
    }
}
