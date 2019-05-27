<?php
/**
 * This class maps all values to a Vue data component
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
 * Class Agreement
 * php version 7.1
 *
 * @category Library
 * @package  App\Library
 * @author   Joseph Montanez <jm@comentum.com>
 * @license  https://opensource.org/licenses/BSD-3-Clause BSD
 * @link     https://sportstravelhq.com
 */
class AgreementData
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

    public $hotel_id = 0;
    public $hotel_name = '';
    public $hotel_address = '';
    public $hotel_city = '';
    public $hotel_state = '';
    public $hotel_zipcode = '';
    public $hotel_phone = '';


    public $user_trip_id = 0;
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

    //-- What the club fills out
    public $travel_coordinator_id = 0;
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

    //-- What the hotel fills out
    public $hotel_manager_id = 0;
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

    /**
     * The ID to the RFP
     *
     * @var int
     */
    public $rfp_id;


    /**
     * Returns the array version needed for Vue. Some of these variables don't
     * make sense so its better to create a manual map to array so that they can
     * be renamed later on without affecting JavaScript code.
     *
     * @return array
     */
    public function toArray(): array
    {

        return [
            'signin'                                => $this->signing,
            'price_room'                            => $this->price_room,
            'decision_date'                         => $this->decision_date,
            'commission_rate'                       => $this->commission_rate,
            'checkin_time'                          => $this->checkin_time,
            'checkin_text'                          => $this->checkin_text,
            'checkout_time'                         => $this->checkout_time,
            'checkout_text'                         => $this->checkout_text,
            'current_date'                          => $this->current_date,
            'arrival_date'                          => $this->arrival_date,
            'arrival_day'                           => $this->arrival_day,
            'arrival_date2'                         => $this->arrival_date2,
            'departure_date'                        => $this->departure_date,
            'name_of_group'                         => $this->name_of_group,
            'contact'                               => $this->contact,
            'hotel_name'                            => $this->hotel_name,
            'hotel_address'                         => $this->hotel_address,
            'hotel_city'                            => $this->hotel_city,
            'hotel_state'                           => $this->hotel_state,
            'hotel_zipcode'                         => $this->hotel_zipcode,
            'hotel_phone'                           => $this->hotel_phone,
            'address'                               => $this->address,
            'address2'                              => $this->address2,
            'hotel_honors'                          => $this->hotel_honors,
            'city'                                  => $this->city,
            'state'                                 => $this->state,
            'zipcode'                               => $this->zipcode,
            'phone'                                 => $this->phone,
            'email'                                 => $this->email,
            'sales_person'                          => $this->sales_person,
            'sales_person_role'                     => $this->sales_person_role,
            'sales_phone'                           => $this->sales_phone,
            'sales_email'                           => $this->sales_email,
            'sales_fax'                             => $this->sales_fax,
            'iata_no'                               => $this->iata_no,
            'queen_guest_rooms'                     => $this->queen_guest_rooms,
            'queen_guest_rate'                      => $this->queen_guest_rate,
            'king_guest_rooms'                      => $this->king_guest_rooms,
            'king_guest_rate'                       => $this->king_guest_rate,
            'mode'                                  => $this->mode,
            'hotel_agreements_id'                   => $this->hotel_agreements_id,
            'hotel_agreements_address'              => $this->hotel_agreements_address,
            'hotel_agreements_address2'             => $this->hotel_agreements_address2,
            'hotel_agreements_city'                 => $this->hotel_agreements_city,
            'hotel_agreements_state'                => $this->hotel_agreements_state,
            'hotel_agreements_zipcode'              => $this->hotel_agreements_zipcode,
            'hotel_agreements_signature'            => $this->hotel_agreements_signature,
            'hotel_agreements_signature_type'       => $this->hotel_agreements_signature_type,
            'hotel_agreements_signature_date'       => $this->hotel_agreements_signature_date,
            'hotel_agreements_date'                 => $this->hotel_agreements_date,
            'hotel_agreements_first_name'           => $this->hotel_agreements_first_name,
            'hotel_agreements_last_name'            => $this->hotel_agreements_last_name,
            'hotel_agreements_title'                => $this->hotel_agreements_title,
            'hotel_agreements_email'                => $this->hotel_agreements_email,
            'hotel_agreements_phone'                => $this->hotel_agreements_phone,
            'hotel_agreements_rewards_number'       => $this->hotel_agreements_rewards_number,
            'url'                                   => $this->url,
            'hotel_agreements_hotel_first_name'     => $this->hotel_agreements_hotel_first_name,
            'hotel_agreements_hotel_last_name'      => $this->hotel_agreements_hotel_last_name,
            'hotel_agreements_hotel_title'          => $this->hotel_agreements_hotel_title,
            'hotel_agreements_hotel_signature'      => $this->hotel_agreements_hotel_signature,
            'hotel_agreements_hotel_signature_type' => $this->hotel_agreements_hotel_signature_type,
            'hotel_agreements_hotel_signature_date' => $this->hotel_agreements_hotel_signature_date,
            'error_title'                           => $this->error_title,
            'error_message'                         => $this->error_message,
            'confirmed_reading'                     => $this->confirmed_reading,
            'signature'                             => $this->signature,
            'signature_type'                        => $this->signature_type,
            'hotel_signature'                       => $this->hotel_signature,
            'hotel_signature_type'                  => $this->hotel_signature_type,
            'current_id'                            => $this->current_id,
            'processing'                            => $this->processing,
            'progress'                              => $this->progress,
            'progressInterval'                      => $this->progressInterval,
        ];
    }
}
