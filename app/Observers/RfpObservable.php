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
        $original_status = $rfp->getOriginal('status');
        $current_status  = $rfp->status;

        $is_selected        = $current_status === RFP::STATUS_BID_SELECTED;
        $status_has_changed = $current_status !== $original_status;
        if ($is_selected && $status_has_changed) {
            $rfp->trip->rfp_id = $rfp->id;
        }

    }
}
