<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePreferences;
use App\Models\HotelAgreementDefault;
use App\Models\Team;
use App\Models\HotelCcAuthDefault;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ViewErrorBag;

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

        $teams         = Team::all();
        $team_ids      = $teams->pluck('id')->all();
        $team_defaults = HotelCcAuthDefault::whereIn('id', $team_ids)->get();
       
        $errors = $request->session()->pull('errors', new ViewErrorBag());

        $view_data = [
            'teams'          => $teams,
            'team_defaults'  => $team_defaults->keyBy('team_id'),
            'hotel_defaults' => $hotel_defaults,
            'errors'         => $errors,
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
        // Retrieve the validated input data...
        $validated = $request->validated();

        /**
         * The authorized user
         *
         * @var \App\User $user
         */
        $user = Auth::user();

        $hotel_defaults = $user->hotelAgreementDefault;

        //-- Create a new one if there is not an existing record
        if (!$hotel_defaults) {
            $hotel_defaults = new HotelAgreementDefault();
        }

        $hotel_defaults->fill(
            [
                'first_name'     => $validated['first_name'],
                'last_name'      => $validated['last_name'],
                'email'          => $validated['email'],
                'phone'          => $validated['phone'],
                'address'        => $validated['address'],
                'address2'       => $validated['address2'],
                'city'           => $validated['city'],
                'state'          => $validated['state'],
                'zipcode'        => $validated['zipcode'],
                'title'          => $validated['title'],
                'signature_type' => $validated['signature_type'],
            ]
        );
        $hotel_defaults->user_id = $user->id;
        $hotel_defaults->save();

        if (isset($validated['teams']) && is_array($validated['teams'])) {
            foreach ($validated['teams'] as $team_id => $team) {
                //-- TODO: Permissions to make sure the user has access to this TEAM!
                $team_default = HotelCcAuthDefault::firstOrCreate(
                    [
                        //'team_id' => $team_id,
                        'user_id' => $user->id,
                    ],
                    $team
                );
               // $team_default->team_id = $team_id;
                $team_default->user_id = $user->id;
                $team_default->save();
            }
        }


        return redirect()->route('client-preferences-index')->with('success', 'Preferences Saved!');

    }
}
