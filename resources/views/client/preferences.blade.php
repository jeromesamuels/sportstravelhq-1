@extends('layouts.app')
@section('content')
    <div class="m-container m-container--responsive m-container--xxl">
        <section class="page-header row">
            <h2>
                Preferences
                <small>Control hotel agreement defaults and team information</small>
            </h2>
        </section>

        <div class="page-content row">
            <div class="page-content-wrapper no-margin">
                <div class="sbox">
                    <div class="sbox-title">
                        <div class="row">
                            <div class="col-sm-2">
                                <h1>Hotel Defaults</h1>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('client-preferences-store') }}">
                        <div class="sbox-content">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-lg-5">
                                    <div class="form-group row">
                                        @include('includes.input', [
                                            'label' => 'First Name',
                                            'name' => 'first_name',
                                            'placeholder' => 'John',
                                            'value' => $hotel_defaults->first_name,
                                            'errors' => $errors,
                                        ])
                                    </div>
                                    <div class="form-group row">
                                        @include('includes.input', [
                                            'label' => 'Last Name',
                                            'name' => 'last_name',
                                            'placeholder' => 'Doe',
                                            'value' => $hotel_defaults->last_name,
                                            'errors' => $errors,
                                        ])
                                    </div>
                                    <div class="form-group row">
                                        @include('includes.input', [
                                            'type' => 'email',
                                            'label' => 'Email',
                                            'name' => 'email',
                                            'placeholder' => 'john@example.com',
                                            'value' => $hotel_defaults->email,
                                            'errors' => $errors,
                                        ])
                                    </div>
                                    <div class="form-group row">
                                        @include('includes.input', [
                                            'type' => 'tel',
                                            'label' => 'Phone',
                                            'placeholder' => '555-555-5555',
                                            'name' => 'phone',
                                            'value' => $hotel_defaults->phone,
                                            'errors' => $errors,
                                        ])
                                    </div>
                                    <div class="form-group row">
                                        @include('includes.input', [
                                            'type' => 'text',
                                            'label' => 'Address',
                                            'name' => 'address',
                                            'placeholder' => '122 Street',
                                            'value' => $hotel_defaults->address,
                                            'errors' => $errors,
                                        ])
                                    </div>
                                    <div class="form-group row">
                                        @include('includes.input', [
                                            'type' => 'text',
                                            'label' => 'PO Box, Suite, Unit, Apt',
                                            'name' => 'address2',
                                            'placeholder' => 'Apt 1',
                                            'value' => $hotel_defaults->address2,
                                            'errors' => $errors,
                                        ])
                                    </div>
                                    <div class="form-group row">
                                        @include('includes.input', [
                                            'type' => 'text',
                                            'label' => 'City',
                                            'name' => 'city',
                                            'placeholder' => 'Miami',
                                            'value' => $hotel_defaults->city,
                                            'errors' => $errors,
                                        ])
                                    </div>
                                    <div class="form-group row">
                                        @include('includes.input', [
                                            'type' => 'text',
                                            'label' => 'State',
                                            'name' => 'state',
                                            'placeholder' => 'Florida',
                                            'value' => $hotel_defaults->state,
                                            'errors' => $errors,
                                        ])
                                    </div>
                                    <div class="form-group row">
                                        @include('includes.input', [
                                            'type' => 'text',
                                            'label' => 'Zipcode/Postal',
                                            'name' => 'zipcode',
                                            'placeholder' => '92000',
                                            'value' => $hotel_defaults->zipcode,
                                            'errors' => $errors,
                                        ])
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(function ($) {
            $('[name=phone]').inputmask("+1 (999) 999-9999 ext. 9999");
        });
    </script>
@endsection
