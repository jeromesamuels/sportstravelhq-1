<?php
/**
 * Hotel.php controls the agreement that everyone signs
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
use Illuminate\Http\Request;

/**
 * Class HotelController
 * php version 7.1
 *
 * @category Agreement
 * @package  App\Http\Controllers\Agreement
 * @author   Joseph Montanez <jm@comentum.com>
 * @license  https://opensource.org/licenses/BSD-3-Clause BSD
 * @link     https://sportstravelhq.com
 */
class HotelController extends Controller
{

    /**
     * The hotel agreement action
     *
     * @param \Illuminate\Http\Request $request The http request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        \Debugbar::disable();

        $trip       = [];
        $agreementData = new AgreementData();

        return view(
            'agreement.index',
            [
                'trip'       => $trip,
                'doc_values' => $agreementData->toArray(),
            ]
        );
    }
}
