<?php

namespace App\Console\Commands;

use App\Models\UserTrip;
use Illuminate\Console\Command;

class DeleteAllTripsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trips:truncate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /**
         * @var \App\Models\UserTrip[] $trips
         */
        $trips = UserTrip::all();

        foreach ($trips as $trip) {
            $amenities = $trip->amenities;
            $rfps = $trip->rfps;
            $status_logs = $trip->status_logs;

            /** @var \App\Models\tripstatuslogs $status_log */
            foreach ($status_logs as $status_log) {
                $status_log->delete();
            }

            /** @var \App\Models\hotelamenities $amenity */
            foreach ($amenities as $amenity) {
                /** @var \Illuminate\Database\Eloquent\Relations\Pivot $amenityPivotRecord */
                $amenityPivotRecord = $amenity->getRelation('pivot');
                $amenityPivotRecord->delete();
            }

            /** @var \App\Models\Rfp $rfp */
            foreach ($rfps as $rfp) {
                $invoices = $rfp->invoices;
                /** @var \App\Models\invoices $invoice */
                foreach ($invoices as $invoice) {
                    $invoice->delete();
                }

                /** @var \App\Models\HotelAgreement $agreement */
                $agreement = $rfp->hotelAgreement;
                if ($agreement) {
                    $agreement->delete();
                }

                $rfp->delete();
            }

            $trip->delete();
        }
    }
}
