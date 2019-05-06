<?php
/**
 * This class maps all values to a Vue data component
 * php version 7.1
 *
 * @category Library
 * @package  App\Library
 * @author   Joseph Montane <jm@comentum.com>
 * @license  https://opensource.org/licenses/BSD-3-Clause BSD
 * @link     https://sportstravelhq.com
 */

namespace App\Library\Agreement;

/**
 * Class Agreement
 * php version 7.1
 *
 * @category Library
 * @package  App\Library
 * @author   Joseph Montane <jm@comentum.com>
 * @license  https://opensource.org/licenses/BSD-3-Clause BSD
 * @link     https://sportstravelhq.com
 */


class Agreement
{

    /**
     * Signing constants
     */
    const SIGNING_HOTEL = 'hotel';
    const SIGNING_CLUB = 'club';


    /**
     * Mode constants
     */
    const MODE_EDIT = 'edit';
    const MODE_VIEW = 'view';

    /**
     * Who is signing the hotel or club?
     *
     * @var string
     */
    public $signing = self::SIGNING_CLUB;
    public $price_room = '';
    public $decision_date = '';
    public $commission_rate = '';
    public $checkin_time = '';
    public $checkin_text = '';
    public $checkout_time = '';
    public $checkout_text = '';
    public $current_date = '';
    public $arrival_date = '';
    public $arrival_day = '';
    public $arrival_date2 = '';
    public $departure_date = '';
    public $name_of_group = '';
    public $contact = '';

    public $hotel_name = '';
    public $hotel_address = '';
    public $hotel_city = '';
    public $hotel_state = '';
    public $hotel_zipcode = '';
    public $hotel_phone = '';


    public $address = '';
    public $address2 = '';
    public $hotel_honors = '';
    public $city = '';
    public $state = '';
    public $zipcode = '';
    public $phone = '';
    public $email = '';
    public $sales_person = '';
    public $sales_person_role = '';
    public $sales_phone = '';
    public $sales_email = '';
    public $sales_fax = '';
    public $iata_no = '';

    public $queen_guest_rooms = '';
    public $queen_guest_rate = '';
    public $king_guest_rooms = '';
    public $king_guest_rate = '';

    /**
     * What mode does this agreement appear as, edit or view?
     *
     * @var string
     */
    public $mode = self::MODE_EDIT;

    public $hotel_agreements_id = '';
    public $hotel_agreements_address = '';
    public $hotel_agreements_address2 = '';
    public $hotel_agreements_city = '';
    public $hotel_agreements_state = '';
    public $hotel_agreements_zipcode = '';
    public $hotel_agreements_signature = '';
    public $hotel_agreements_signature_type = '';
    public $hotel_agreements_signature_date = '';
    public $hotel_agreements_date = '';
    public $hotel_agreements_first_name = '';
    public $hotel_agreements_last_name = '';
    public $hotel_agreements_title = '';
    public $hotel_agreements_email = '';
    public $hotel_agreements_phone = '';
    public $hotel_agreements_rewards_number = '';

    public $url = '';

    public $hotel_agreements_hotel_first_name = '';
    public $hotel_agreements_hotel_last_name = '';
    public $hotel_agreements_hotel_title = '';
    public $hotel_agreements_hotel_signature = '';
    public $hotel_agreements_hotel_signature_type = '';
    public $hotel_agreements_hotel_signature_date = '';

    public $error_title = '';
    public $error_message = '';
    public $confirmed_reading = false;
    public $signature = '';
    public $signature_type = false;
    public $hotel_signature = '';
    public $hotel_signature_type = false;
    public $current_id = false;
    public $processing = false;
    public $progress = 0;
    public $progressInterval = null;

    /**
     * These are the keys to validate against. This should depend on who is
     * signing.This also controls the signing flow, what order the user
     * progresses through.
     *
     * @var array
     */
    public $agreement_client_ids = [
        'id_address',
        'id_address2',
        'id_city',
        'id_state',
        'id_zipcode',
        'id_phone',
        'id_email',
        'id_authorized_by',
        'id_first_name',
        'id_last_name',
        'id_title',
        'id_signature_date',
    ];
}
