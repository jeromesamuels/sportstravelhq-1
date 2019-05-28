<template>
    <form action="" @submit="checkForm" method="post" id="app">
        <h1 class="text-uppercase">Hotel Agreement</h1>

        <p>
            The following questions are to help optimized the amount of paper work you'll need to fill out.
        </p>


        <div class="form-group label-static is-focused">
            <label class="control-label">Are you authorized to sign the hotel agreement?</label>
            <div class="radio">
                <label>
                    <input type="radio" name="is_authorized" value="1" v-bind:value="1"
                           v-model="is_authorized"> Yes
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="is_authorized" value="0" v-bind:value="0"
                           v-model="is_authorized"> No
                </label>
            </div>
            <span class="text-danger" v-if="errors.is_authorized"><code>{{ errors.is_authorized }}</code></span>
        </div>

        <transition name="slide-fade">
            <div v-show="is_authorized === 0">
                <div class="form-group label-static is-focused">
                    <label class="">Who can sign for the agreement?</label>
                    <p>An email will be sent to the authorized person to complete the hotel agreement.</p>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-static">
                            <label class="control-label">First Name</label>
                            <input type="text" class="form-control" v-model="first_name" autocomplete="given-name">
                            <span class="text-danger" v-if="errors.first_name"><code>{{ errors.first_name }}</code></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-static">
                            <label class="control-label">Last Name</label>
                            <input type="text" class="form-control" v-model="last_name" autocomplete="family-name">
                            <span class="text-danger" v-if="errors.last_name"><code>{{ errors.last_name }}</code></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-static">
                            <label class="control-label">Email</label>
                            <input type="email" class="form-control" v-model="email" autocomplete="email">
                            <span class="text-danger" v-if="errors.email"><code>{{ errors.email }}</code></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-static">
                            <label class="control-label">Phone</label>
                            <masked-input
                                    type="tel"
                                    class="form-control"
                                    placeholder="(123) 456-7890 ext. 22"
                                    autocomplete="tel"
                                    v-model="phone"
                                    :mask="phoneMask"
                                    :guide="true"
                                    :keepCharPositions="true"
                                    placeholderChar="_">
                            </masked-input>
                            <span class="text-danger" v-if="errors.phone"><code>{{ errors.phone }}</code></span>
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" v-model="remember"> Remember
                        </label>
                    </div>
                    <p class="help-block">Remember these contact details for next time!</p>
                </div>
            </div>
        </transition>


        <div v-if="cc_require" class="form-group label-static is-focused">
            <label>Are you authorized and able to provide credit card details for the <b>Credit Card Authorization Form</b>?</label>
            <div class="radio radio-primary">
                <label>
                    <input type="radio" name="is_billing_authorized" value="1" v-bind:value="1"
                           v-model="is_billing_authorized"> Yes
                </label>
            </div>
            <div class="radio radio-primary">
                <label>
                    <input type="radio" name="is_billing_authorized" value="0" v-bind:value="0"
                           v-model="is_billing_authorized"> No
                </label>
            </div>
            <span class="text-danger" v-if="errors.is_billing_authorized"><code>{{ errors.is_billing_authorized }}</code></span>
        </div>

        <transition name="slide-fade">
            <div v-show="is_billing_authorized === 0">
                <div class="form-group label-static is-focused">
                    <label class="">Who can provide billing details for the <b>Credit Card Authorization Form</b>?</label>
                    <p>An email will be sent to each authorized person, per team, to complete the hotel authorization form.</p>
                </div>

                <!--
                <div class="row" v-for="(teams_chunk, i) in teams_chunks">
                    <div :class="'col-sm-' + (12 / teams_chunk.length)" v-for="(team, j) in teams_chunk">
                        <h3>{{ team.teams_name }} - {{ team.teams_gender.toLocaleUpperCase() }}</h3>
                        <p>Please provide the details of the contact for this team.</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-static">
                                    <label class="control-label">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" v-model="team_contacts[(i * 2) + j].first_name" autocomplete="given-name">
                                    <span class="text-danger" v-if="errors.teams && errors.teams[(i * 2) + j].first_name"><code>{{ errors.teams ? errors.teams[(i * 2) + j].first_name : '' }}</code></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-static">
                                    <label class="control-label">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" v-model="team_contacts[(i * 2) + j].last_name" autocomplete="family-name">
                                    <span class="text-danger" v-if="errors.teams && errors.teams[(i * 2) + j].last_name"><code>{{ errors.teams ? errors.teams[(i * 2) + j].last_name : '' }}</code></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-static">
                                    <label class="control-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" v-model="team_contacts[(i * 2) + j].email" autocomplete="email">
                                    <span class="text-danger"
                                          v-if="errors.teams && errors.teams[(i * 2) + j].email"><code>{{ errors.teams ? errors.teams[(i * 2) + j].email : '' }}</code></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-static">
                                    <label class="control-label">Phone <span class="text-danger">*</span></label>
                                    <masked-input
                                            type="text"
                                            name="phone"
                                            class="form-control"
                                            placeholder="(123) 456-7890 ext. 22"
                                            autocomplete="tel"
                                            v-model="team_contacts[(i * 2) + j].phone"
                                            :mask="phoneMask"
                                            :guide="true"
                                            :keepCharPositions="true"
                                            placeholderChar="_">
                                    </masked-input>
                                    <span class="text-danger"
                                          v-if="errors.teams && errors.teams[(i * 2) + j].email"><code>{{ errors.teams ? errors.teams[(i * 2) + j].phone : '' }}</code></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                -->
            </div>
        </transition>


        <br><br>
        <div class="text-center">
            <button v-show="!processing" type="submit" class="btn btn-lg btn-raised btn-warning">Next</button>
            <button v-show="processing" type="button" class="btn btn-lg btn-raised btn-warning disabled">Processing...</button>

            <div v-show="processing" class="progress progress-striped active">
                <div class="progress-bar" :style="'width: ' + progress + '%'"></div>
            </div>
        </div>

        <div v-if="Object.keys(errors).length > 0">
            <br>
            <div class="alert alert-danger" role="alert">
                <strong>Oops!</strong> You have one or more errors, please review form.
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        {{ error_message }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script type="text/ecmascript-6">
    import VueScrollTo from 'vue-scrollto';
    import VueSticky from 'vue-sticky';
    import MaskedInput from 'vue-text-mask'
    import axios from 'axios';

    let http = axios.create({
        headers: {
            'X-CSRF-TOKEN': window.Laravel.csrfToken
        },
        validateStatus: function (status) {
            return (status >= 200 && status < 300) || (status >= 400 && status < 500);
        }
    });
    export default {
        name: 'Questionnaire',
        props: ['formData', 'print'],
        directives: {
            'sticky': VueSticky,
        },
        components: {
            VueScrollTo,
            MaskedInput
        },
        data() {
            return {
                url: FULLURL,
                processing: false,
                progress: 0,
                progressInterval: null,
                trip: data.trip,
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
                // contacts: data.contacts.map((team, index) => {
                //     return {
                //         teams_id: team.teams_id,
                //         first_name: team.hotel_cc_auth_forms_first_name || '',
                //         last_name: team.hotel_cc_auth_forms_last_name || '',
                //         phone: team.hotel_cc_auth_forms_phone || '',
                //         email: team.hotel_cc_auth_forms_email || '',
                //     };
                // }),
            }
        },
        mounted() {
            if (!this.print) {
                jQuery.material.init();
                console.log('enable material!');
            }
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
    }
</script>
<style rel="stylesheet/scss" type="text/scss" lang="scss" scoped>
    $icon-font-path: "~bootstrap-sass/assets/fonts/bootstrap/";
    //$bootstrap-sass-asset-helper: true;
    $brand-warning: #f37021;

    $border-radius-base: 0;
    $border-radius-large: 0;
    $border-radius-small: 0;

    @import "~bootstrap-sass/assets/stylesheets/bootstrap";
    @import "~bootstrap-material-design/sass/bootstrap-material-design.scss";
    @import "~bootstrap-material-design/sass/ripples.scss";

    #app {
        font-family: 'Open Sans', sans-serif;
        background: #fff;
    }
</style>
