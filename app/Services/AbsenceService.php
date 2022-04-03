<?php

namespace App\Services;

use App\Absence;
use App\Exceptions\AbsenceNotActionableException;
use App\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class AbsenceService
{

    /**
     * Determines whether someone already has an active leave of absence request
     *
     * @param User $user The user to check
     * @return bool Their status
     */
    public function hasActiveRequest(Authenticatable $user): bool {

        $absences = Absence::where('requesterID', $user->id)->get();

        foreach ($absences as $absence) {

            // Or we could adjust the query (using a model scope) to only return valid absences;
            // If there are any, refuse to store more, but this approach also works
            // A model scope that only returns cancelled, declined and ended absences could also be implemented for future use
            if (in_array($absence->getRawOriginal('status'), ['PENDING', 'APPROVED']))
            {
                return true;
            }
        }

        return false;
    }

    public function createAbsence(Authenticatable $requester, Request $request)
    {

        $absence = Absence::create([
            'requesterID' => $user->id,
            'start' => $request->start_date,
            'predicted_end' => $request->predicted_end,
            'available_assist' => $request->available_assist == "on",
            'reason' => $request->reason,
            'status' => 'PENDING',
        ]);

        Log::info('Processing new leave of absence request.', [
            'userid' => $user->email,
            'absenceid' => $absence->id,
            'reason' => $request->reason
        ]);

        return $absence;
    }


    /**
     * Sets an absence as Approved.
     *
     * @param Absence $absence The absence to approve.
     * @return Absence The approved absence.
     * @throws AbsenceNotActionableException
     */
    public function approveAbsence(Absence $absence): Absence
    {
        return $absence->setApproved();
    }


    /**
     * Sets an absence as Declined.
     *
     * @param Absence $absence The absence to decline.
     * @return Absence The declined absence.
     * @throws AbsenceNotActionableException
     */
    public function declineAbsence(Absence $absence): Absence
    {
        return $absence->setDeclined();
    }


    /**
     * Sets an absence as Cancelled.
     *
     * @param Absence $absence The absence to cancel.
     * @return Absence The cancelled absence.
     * @throws AbsenceNotActionableException
     */
    public function cancelAbsence(Absence $absence)
    {
        return $absence->setCancelled();
    }

    /**
     * Removes an absence
     *
     * @param Absence $absence The absence to remove.
     * @return bool Whether the absence was removed.
     */
    public function removeAbsence(Absence $absence): bool
    {
        return $absence->delete();
    }





}

