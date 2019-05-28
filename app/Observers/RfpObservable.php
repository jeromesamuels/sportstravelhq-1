<?php

namespace App\Observers;

use App\Models\Rfp;

class RfpObservable
{
    /**
     * Handle the organization user "saved" event.
     *
     * @param \App\Models\Rfp $rfp The record saved
     *
     * @return void
     */
    public function saved(Rfp $rfp)
    {
        $current_status = $rfp->status;

        $is_selected = $current_status === RFP::STATUS_BID_SELECTED;
        if ($is_selected) {
            $trip = $rfp->trip;

            $trip->rfp_id = $rfp->id;
            $trip->save();
        }

    }
}
