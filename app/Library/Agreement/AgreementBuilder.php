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


/**
 * Class AgreementBuilder
 * php version 7.1
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

    public function create()
    {
        $data   = new AgreementData();
        $mapper = new Mapper();
        $mapper->mapFromHotel($this->hotel, $data);
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
     * @return self
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
     * @return self
     */
    public function setRfp(\App\Models\Rfp $rfp): self
    {
        $this->rfp = $rfp;

        return $this;
    }
}
