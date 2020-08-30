<?php

use App\Facades\Options;
use Illuminate\Database\Seeder;

class DefaultOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Options::setOption('notify_new_application_email', true, 'Notify when a new application comes through');
        Options::setOption('notify_application_comment', false, 'Notify when someone comments on an application');
        Options::setOption('notify_new_user', true, 'Notify when someone signs up');
        Options::setOption('notify_application_status_change', true, 'Notify when an application changes status');
        Options::setOption('notify_applicant_approved', true, 'Notify when an applicant is approved');
        Options::setOption('notify_vacancystatus_change', false, 'Notify when a vacancy\'s status changes');


        Options::setOption('enable_slack_notifications', true, 'Enable slack notifications');
        Options::setOption('enable_email_notifications', true, 'Enable e-mail notifications');

    }
}