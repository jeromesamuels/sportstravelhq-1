import Vue from 'vue';
import "babel-polyfill";
import debounce from 'lodash/debounce';
import VueScrollTo from 'vue-scrollto';
import VueSticky from 'vue-sticky';
import * as axios from "axios";
import {GetElementBoundingBox} from "./helpers";


console.log(data);

let app = new Vue({
    el: '#app',
    directives: {
        'sticky': VueSticky,
    },
    components: {
        VueScrollTo
    },
    data: data,
    methods: {
        debounceSignature: debounce((e) => {
            app.hotel_cc_auth_forms_signature = e.target.value;

            let el = document.getElementById('id_authorized_by');
            let rect = GetElementBoundingBox(el);
            let signaturePopupElem = document.getElementById('signature-popup');

            setTimeout(() => {
                app.repositionMask(el);

                let signaturePopupRect = GetElementBoundingBox(signaturePopupElem);
                signaturePopupElem.style.marginLeft = (-(signaturePopupRect.width / 2)) + 'px';
            }, 250);

        }, 100),

        startAgreement() {
            this.startDocumentSignature();
        },

        markRead() {
            this.confirmed_reading = true;
            $('#confirmReadingModal').modal('hide');

            this.startDocumentSignature();
        },

        startDocumentSignature() {
            this.mode = 'edit';
            this.current_id = this.agreement_client_ids[0];

            let el = document.getElementById(this.current_id);

            setTimeout(() => {
                this.goToElement(el);
            }, 1000);
        },

        goToElement(el) {
            this.repositionMask(el);

            if (el.getAttribute('id') === 'id_authorized_by') {
                setTimeout(() => {
                    //-- Setup Signature positioning
                    let rect = GetElementBoundingBox(el);
                    let signaturePopupElem = document.getElementById('signature-popup');
                    let signaturePopupRect = signaturePopupElem.getBoundingClientRect();

                    signaturePopupElem.style.top = rect.bottom + 'px';
                    signaturePopupElem.style.marginLeft = (-(signaturePopupRect.width / 2)) + 'px';
                }, 500);
            }

            let h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
            VueScrollTo.scrollTo(el, {
                duration: 400,
                onDone: () => {
                    $(el).find('input').focus();
                },
                offset: -(h / 2)
            });
        },

        repositionMask(el) {
            let appEl = document.getElementById('app');
            let maskLeftElem = document.getElementById('mask-left');
            let maskRightElem = document.getElementById('mask-right');
            let maskTopElem = document.getElementById('mask-top');
            let maskBottomElem = document.getElementById('mask-bottom');
            let btnNextElem = document.getElementById('btn-next');
            let btnPrevElem = document.getElementById('btn-prev');

            // let offset = this.getElementOffset(el);
            let rect = GetElementBoundingBox(el); //el.getBoundingClientRect();
            let w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
            let h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);

            let maskBackgroundColor = 'rgba(0, 0, 0, 0.3)';
            let maskPosition = 'absolute';

            //-- Top Mask
            maskTopElem.style.backgroundColor = maskBackgroundColor;
            maskTopElem.style.position = maskPosition;
            maskTopElem.style.top = '0px';
            maskTopElem.style.left = '0px';
            maskTopElem.style.right = '0px';
            maskTopElem.style.height = rect.top + 'px';

            //-- Bottom Mask
            maskBottomElem.style.backgroundColor = maskBackgroundColor;
            maskBottomElem.style.position = maskPosition;
            maskBottomElem.style.top = rect.bottom + 'px';
            maskBottomElem.style.left = '0px';
            maskBottomElem.style.right = '0px';
            maskBottomElem.style.height = '100%';

            //-- Left Mask
            maskLeftElem.style.backgroundColor = maskBackgroundColor;
            maskLeftElem.style.position = maskPosition;
            maskLeftElem.style.top = rect.top + 'px';
            maskLeftElem.style.left = '0px';
            maskLeftElem.style.width = (rect.left - 5) + 'px';
            maskLeftElem.style.height = rect.height + 'px';

            //-- Right Mask
            maskRightElem.style.backgroundColor = maskBackgroundColor;
            maskRightElem.style.position = maskPosition;
            maskRightElem.style.top = rect.top + 'px';
            maskRightElem.style.left = (rect.right + 5) + 'px';
            maskRightElem.style.right = '0px';
            maskRightElem.style.height = rect.height + 'px';

            let agreementClientIds = this.agreement_client_ids;
            let last_id;
            if (Array.isArray(agreementClientIds) && agreementClientIds.length > 0) {
                last_id = agreementClientIds.slice(-1)[0];
            } else {
                last_id = false;
            }
            if (this.current_id !== last_id) {
                $(btnNextElem).text('Next');
            } else {
                $(btnNextElem).text('Finish');
            }
            btnNextElem.style.position = maskPosition;
            if (this.current_id === 'id_authorized_by') {
                btnNextElem.style.top = (rect.top - 16 - $(btnNextElem).outerHeight()) + 'px';
            } else {
                btnNextElem.style.top = (rect.bottom) + 'px';
            }
            btnNextElem.style.left = (rect.right - $(btnNextElem).outerWidth() + 4) + 'px';

            btnPrevElem.style.position = maskPosition;
            if (this.current_id === 'id_authorized_by') {
                btnPrevElem.style.top = (rect.top - 16 - $(btnPrevElem).outerHeight()) + 'px';
            } else {
                btnPrevElem.style.top = (rect.bottom) + 'px';
            }
            btnPrevElem.style.left = (rect.left - 6) + 'px';
        },


        nextElement(id = false) {
            //-- Validation
            // Full Name
            if (this.current_id === 'id_name' && this.hotel_cc_auth_forms_name.length === 0) {
                alert('Please enter your full name before proceeding');
                return;
            }

            // Position or Title
            if (this.current_id === 'id_position' && this.hotel_cc_auth_forms_position.length === 0) {
                alert('Please enter your position or title');
                return;
            }

            // Company or Organization
            if (this.current_id === 'id_company' && this.hotel_cc_auth_forms_company.length === 0) {
                alert('Please enter the company or organization name');
                return;
            }

            // Type of Card
            if (this.current_id === 'id_card_type' && this.hotel_cc_auth_forms_card_type.length === 0) {
                alert('Please select what type of card you will be paying for');
                return;
            }

            // Card Number
            if (this.current_id === 'id_card_no' && this.hotel_cc_auth_forms_card_number.length === 0) {
                alert('Please enter the credit card number');
                return;
            }

            // Card Expire - Month
            if (this.current_id === 'id_card_exp' && this.hotel_cc_auth_forms_card_exp_month.length === 0) {
                alert('Please enter the credit card month of expiration');
                return;
            }

            // Card Expire - Year
            if (this.current_id === 'id_card_exp' && this.hotel_cc_auth_forms_card_exp_year.length === 0) {
                alert('Please enter the credit card year of expiration');
                return;
            }

            // Card CVV
            if (this.current_id === 'id_card_cvv' && this.hotel_cc_auth_forms_card_cvv.length === 0) {
                alert('Please enter the credit card year of expiration');
                return;
            }

            // Charges Dates
            if (this.current_id === 'id_charges_1_date' && this.hotel_cc_auth_forms_charges_1_date.length === 0) {
                alert('Please enter one or more dates');
                return;
            }

            // Charges Amount
            if (this.current_id === 'id_charges_1_amount' && this.hotel_cc_auth_forms_charges_1_amount.length === 0) {
                alert('Please enter an estimated amount');
                return;
            }

            // Charges Guest Name
            if (this.current_id === 'id_charges_1_guest_name' && this.hotel_cc_auth_forms_charges_1_guest_name.length === 0) {
                alert('Please enter a guest name');
                return;
            }

            // Method of Paying
            if (this.current_id === 'id_method_of_pay' && this.hotel_cc_auth_forms_method_of_payment.length === 0) {
                alert('Please select what will be paid for');
                return;
            }

            // Method of Paying Specific
            if (this.current_id === 'id_method_of_pay'
                && this.hotel_cc_auth_forms_method_of_payment_specific === 'specific'
                && this.hotel_cc_auth_forms_method_of_payment_specific.length === 0) {
                alert('Please enter what will be paid for');
                return;
            }

            // Card Name
            if (this.current_id === 'id_card_name' && this.hotel_cc_auth_forms_card_name.length === 0) {
                alert('Please enter the name of the authorized or card holder name');
                return;
            }


            // Signature
            if (this.current_id === 'id_authorized_by' && this.hotel_cc_auth_forms_signature_type === false) {
                alert('Please pick a signature type before proceeding.');
                return;
            }
            if (this.current_id === 'id_authorized_by' && this.hotel_cc_auth_forms_signature.length === 0) {
                alert('Please type your name before proceeding');
                return;
            }

            // Card Billing Address
            if (this.current_id === 'id_billing_address' && this.hotel_cc_auth_forms_address.length === 0) {
                alert('Please enter the billing address of the credit card');
                return;
            }

            // Card Billing Phone
            if (this.current_id === 'id_billing_phone' && this.hotel_cc_auth_forms_phone.length === 0) {
                alert('Please enter a phone number');
                return;
            }




            let nextIndex = this.agreement_client_ids.indexOf(this.current_id) + 1;
            let nextId = this.agreement_client_ids[nextIndex];

            if (nextId) {
                this.current_id = nextId;

                if (this.current_id === 'id_first_name') {
                    $('#signature-popup').hide();
                }

                let el = document.getElementById(nextId);
                this.goToElement(el);
            } else {
                this.mode = 'view';

                setTimeout(() => {
                    VueScrollTo.scrollTo(document.getElementById('id_processing'), {
                        duration: 0
                    });
                }, 250);

                this.send();
            }

        },

        prevElement(id = false) {
            if (!this.current_id || this.current_id === this.agreement_client_ids[0]) {
                this.mode = 'view';
                this.confirmed_reading = false;
            }


            let prevIndex = this.agreement_client_ids.indexOf(this.current_id) - 1;
            let prevId = this.agreement_client_ids[Math.max(0, prevIndex)];
            this.current_id = prevId;

            let el = document.getElementById(prevId);
            this.goToElement(el);
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
                    data.hotel_cc_auth_forms_phone = data.hotel_cc_auth_forms_phone.replace(' ext. ____', '').replace(/_/g, '').trim();

                    let resp = await http.post(this.url + 'hotel-agreement/ajax-save-credit-card.php', data);

                    if (resp.status < 300) {
                        this.$forceUpdate();

                        if (resp.data.return_url) {
                            document.location.href = this.url + resp.data.return_url;
                        }
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
    },
    mounted: function () {
        setInterval(() => {
            $('.btn-start')
        })
    }
});

window.status = "done";
window._APP = app;
