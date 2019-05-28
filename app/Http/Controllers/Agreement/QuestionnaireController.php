<?php
/**
 * QuestionnaireController.php controls the questions asked before the agreement
 * php version 7.1
 *
 * @category Agreement
 * @package  App\Http\Controllers\Agreement
 * @author   Joseph Montanez <jm@comentum.com>
 * @license  https://opensource.org/licenses/BSD-3-Clause BSD
 * @link     https://sportstravelhq.com
 */

namespace App\Http\Controllers\Agreement;

use App\Http\Controllers\Controller;
use App\Library\Agreement\AgreementData;
use App\Models\HotelAgreement;
use App\Models\Rfp;
use App\Models\UserTrip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class QuestionnaireController
 * php version 7.1
 *
 * @category Agreement
 * @package  App\Http\Controllers\Agreement
 * @author   Joseph Montanez <jm@comentum.com>
 * @license  https://opensource.org/licenses/BSD-3-Clause BSD
 * @link     https://sportstravelhq.com
 */
class QuestionnaireController extends Controller
{

    /**
     * The questionnaire index
     *
     * @param \Illuminate\Http\Request $request The http request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        /**
         * The authorized user
         *
         * @var \App\User $user
         */
        $user = Auth::user();

        $trip = UserTrip::findOrFail($request->get('trip_id'));

        if (!$user->can('view', $trip)) {
            return response('You do not have access to this trip', 403);
        }

        $organization = $user->organization;
        $cc_auth_defaults = $organization->hotelCcAuthDefaults;
        $agreement_defaults = $organization->hotelAgreementDefaults;

        $agreement = HotelAgreement::where('user_trip_id', $trip->id)->with('rfp', 'hotel', 'trip')->first();
        $cc_authorization = $agreement->rfp->cc_authorization;

        return view(
            'agreement.questionnaire',
            [
                'cc_authorization' => $cc_authorization,
                'agreement_defaults' => $agreement_defaults,
                'cc_auth_defaults' => $cc_auth_defaults,
            ]
        );
    }
}
