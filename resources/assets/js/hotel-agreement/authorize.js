import Vue from 'vue';
import "babel-polyfill";
import * as chunk from 'lodash/chunk';
import MaskedInput from 'vue-text-mask'
import * as axios from "axios";

Vue.component('masked-input', MaskedInput);



let app = new Vue({
    el: '#app',
    data: {
        url: FULLURL,
        processing: false,
        progress: 0,
        progressInterval: null,
        trip: data.trip,
        guest_id: guest_id,
        hotel_id: hotel_id,
        teams: data.teams,
        teams_chunks: chunk.default(data.teams, 3),
        is_authorized: null,
        first_name: '',
        last_name: '',
        phone: '',
        email: '',
        remember: '',
        is_billing_authorized: null,
        errors: {},
        error_message: '',
        cc_require: data.cc_require,
        team_contacts: data.teams.map((team, index) => {
            return {
                teams_id: team.teams_id,
                first_name: team.hotel_cc_auth_forms_first_name || '',
                last_name: team.hotel_cc_auth_forms_last_name || '',
                phone: team.hotel_cc_auth_forms_phone || '',
                email: team.hotel_cc_auth_forms_email || '',
            };
        }),
    },
    mount() {
    },
    methods: {
        phoneMask(value) {
            console.log(value, value ? value.length : 0);

            if (value != null && value.length >= 18) {
                return ['+', '1', ' ', '(', /[1-9]/, /\d/, /\d/, ')', ' ', /\d/, /\d/, /\d/, '-', /\d/, /\d/, /\d/, /\d/, ' ', 'e', 'x', 't', '.', ' ', /\d/, /\d?/, /\d?/, /\d?/];
            } else {
                return ['+', '1', ' ', '(', /[1-9]/, /\d/, /\d/, ')', ' ', /\d/, /\d/, /\d/, '-', /\d/, /\d/, /\d/, /\d/];
            }
        },
        addTeamError(index, key, msg) {
            if (!this.errors.teams) {
                this.errors.teams = [];
            }

            if (!this.errors.teams[index]) {
                this.errors.teams[index] = {};
            }

            this.errors.teams[index][key] = msg;
        },
        checkForm(evt) {
            evt.preventDefault();

            this.errors = {};
            this.$forceUpdate();

            if (this.is_authorized === null) {
                this.errors.is_authorized = 'Please let us know if you can sign for this agreement.';
            }

            if (this.cc_require && this.is_billing_authorized === null) {
                this.errors.is_billing_authorized = 'Please let us know if you can provide credit card details.';
            }

            if (this.is_authorized === 0) {
                if (this.first_name.trim().length === 0) {
                    this.errors.first_name = 'Please enter the first name.';
                }
                if (this.last_name.trim().length === 0) {
                    this.errors.last_name = 'Please enter the last name.';
                }
                if (this.email.trim().length === 0) {
                    this.errors.email = 'Please enter an email.';
                }
                if (this.phone.trim().length === 0) {
                    this.errors.phone = 'Please enter the phone number.';
                }
            }

            if (this.cc_require && this.is_billing_authorized === 0) {
                this.team_contacts.forEach((team, index) => {
                    if (team.first_name.trim().length === 0) {
                        this.addTeamError(index, 'first_name', 'Please enter the first name.');
                    }
                    if (team.last_name.trim().length === 0) {
                        this.addTeamError(index, 'last_name', 'Please enter the last name.');
                    }
                    if (team.email.trim().length === 0) {
                        this.addTeamError(index, 'email', 'Please enter an email.');
                    }
                    if (team.phone.trim().length === 0) {
                        this.addTeamError(index, 'phone', 'Please enter the phone number.');
                    }
                });
            }

            this.$forceUpdate();


            if (Object.keys(this.errors).length === 0) {
                this.send();
            }
        },

        async send() {
            if (!this.processing) {
                this.processing = true;
                this.error_message = '';

                this.progressInterval = setInterval(() => {
                    this.progress += 10;
                    this.progress = Math.min(this.progress, 90);
                }, 250);

                let http = axios.create({
                    validateStatus: function (status) {
                        return (status >= 200 && status < 300) || (status >= 400 && status < 500);
                    }
                });


                try {
                    var data = JSON.parse(JSON.stringify(this.$data));

                    //-- Clean up masked data
                    data.phone = data.phone.replace(' ext. ____', '').replace(/_/g, '').trim();

                    data.team_contacts = data.team_contacts.map(function (team, index) {
                        team.phone = team.phone.replace(' ext. ____', '').replace(/_/g, '').trim();

                        return team;
                    });

                    let resp = await http.post(this.url + 'hotel-agreement/ajax-save-authorize.php', data);

                    if (resp.status < 300) {
                        this.$forceUpdate();

                        document.location.href = this.url + 'hotel-agreement/agreement.php?trip_id=' + encodeURIComponent(this.trip.tid);
                    } else {
                        setTimeout(() => {
                            clearTimeout(this.progressInterval);
                            this.processing = false;
                            this.errors = resp.data.errors ? resp.data.errors : {};
                        }, 500);
                    }
                } catch (e) {
                    setTimeout(() => {
                        clearTimeout(this.progressInterval);
                        this.processing = false;
                        this.error_message = 'Unable to proceed, error with server';
                        $('#errorModal').modal('show');
                    }, 500);
                }
            }
        }
    }
});

window._APP = app;