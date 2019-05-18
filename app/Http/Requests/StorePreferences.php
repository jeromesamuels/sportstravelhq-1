<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StorePreferences extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // TODO: insert permissions here
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @param \Illuminate\Http\Request $request The http request
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $rules = [
            //-- Hotel Agreement Defaults
            'first_name'         => 'max:255',
            'last_name'          => 'max:255',
            'email'              => 'email|max:255',
            'phone'              => 'max:255',
            'address'            => 'max:100',
            'address2'           => 'max:100',
            'city'               => 'max:100',
            'state'              => 'max:100',
            'zipcode'            => 'max:100',
            'title'              => 'max:100',
            'signature_type'     => 'max:100',
            //-- Team Validation
            'teams.*.first_name' => 'max:255',
            'teams.*.last_name'  => 'max:255',
            'teams.*.email'      => 'email|max:255',
            'teams.*.phone'      => 'max:255',
        ];

        return $rules;
    }
}
