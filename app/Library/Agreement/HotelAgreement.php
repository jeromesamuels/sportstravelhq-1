<?php

namespace App\Library\Agreement;

/**
 * Class HotelAgreement
 *
 * @category Library
 * @package  App\Library
 * @author   Joseph Montane <jm@comentum.com>
 * @license  https://opensource.org/licenses/BSD-3-Clause BSD
 * @link     https://sportstravelhq.com
 */
class HotelAgreement
{

    /**
     * Validate the agreement questionnaire data
     *
     * @param array $data        The agreement data
     * @param bool  $requires_cc If credit card auth is required from hotel bid
     * @param array $errors      The preset of errors
     *
     * @return array
     */
    public static function validateQuestionnaire(array $data = [], $requires_cc, array $errors = [])
    {
        if (!isset($data['is_authorized'])) {
            $errors['is_authorized'] = 'Please let us know if you can sign for this agreement.';
        }

        if ($requires_cc && !isset($data['is_billing_authorized'])) {
            $errors['is_billing_authorized'] = 'Please let us know if you can sign for this agreement.';
        }


        if ($data['is_authorized'] === 0) {
            if (strlen(trim($data['first_name'])) === 0) {
                $errors['first_name'] = 'Please enter the first name.';
            }
            if (strlen(trim($data['last_name'])) === 0) {
                $errors['last_name'] = 'Please enter the last name.';
            }
            if (strlen(trim($data['email'])) === 0) {
                $errors['email'] = 'Please enter an email.';
            }
            if (strlen(trim($data['phone'])) === 0) {
                $errors['phone'] = 'Please enter the phone number.';
            }
        }


        if ($requires_cc && $data['is_billing_authorized'] === 0) {
            foreach ($data['team_contacts'] as $index => $contact) {
                if (strlen(trim($contact['first_name'])) === 0) {
                    $errors = self::addTeamError($errors, $index, 'first_name', 'Please enter the first name.');
                }
                if (strlen(trim($contact['last_name'])) === 0) {
                    $errors = self::addTeamError($errors, $index, 'last_name', 'Please enter the last name.');
                }
                if (strlen(trim($contact['email'])) === 0) {
                    $errors = self::addTeamError($errors, $index, 'email', 'Please enter an email.');
                }
                if (strlen(trim($contact['phone'])) === 0) {
                    $errors = self::addTeamError($errors, $index, 'phone', 'Please enter the phone number.');
                }
            }
        }

        return $errors;
    }

    /**
     * @param int   $trip_id
     * @param array $data
     * @param bool  $requires_cc
     */
    public static function saveQuestionnaire($trip_id, $data, $requires_cc)
    {

        $agreement = Trips::getAgreement($trip_id) ?: [];

        $hotel_agreements_tbl = new mysqli_db_table('hotel_agreements');
        if (!empty($agreement['hotel_agreements_id'])) {
            $hotel_agreements_tbl->update($agreement, $agreement['hotel_agreements_id']);
        } else {
            //-- Generate pdf password link to trip since agreement will be deleted
            $password                           = Trips::generatePdfPassword($trip_id);
            $agreement['join_coordinator_id']   = $_SESSION['coordinator_id'];
            $agreement['join_organizations_id'] = $_SESSION['join_organizations_id'];

            //-- Insert default agreement data
            $agreement = self::addAgreementDefaults($agreement);

            $hotel_agreements_tbl->insert($agreement);
            $agreement['hotel_agreements_id'] = $hotel_agreements_tbl->last_id();
        }

        $hotel_id = isset($data['hotel_id']) ? $data['hotel_id'] : 0;
        $guest_id = isset($data['guest_id']) ? $data['guest_id'] : 0;

        $agreement['join_hotels_id'] = $hotel_id;
        $agreement['join_trip_id']   = $trip_id;
        $agreement['join_guest_id']  = $guest_id;

        $agreement['hotel_agreements_is_authorized']         = $data['is_authorized'];
        $agreement['hotel_agreements_is_billing_authorized'] = $data['is_billing_authorized'];

        //-- If they are not authorized to sign the agreement, then send the agreement to the other person.
        if ($data['is_authorized'] === 0) {
            $agreement['hotel_agreements_first_name'] = $data['first_name'];
            $agreement['hotel_agreements_last_name']  = $data['last_name'];
            $agreement['hotel_agreements_email']      = $data['email'];
            $agreement['hotel_agreements_phone']      = $data['phone'];

            $hotel_agreements_tbl = new mysqli_db_table('hotel_agreements');
            $hotel_agreements_tbl->update($agreement, $agreement['hotel_agreements_id']);

            //        $organization = $db->fetch_one('SELECT organizations_name FROM organizations WHERE organizations_id = ?', array($_SESSION['join_organizations_id']));

            $organization = [];
            self::emailAgreementLink($agreement, $organization);
        } else {
            $hotel_agreements_tbl = new mysqli_db_table('hotel_agreements');
            $hotel_agreements_tbl->update($agreement, $agreement['hotel_agreements_id']);
        }

        if ($requires_cc && $data['is_billing_authorized'] === 0) {
            $db = mysqli_db::init();
            array_map(
                function ($team) use ($guest_id, $db, $trip_id, $hotel_id) {
                    $auth_form = Trips::getCcFormByTeam($trip_id, $team['teams_id']);

                    if (!$auth_form) {
                        $form_id   = CreditCardAuthorizationForm::create($trip_id, $team['teams_id'], $hotel_id, $guest_id);
                        $auth_form = CreditCardAuthorizationForm::byId($form_id);
                    }
                    $auth_form['hotel_cc_auth_forms_first_name'] = $team['first_name'];
                    $auth_form['hotel_cc_auth_forms_last_name']  = $team['last_name'];
                    $auth_form['hotel_cc_auth_forms_email']      = $team['email'];
                    $auth_form['hotel_cc_auth_forms_phone']      = $team['phone'];
                    $auth_form['join_hotels_id']                 = $hotel_id;
                    $auth_form['join_guest_id']                  = $guest_id;


                    $hotel_cc_auth_forms_tbl = new mysqli_db_table('hotel_cc_auth_forms');
                    $hotel_cc_auth_forms_tbl->update($auth_form, $auth_form['hotel_cc_auth_forms_id']);

                    $team_data    = $db->fetch_one(
                        'SELECT * FROM teams WHERE teams_id = ?',
                        [$team['teams_id']]
                    );
                    $organization = $db->fetch_one(
                        'SELECT * FROM organizations WHERE organizations_id = ?',
                        [$team_data['join_organizations_id']]
                    );

                    //-- Email Team Authority
                    self::emailCcAuthFormLink($auth_form, $organization);
                }, $data['team_contacts']
            );
        } else {
            $auth_forms = Trips::getAllCcForms($trip_id);
            if (count($auth_forms) === 0) {
                $form_id   = CreditCardAuthorizationForm::create($trip_id, 0, $hotel_id, $guest_id);
                $auth_form = CreditCardAuthorizationForm::byId($form_id);
            } else {
                $auth_form = $auth_forms[0];
            }

            $auth_form['join_hotels_id'] = $hotel_id;

            $hotel_cc_auth_forms_tbl = new mysqli_db_table('hotel_cc_auth_forms');
            $hotel_cc_auth_forms_tbl->update($auth_form, $auth_form['hotel_cc_auth_forms_id']);
        }
    }

    /**
     * Email the agreement URL to the authorized person
     *
     * @param $agreement
     * @param $organization
     * @param string       $auth_link
     */
    public static function emailAgreementLink($agreement, $organization, $auth_link = '')
    {
        $auth_link = rtrim(FULLURL, '/') . '/hotel-agreement/demo.php?' . http_build_query(
            [
                'tid'                 => $agreement['join_trip_id'],
                'hotel_agreements_id' => $agreement['hotel_agreements_id'],
                'organizations_id'    => $agreement['join_organizations_id'],
            ]
        );
        ob_start();
        include __DIR__ . '/../views/emails/hotel-agreement/agreement-fill-out.php';
        $message = ob_get_contents();
        ob_end_clean();

        // Email authorized person
        mail::send(
            // from
            ADMIN_EMAIL,
            // to
            $agreement['hotel_agreements_email'],
            // subject
            'Hotel Agreement | ' . SITE_NAME,
            // message
            $message
        );
    }


    /**
     * Email the credit card auth form URL to the authorized person
     *
     * @param array  $auth_form    The auth form data
     * @param array  $organization The organization to use in the email
     * @param string $auth_link    The link to use instead of the generated one
     */
    public static function emailCcAuthFormLink($auth_form, $organization, $auth_link = '')
    {
        $auth_link = rtrim(FULLURL, '/') . '/hotel-agreement/demo-cc.php?' . http_build_query(
            [
                'tid'                    => $auth_form['join_trip_id'],
                'hotel_cc_auth_forms_id' => $auth_form['hotel_cc_auth_forms_id'],
                'organizations_id'       => $auth_form['join_organizations_id'],
            ]
        );

        ob_start();
        include __DIR__ . '/../views/emails/hotel-agreement/cc-auth-form-fill-out.php';
        $message = ob_get_contents();
        ob_end_clean();

        // Email authorized person
        mail::send(
            // from
            ADMIN_EMAIL,
            // to
            $auth_form['hotel_agreements_email'],
            // subject
            'Credit Card Authorization Form | ' . SITE_NAME,
            // message
            $message
        );
    }

    /**
     * Setup errors for team data if present, this way the object can be left empty
     *
     * @param array  $errors The array of existing errors
     * @param int    $index  The team index
     * @param string $key    The key to add to of the team like "first_name"
     * @param string $msg    The error message to return of there is an issue
     *
     * @return array
     */
    public static function addTeamError($errors, $index, $key, $msg)
    {
        if (!isset($errors['team'])) {
            $errors['team'] = [];
        }

        if (!isset($errors['team'][$index])) {
            $errors['team'][$index] = [];
        }

        $errors['team'][$index][$key] = $msg;

        return $errors;
    }

    /**
     * @param int $hotel_agreements_id
     *
     * @return array|bool|null
     */
    public static function byId($hotel_agreements_id)
    {
        $db = mysqli_db::init();

        return $db->fetch_one(
            'SELECT * FROM hotel_agreements WHERE hotel_agreements_id = ?',
            [$hotel_agreements_id]
        );
    }

    /**
     * @param int $trip_id
     *
     * @return array|bool|null
     */
    public static function byTripId($trip_id)
    {
        $db = mysqli_db::init();

        return $db->fetch_one(
            'SELECT * FROM hotel_agreements WHERE join_trip_id = ?',
            [$trip_id]
        );
    }

    /**
     * Save agreement data
     *
     * @param int   $hotel_agreements_id
     * @param array $agreement
     */
    public static function save($hotel_agreements_id, array $agreement)
    {
        $hotel_agreements_tbl = new mysqli_db_table('hotel_agreements');
        $hotel_agreements_tbl->update($agreement, $hotel_agreements_id);
    }

    /**
     * Check to see if client agreement and billing is complete if so send email to hotel
     *
     * @param $trip_id
     */
    public static function confirmClientComplete($trip_id)
    {
        $db        = mysqli_db::init();
        $agreement = self::byTripId($trip_id);
        $bid       = Trips::getBid($trip_id, $agreement['join_hotel_agreement']);
        $trip      = Trips::byId($trip_id);

        $is_authorized         = $agreement['hotel_agreements_is_authorized'];
        $is_billing_authorized = $agreement['hotel_agreements_is_billing_authorized'];

        //-- If they are authorized for both agreement and billing, good check completed
        if ($is_authorized && (            ($bid['credit_card_authorization'] && $is_billing_authorized)
            || !$bid['credit_card_authorization']
            || $trip['trip_payeer'] === 'ECNL')
        ) {
            $auth_form = CreditCardAuthorizationForm::byTripId($trip_id);

            $agreement_signed = $agreement['hotel_agreements_signature'];
            $billing_signed   = $auth_form['hotel_cc_auth_forms_signature'];

            if (!empty($agreement_signed) && !empty($billing_signed)) {
                // Agreement and Authorization forms complete, email hotel!
                if ($agreement['join_hotels_id']) {
                    $hotel = $db->fetch_one(
                        'select * from hotel_details where hotelid = ?',
                        array($agreement['join_hotels_id'])
                    );

                    Trips::markHotelAccepted($trip_id, $hotel, $agreement['hotel_agreements_first_name']);
                } else if ($agreement['join_guest_id']) {
                    $guest = $db->fetch_one(
                        'select * from guest_hotel_details where guest_id = ?',
                        array($agreement['join_guest_id'])
                    );

                    Trips::markGuestAccepted($trip_id, $guest, $agreement['hotel_agreements_first_name']);
                }
            }

        }

    }

    /**
     * Email Trip Hotel Agreement (PDF) to all parties
     *
     * @param $trip_id
     */
    public static function emailAgreementDocument($trip_id)
    {
        $agreement = HotelAgreement::byTripId($trip_id);

        //-- Email Authorized Person
        self::emailAgreementToAuthorized($agreement);

        //-- Email Hotel Director
        self::emailAgreementToHotelDirector($agreement);

        //-- Email Corporate Hotel
        self::emailAgreementToCorporateHotel($agreement);
    }

    /**
     * Send agreement to the person authorized for this agreement
     *
     * @param $agreement
     */
    public static function emailAgreementToAuthorized($agreement)
    {
        $first_name          = $agreement['hotel_agreements_first_name'];
        $last_name           = $agreement['hotel_agreements_last_name'];
        $authorizor          = true;
        $hotel_director      = false;
        $corp_hotel_director = false;

        ob_start();
        include __DIR__ . '/../views/emails/hotel-agreement/completed.php';
        $message = ob_get_contents();
        ob_end_clean();

        mail::send(
            // from
            ADMIN_EMAIL,
            // to
            $agreement['hotel_agreements_email'],
            // subject
            'Hotel Agreement | ' . SITE_NAME,
            // message
            $message,
            [],
            [],
            [SITE_PATH . 'data/hotel-agreements/' . $agreement['join_trip_id'] . '.pdf']
        );
    }

    /**
     * Send agreement to the hotel director
     *
     * @param $agreement
     */
    public static function emailAgreementToHotelDirector($agreement)
    {
        $db = mysqli_db::init();

        $hotel_director_id = $db->fetch_singlet(
            'SELECT hoteldirectorid FROM hotel_details WHERE hotelid = ?',
            [$agreement['join_hotels_id']]
        );
        if (!$hotel_director_id) {
            return;
        }

        $hotel_director = $db->fetch_one(
            'SELECT * FROM hotels_directors WHERE hoteldirectorid = ?',
            [$hotel_director_id]
        );

        if (!$hotel_director) {
            return;
        }

        $first_name          = $agreement['hotel_agreements_hotel_first_name'];
        $last_name           = $agreement['hotel_agreements_hotel_last_name'];
        $authorizor          = false;
        $hotel_director      = true;
        $corp_hotel_director = false;


        ob_start();
        include __DIR__ . '/../views/emails/hotel-agreement/completed.php';
        $message = ob_get_contents();
        ob_end_clean();

        mail::send(
            // from
            ADMIN_EMAIL,
            // to
            $hotel_director['directors_email'],
            // subject
            'Hotel Agreement | ' . SITE_NAME,
            // message
            $message,
            [],
            [],
            [SITE_PATH . 'data/hotel-agreements/' . $agreement['join_trip_id'] . '.pdf']
        );
    }

    /**
     * Send agreement to the corporate hotel
     *
     * @param $agreement
     */
    public static function emailAgreementToCorporateHotel($agreement)
    {
        $db = mysqli_db::init();

        $corp_hotel_director_id = $db->fetch_singlet(
            'SELECT parent_id FROM hotel_details WHERE hotelid = ?',
            [$agreement['join_hotels_id']]
        );
        if (!$corp_hotel_director_id) {
            return;
        }

        $corp_hotel_director = $db->fetch_one(
            'SELECT * FROM hotels_directors WHERE hoteldirectorid = ?',
            [$corp_hotel_director_id]
        );

        if (!$corp_hotel_director) {
            return;
        }

        $first_name          = $corp_hotel_director['directors_firstname'];
        $last_name           = $corp_hotel_director['directors_lastname'];
        $authorizor          = false;
        $hotel_director      = false;
        $corp_hotel_director = true;

        ob_start();
        include __DIR__ . '/../views/emails/hotel-agreement/completed.php';
        $message = ob_get_contents();
        ob_end_clean();

        mail::send(
            // from
            ADMIN_EMAIL,
            // to
            $corp_hotel_director['email'],
            // subject
            'Hotel Agreement | ' . SITE_NAME,
            // message
            $message,
            [],
            [],
            [SITE_PATH . 'data/hotel-agreements/' . $agreement['join_trip_id'] . '.corp.pdf']
        );
    }

    public static function generateFinalAgreement($agreement, $billings = [])
    {
        $agreement_file = HotelAgreementPdf::finalizePDF($agreement, $billings);

        //-- Move doc to notification area... why...
        //        $doc = TravelCommon::notificationConversation([
        //            'common_msg' => '',
        //            'tripid'     => $agreement['join_trip_id'],
        //            'hotelid'    => $agreement['join_hotels_id'],
        //        ], 'hotel', [
        //            'emulated' => true,
        //            'name'     => $agreement_file->getFilename(),
        //            'type'     => 'application/pdf',
        //            'size'     => $agreement_file->getSize(),
        //            'tmp_name' => $agreement_file->getPath(),
        //            'error'    => UPLOAD_ERR_OK,
        //        ], 'final_doc');


        $bid = Trips::getBid($agreement['join_trip_id'], $agreement['join_hotels_id']);

        $doc = array(
            'final_doc' => array(
                array(
                    'hotel_msg'        => '',
                    'hotel_common_doc' => $agreement_file->getPathname(),
                ),
            ),
        );

        $bid['coach_discussion']['final_doc'] = $doc['final_doc'];
        $bid['hotel_discussion']['final_doc'] = $doc['final_doc'];

        $db = mysqli_db::init();
        $db->query(
            'UPDATE hotel_bids SET `final_doc_sign` = ?, 
                `hotel_discussion` = ?, 
                `coach_discussion` = ?, 
                `modified_date` = ?
                WHERE `tripid` = ? AND `hotelid` = ?',
            [
                '1',
                serialize($bid['hotel_discussion']),
                serialize($bid['coach_discussion']),
                date('Y-m-d H:i:s'),
                $agreement['join_trip_id'],
                $agreement['join_hotels_id'],
            ]
        );


    }


    /**
     * After the agreement is signed by the Hotel, finalize the document in the notification send emails!
     *
     * @param int    $tripId               Id of trip
     * @param int    $hotelId              Id of hotel
     * @param string $hotelBrand           Name of hotel
     * @param string $agreementSignee      Name of person authorized to sign agreement
     * @param string $agreementSigneeEmail Email of person authorized to sign agreement
     */
    public static function finalize($tripId, $hotelId, $hotelBrand, $agreementSignee, $agreementSigneeEmail)
    {
        $db = mysqli_db::init();


        $agreement = HotelAgreement::byTripId($tripId);
        $billings  = CreditCardAuthorizationForm::allByTripId($tripId);
        self::generateFinalAgreement($agreement, $billings);

        //        $arr = array($tripId, $hotelId, '', $hotelBrand, $agreementSignee);
        //
        //        $to           = $agreementSigneeEmail;
        //        $subject      = 'Hotel reservation link | ' . SITE_NAME;
        //        $mailTemplate = 'hotel-reservation-link.php';
        //        $cc           = '';
        //        TravelCommon::sendEmail($to, $cc, $subject, $mailTemplate, $arr, '');
    }

    /**
     * Get the hotel director
     *
     * @param int $hotelDirectorId The ID og the hotel directory
     *
     * @return array|bool|null
     */
    public static function getHotelDirector($hotelDirectorId)
    {
        $db = mysqli_db::init();

        return $db->fetch_one(
            'SELECT * FROM hotels_directors WHERE hoteldirectorid = ?',
            [$hotelDirectorId]
        );
    }

    /**
     * Get the room list csv file
     *
     * @param int $tripId The Trip ID of the room list
     *
     * @return array|bool|null
     */
    public static function getRoomList($tripId)
    {
        $db = mysqli_db::init();

        return $db->fetch_singlet(
            'SELECT trips.csv_file FROM trips WHERE trips.tid = ?',
            [$tripId]
        );
    }

    private static function addAgreementDefaults($agreement)
    {
        $defaultAgreement = coordinators::getAgreement(
            $agreement['join_coordinator_id'], $agreement['join_organizations_id']
        );

        $keysToCopy = [
            'hotel_agreements_first_name',
            'hotel_agreements_last_name',
            'hotel_agreements_email',
            'hotel_agreements_phone',
            'hotel_agreements_address',
            'hotel_agreements_address2',
            'hotel_agreements_city',
            'hotel_agreements_state',
            'hotel_agreements_zipcode',
            'hotel_agreements_title',
            'hotel_agreements_signature_type',
        ];

        foreach ($keysToCopy as $keyToCopy) {
            $agreement[$keyToCopy] = $defaultAgreement[$keyToCopy];

        }

        return $agreement;
    }
}
