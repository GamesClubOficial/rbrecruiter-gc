<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public $fillable = [
      'appointmentDescription',
      'appointmentDate',
      'applicationID',
        'appointmentStatus',
      'appointmentLocation'
    ];

    public function application()
    {
        return $this->belongsTo('App\Application', 'id', 'applicationID');
    }

    public function setStatus($status)
    {
        $this->update([
            'appointmentStatus' => $status
        ]);
    }
}
