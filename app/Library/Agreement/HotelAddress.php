<?php
/**
 * This class hold the hotel address since its pull from many places
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
 * Class HotelAddress
 * php version 7.1
 *
 * @category Library
 * @package  App\Library
 * @author   Joseph Montanez <jm@comentum.com>
 * @license  https://opensource.org/licenses/BSD-3-Clause BSD
 * @link     https://sportstravelhq.com
 */
class HotelAddress
{
    /**
     * The city of the address
     *
     * @var string $city
     */
    public $city;

    /**
     * The state of the address
     *
     * @var string $state
     */
    public $state;

    /**
     * The country of the address
     *
     * @var string $country
     */
    public $country;

    /**
     * This parses the address field to pull city, state, country
     *
     * @param string $value The hotel
     *
     * @return string
     */
    public function parseAddress($value): HotelAddress
    {
        $address = explode(',', $value);

        $city    = '';
        $state   = '';
        $country = '';

        if (count($address) > 0) {
            $city = trim($address[0]);
        }

        if (count($address) > 1) {
            $state = trim($address[1]);
        }

        if (count($address) > 2) {
            $country = trim($address[2]);
        }

        if (strlen($city) > 0) {
            $this->city = $city;
        }

        if (strlen($state) > 0) {
            $this->state = $state;
        }

        if (strlen($country) > 0) {
            $this->country = $country;
        }

        return $this;
    }
}
