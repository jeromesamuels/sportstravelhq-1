<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\StorePreferences;
use App\Models\HotelAgreementDefault;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class PreferencesController
 * php version 7.1
 *
 * @category App\Http\Controllers\Client
 * @package  App\Http
 * @author   Joseph Montanez <jm@comentum.com>
 * @license  https://opensource.org/licenses/BSD-3-Clause BSD
 * @link     https://sportstravelhq.com
 **/
class PreferencesController extends Controller
{
    /**
     * Display the hotel agreement defaults
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

        $hotel_defaults = $user->hotelAgreementDefault;
        if (!$hotel_defaults) {
            $hotel_defaults = new HotelAgreementDefault($request->old());
            $hotel_defaults->user_id = $user->id;
        }

        $errors = $request->session()->pull('errors', []);

        $view_data = [
            'hotel_defaults' => $hotel_defaults,
            'errors' => $errors
        ];

        return view('client.preferences', $view_data);
    }

    /**
     * Save user preferences
     *
     * @param \App\Http\Requests\StorePreferences $request The http reoute
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePreferences $request)
    {
        // The incoming request is valid...

        // Retrieve the validated input data...
        $validated = $request->validated();

        echo '<pre>', var_dump($validated), '</pre>'; exit;

        if (!$validated) {
            return redirect()->route('client-preferences-index')
                ->with('success', 'Preferences Saved!');
        } else {
            return redirect()->route('client-preferences-index')
                             ->with('success', 'Preferences Saved!');
        }
    }
}
