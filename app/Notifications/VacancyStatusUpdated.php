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

namespace App\Notifications;

use App\Facades\Options;
use App\Traits\Cancellable;
use App\Vacancy;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;

class VacancyStatusUpdated extends Notification implements ShouldQueue
{
    use Queueable, SerializesModels, Cancellable;

    protected string $status;


    protected Vacancy $vacancy;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Vacancy $vacancy, $status)
    {
        // there's no simpler solution to this for now, but an array works
        $statusDict = [
            'open' => 'opened',
            'close' => 'closed'
        ];

        $this->vacancy = $vacancy;
        $this->status = $statusDict[$status];
    }

    public function optOut($notifiable)
    {
        return Options::getOption('notify_vacancystatus_change') != 1;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        return (new MailMessage)
                    ->greeting('Hi ' . $notifiable->name . ',')
                    ->from(config('notification.sender.address'), config('notification.sender.name'))
                    ->subject(config('app.name').' - Vacancy ' . $this->status)
                    ->line('The vacancy '.$this->vacancy->vacancyName.', with '.$this->vacancy->vacancyCount.' remaining slots, has just been ' . $this->status . '.')
                    ->line('Please be aware that this position may be change at any time.')
                    ->line('You are receiving this email because you currently have staff/team member privileges. Depending on your access level, you may not be able to view the list of positions on the backoffice.')
                    ->action('View positions', url(route('showPositions')))
                    ->salutation('The team at ' . config('app.name'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
