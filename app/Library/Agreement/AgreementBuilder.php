<?php
/**
 * This class creates the agreement for the hotel and client
 * php version 7.1
 *
 * @category Library
 * @package  App\Library
 * @author   Joseph Montanez <jm@comentum.com>
 * @license  https://opensource.org/licenses/BSD-3-Clause BSD
 * @link     https://sportstravelhq.com
 */

namespace App\Library\Agreement;


use App\Library\Agreement\AgreementBuilder as self;

/**
 * Class AgreementBuilder√
 *
 * @category Library
 * @package  App\Library
 * @author   Joseph Montanez <jm@comentum.com>
 * @license  https://opensource.org/licenses/BSD-3-Clause BSD
 * @link     https://sportstravelhq.com
 */
class AgreementBuilder
{
    /**
     * The hotel that will be responsible for the agreement
     *
     * @var \App\Models\Hotel $hotel
     */
    public $hotel;

    /**
     * The request for proposal agreement bid
     *
     * @var \App\Models\Rfp $rfp
     */
    public $rfp;

    /**
     * The Hotel Manager user
     *
     * @var \App\User
     */
    public $hotel_manager;

    /**
     * The trip
     *
     * @var \App\Models\UserTrip
     */
    public $trip;

    public function create()
    {
        $data   = new AgreementData();
        $mapper = new Mapper();
        $mapper->mapFromHotelManager($this->hotel_manager, $data);
        $mapper->mapFromHotel($this->hotel, $data);
        $mapper->mapFromRfp($this->rfp, $data);
        $mapper->mapFromTrip($this->trip, $data);

        $agreement = new HotelAgreement();
        $mapper->mapToRecord($data);


        return $agreement;
    }

    /**
     * Get the hotel from the builder
     *
     * @return \App\Models\Hotel
     */
    public function getHotel(): \App\Models\Hotel
    {
        return $this->hotel;
    }

    /**
     * Assign the hotel to the builder
     *
     * @param \App\Models\Hotel $hotel The hotel to bind
     *
     * @return \App\Library\Agreement\AgreementBuilder
     */
    public function setHotel(\App\Models\Hotel $hotel): self
    {
        $this->hotel = $hotel;

        return $this;
    }

    /**
     * Gets the request for proposal agreement bid
     *
     * @return \App\Models\Rfp
     */
    public function getRfp(): \App\Models\Rfp
    {
        return $this->rfp;
    }

    /**
     * Sets the request for proposal agreement bid
     *
     * @param \App\Models\Rfp $rfp The request for proposal agreement bid
     *
     * @return \App\Library\Agreement\AgreementBuilder
     */
    public function setRfp(\App\Models\Rfp $rfp): self
    {
        $this->rfp = $rfp;

        return $this;
    }

    /**
     * Set the sales manager record for the agreement
     *
     * @param \App\User $hotel_manager The hotel manager
     *
     * @return \App\Library\Agreement\AgreementBuilder
     */
    public function setHotelManager(\App\User $hotel_manager): self
    {
        $this->hotel_manager = $hotel_manager;

        return $this;
    }

    /**
     * Get the trip
     *
     * @return \App\Models\UserTrip
     */
    public function getTrip(): \App\Models\UserTrip
    {
        return $this->trip;
    }

    /**
     * Set the trip
     *
     * @param \App\Models\UserTrip $trip The trip to set
     *
     * @return \App\Library\Agreement\AgreementBuilder
     */
    public function setTrip(\App\Models\UserTrip $trip): self
    {
        $this->trip = $trip;

        return $this;
    }
}
