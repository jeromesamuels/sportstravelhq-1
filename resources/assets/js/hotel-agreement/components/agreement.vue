<template>
    <div>
        <div v-if="print">
            <div v-if="mode === 'view' && !processing" v-sticky="{ zIndex: 1, stickyTop: 0 }">
                <div>
                    <button v-on:click.prevent="startAgreement" id="btn-start" class="btn btn-lg btn-raised btn-warning btn-start">Start</button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <p class="heading">
                {{ hotel_name }}<br>
                {{ hotel_address }}<br>
                {{ hotel_city }}, {{ hotel_state }} {{ hotel_zipcode }}<br>
                {{ hotel_phone }}<br>
                GROUP SALES AGREEMENT<br>
            </p>

            <p class="text text-justify">
                This Agreement is made and entered into as of {{ current_date }} by and between {{ hotel_name }} and
                {{ name_of_group }} Group agrees that the terms of this Agreement are based upon the information provided
                by Group below. If information provided by Group materially changes or is incorrect, this Agreement may be
                terminated pursuant to Section 5.
            </p>

            <div class="detail-table-1">
                <div v-bind:class="print ? 'col-xs-6' : 'col-sm-6'">
                    <div class="row">
                        <div class="<?= $_GET['print'] ? 'col-xs-6' : 'col-sm-6' ?> text-right-sm"><b>Name Of Group:</b></div>
                        <div v-bind:class="print ? 'col-xs-6' : 'col-sm-6'">{{ name_of_group }}</div>
                    </div>
                    <div class="row">
                        <div class="<?= $_GET['print'] ? 'col-xs-6' : 'col-sm-6' ?> text-right-sm"><b>Contact:</b></div>
                        <div v-bind:class="print ? 'col-xs-6' : 'col-sm-6'">{{ contact }}</div>
                    </div>
                    <div class="row">
                        <div class="<?= $_GET['print'] ? 'col-xs-6' : 'col-sm-6' ?> text-right-sm"><b>Address:</b></div>
                        <div v-bind:class="print ? 'col-xs-6' : 'col-sm-6'">
                            <span v-show="mode === 'view' || signing === 'hotel'">{{ hotel_agreements_address }}<br></span>
                            <div v-show="mode === 'edit' && signing === 'club'" id="id_address">
                                <div class="form-group label-static">
                                    <input type="text" class="form-control" v-model="hotel_agreements_address" placeholder="Address">
                                </div>
                            </div>

                            <span v-show="mode === 'view' || signing === 'hotel'">{{ hotel_agreements_address2 }}</span>
                            <div v-show="mode === 'edit' && signing === 'club'" id="id_address2">
                                <div class="form-group label-static">
                                    <input type="text" class="form-control" v-model="hotel_agreements_address2" placeholder="Apt #, P.O, Suite">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="<?= $_GET['print'] ? 'col-xs-6' : 'col-sm-6' ?> text-right-sm"><b>Honors/Rewards#:</b></div>
                        <div v-bind:class="print ? 'col-xs-6' : 'col-sm-6'">{{ hotel_agreements_rewards_number }}</div>
                    </div>
                    <div class="row">
                        <div class="<?= $_GET['print'] ? 'col-xs-6' : 'col-sm-6' ?> text-right-sm"><b>City:</b></div>
                        <div v-bind:class="print ? 'col-xs-6' : 'col-sm-6'">
                            <span v-show="mode === 'view' || signing === 'hotel'">{{ hotel_agreements_city }}<br></span>
                            <div v-show="mode === 'edit' && signing === 'club'" id="id_city">
                                <div class="form-group label-static">
                                    <input type="text" class="form-control" v-model="hotel_agreements_city" placeholder="City">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="<?= $_GET['print'] ? 'col-xs-6' : 'col-sm-6' ?> text-right-sm"><b>State:</b></div>
                        <div v-bind:class="print ? 'col-xs-6' : 'col-sm-6'">
                            <span v-show="mode === 'view' || signing === 'hotel'">{{ hotel_agreements_state }}</span>
                            <div v-show="mode === 'edit' && signing === 'club'" id="id_state">
                                <div class="form-group label-static">
                                    <input type="text" class="form-control" v-model="hotel_agreements_state" placeholder="State">
                                </div>
                            </div>

                            <span v-show="mode === 'view' || signing === 'hotel'">{{ hotel_agreements_zipcode }}</span>
                            <div v-show="mode === 'edit' && signing === 'club'" id="id_zipcode">
                                <div class="form-group label-static">
                                    <input type="text" class="form-control" v-model="hotel_agreements_zipcode" placeholder="Zipcode">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="<?= $_GET['print'] ? 'col-xs-6' : 'col-sm-6' ?> text-right-sm"><b>Telephone:</b></div>
                        <div v-bind:class="print ? 'col-xs-6' : 'col-sm-6'">
                            <span v-show="mode === 'view' || signing === 'hotel'">{{ hotel_agreements_phone }}</span>
                            <div v-show="mode === 'edit' && signing === 'club'" id="id_phone">
                                <div class="form-group label-static">
                                    <input type="tel" class="form-control" v-model="hotel_agreements_phone" placeholder="Telephone">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="<?= $_GET['print'] ? 'col-xs-6' : 'col-sm-6' ?> text-right-sm"><b>Email Address:</b></div>
                        <div v-bind:class="print ? 'col-xs-6' : 'col-sm-6'">
                            <span v-show="mode === 'view' || signing === 'hotel'">{{ hotel_agreements_email }}<br>&nbsp;</span>
                            <div v-show="mode === 'edit' && signing === 'club'" id="id_email">
                                <div class="form-group label-static">
                                    <input type="text" class="form-control" v-model="hotel_agreements_email" placeholder="Email Address">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div v-bind:class="print ? 'col-xs-6' : 'col-sm-6'">
                    <div class="row">
                        <div class="<?= $_GET['print'] ? 'col-xs-6' : 'col-sm-6' ?> text-right-sm"><b>Status:</b></div>
                        <div v-bind:class="print ? 'col-xs-6' : 'col-sm-6'">{{ current_date }}</div>
                    </div>
                    <div class="row">
                        <div class="<?= $_GET['print'] ? 'col-xs-6' : 'col-sm-6' ?> text-right-sm"><b>Salesperson:</b></div>
                        <div v-bind:class="print ? 'col-xs-6' : 'col-sm-6'">{{ sales_person }}</div>
                    </div>
                    <div class="row">
                        <div class="<?= $_GET['print'] ? 'col-xs-6' : 'col-sm-6' ?> text-right-sm"><b>Telephone:</b></div>
                        <div v-bind:class="print ? 'col-xs-6' : 'col-sm-6'">{{ sales_phone }}<br><br></div>
                    </div>
                    <div class="row">
                        <div class="<?= $_GET['print'] ? 'col-xs-6' : 'col-sm-6' ?> text-right-sm"><b>E-Mail Address:</b></div>
                        <div v-bind:class="print ? 'col-xs-6' : 'col-sm-6'">{{ sales_email }}</div>
                    </div>
                    <div class="row">
                        <div class="<?= $_GET['print'] ? 'col-xs-6' : 'col-sm-6' ?> text-right-sm"><b>Fax:</b></div>
                        <div v-bind:class="print ? 'col-xs-6' : 'col-sm-6'">{{ sales_fax }}</div>
                    </div>
                    <div class="row">
                        <div class="<?= $_GET['print'] ? 'col-xs-6' : 'col-sm-6' ?> text-right-sm"><b>IATA#<br>
                            (if applicable):</b></div>
                        <div v-bind:class="print ? 'col-xs-6' : 'col-sm-6'">{{ iata_no }}</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>

            <br><br>

            <div class="pure-g text-center">
                <div class="pure-u-1-2"><b>Arrival Date:</b> {{ arrival_date }}</div>
                <div class="pure-u-1-2"><b>Departure Date:</b> {{ departure_date }}</div>
            </div>


            <p class="heading">GROUP ROOM RESERVATIONS</p>


            <p class="text">
                <b>2.1 GUEST ROOM ACCOMMODATIONS:</b> Hotel will hold the following block of rooms for Group’s use but does not guarantee any particular rooms nor does it guarantee
                that rooms will be in proximity to each other.
            </p>

            <table class="table align-center">
                <tbody>
                <tr>
                    <th colspan="3">{{ hotel_name }} - {{ name_of_group }} - USD</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>{{ arrival_day }}<br>{{ arrival_date2 }}</td>
                </tr>

                <tr>
                    <td rowspan="2">QUEEN/QUEEN</td>
                    <td>Guestrooms</td>
                    <td>{{ queen_guest_rooms }}</td>
                </tr>
                <tr>
                    <td>Rate</td>
                    <td>{{ queen_guest_rate }}</td>
                </tr>

                <tr>
                    <td rowspan="2">KING W/PULL-OUT</td>
                    <td>Guestrooms</td>
                    <td>{{ king_guest_rooms }}</td>
                </tr>
                <tr>
                    <td>Rate</td>
                    <td>{{ king_guest_rate }}</td>
                </tr>
                </tbody>
            </table>
            <br>

            <div class="text-center">
                <p>
                    <u>CHECK IN TIME:</u> {{ arrival_date }} at {{ checkin_time }}*<br>
                    *{{ checkin_text }}<br>
                </p>

                <p>
                    <u>CHECK OUT DATE/TIME:</u> {{ departure_date }} at {{ checkout_time }}**<br>
                    *{{ checkout_text }}<br>
                </p>

                <p><b>
                    &#9830; Room rates are based on single or double occupancy.<br>
                    &#9830; Hotel room rates are subject to applicable state and local taxes (13.25%). All rates are commissionable at {{ commission_rate }}% paid by Hilton TACS to
                    IATA #{{ iata_no }}<br>
                    &#9830; Any “No Shows” are subject to the fee of one night’s lodging plus the applicable taxes.<br>
                    &#9830; Specific room types and special accommodations may be requested but are not guaranteed.<br>
                    &#9830; Meeting planner points will be awarded after departure to Hilton Honors: {{ hotel_honors }}<br>

                    &#9830; Goal Reports Honors/Rewards/Points Account Number: Hilton Honors Number: 783751398 |
                    Marriott Rewards Number: 210792752

                </b></p>

                <br>
                <div style="border: 10px double black">
                    <b><u>CUT OFF DATE</u>: {{ decision_date }}</b><br>
                    After this date, rooms not covered by rooming list/individual reservations may be released.

                </div>
            </div>

            <br>
            <p>2.2. <b><u>RESERVATION METHOD</u></b><br>
                INDIVIDUAL: Guests to call in individually to make their reservations. Guests must state that they are with the {{ name_of_group }} to receive group rate.
                Reservations must be made by {{ decision_date }} in order to receive this rate. Please note that guests will not be able to make reservations until this agreement
                has been signed and returned to the hotel.</p>

            <div class="text-center"><br><b>OR</b><br></div>

            <p><b><i>ROOMING LIST</i>:</b> Group must submit a rooming list to Hotel by <b><u>{{ decision_date }}</u></b>. This list must indicate the name and “sharewiths” of each
                guest, types of sleeping rooms desired, the arrival and departure dates and the smoking and non-smoking requirements for each guest. If guests on the rooming list
                do not check in, Group’s Master Account will be charged for the first night of all “No Shows”.</p>
            <br><br>
            <!--
            Client Credit Card for Guarantee:<br>
            Number:__________________________________________________________________________________<br>
            Expiration Date:____________________________________________________________________________<br>
            -->

            <h3 class="text-center"><b><u>BILLING / CREDIT PROCEDURES</u></b></h3>

            <p>3.1 <b><u>CHARGES</u>:</b>
                BILLING
                /
                Individual to Pay OR Room & Tax on Master Account
            </p>

            <p>3.2 <b><u>INCIDENTALS</u>:</b> Incidental expenses of Group members will be the responsibility of each guest. The guest will be expected to leave a valid credit card
                or a cash deposit in the amount of $100.00 with the hotel at the time of check-in. It will be Group’s responsibility to inform its members of this requirement.</p>

            <h3 class="text-center"><b><u>CANCELLATION / MODIFICATION</u></b></h3>

            <p>4.1 <b><u>CATTRITION CLAUSE</u>:</b> Waived.</p>

            <p>4.2 <b><u>CINDIVIDUAL CANCELLATION</u>:</b> Any change or cancellation will need to be made 48 hours prior to arrival to avoid cancellation charges. Changes or
                cancellations made after this point may be subject to forfeiture of one night’s room and tax.</p>

            <p>4.3 <b><u>CHOTEL CANCELLATION</u>:</b> If Hotel cancels this Agreement or is unable to provide the requested rooms or meeting space, the Hotel will work with Group
                to arrange alternative accommodations and space. Hotel will work with Group to arrange for comparable space in the same vicinity of the Hotel. Hotel’s liability is
                limited to these remedies and Hotel shall not be liable for any consequential, punitive or special damages.</p>

            <h3 class="text-center"><b><u>MISCELLANEOUS</u></b></h3>

            <p>5.1 <b><u>CGROUP’S PROPERTY</u>:</b> Group agrees and acknowledges that Hotel will not be responsible for the safe keeping of equipment, supplies, written material
                or other valuable items left in function rooms, guest rooms or anywhere on Hotel property other than the Hotel safe. Group hereby waives any claims under Hotel’s
                insurance policy for the loss of Group’s property or the property of any of its attendees or invitees.</p>

            <p>5.2 <b><u>CFORCE MAJEURE</u>:</b> The performance of this Agreement is subject to any circumstances making it illegal or impossible to provide or use Hotel
                facilities, including Acts of God, war, government regulations, disaster, strikes, civil disorder or curtailment of transportation facilities. This Agreement may be
                terminated for any one of the above reasons by written notice from Hotel.</p>

            <p>5.3 <b><u>CSECURITY</u>:</b> Hotel may, in its sole discretion, require Group to take certain security measures in order to maintain security in light of the size or
                nature of the function or room block.</p>

            <p>5.4 <b><u>CSHIPPING AND PACKAGES</u>:</b> Group must notify Hotel at least one week in advance of all packages being sent to Hotel. Hotel accepts no responsibility
                or liability for the delivery, security or condition of the packages.</p>


            <p>5.5 <b><u>CRIGHT OF HOTEL TO TERMINATE</u>:</b> If any information provided by Group to Hotel regarding Group’s financial status, its activities, purpose or other
                material information about Group changes or is incorrect, Hotel may terminate this Agreement in whole or part and Group will be liable for all payments due.</p>

            <p>5.6 <b><u>CRIGHT OF INSPECTION/ENTRY</u>:</b> Hotel will have the right to enter and inspect all functions. If Hotel observes any illegal activity or activity that
                may result in harm to persons or objects, Hotel has the right to immediately cancel the event, in which case all of the Group’s guest and invitees must immediately
                vacate the meeting room/sleeping rooms. In such event, Group will remain liable for all fees and charges related to the function pursuant to the terms of this
                Agreement.</p>

            <p>5.7 <b><u>CSPECIAL INSTRUCTIONS</u>:</b> None.</p>

            <h3 class="text-center"><b><u>ACCEPTANCE OF CONTRACT</u></b></h3>

            <p>If a signed original of this Agreement has not been received by the Hotel prior to {{ decision_date }}, Hotel shall have the right to contract with other parties for
                the use of the room block and meeting rooms without further notice to Group.</p>

            <p>IN WITNESS WHEREOF, Hotel and Group have executed this Agreement in manner and form sufficient to bind them as of the date and year set forth on page one of this
                Agreement:</p>

            <!-- TODO: Switch between hotel and client signatures -->
            <div class="detail-table-1">
                <br>
                <div v-bind:class="print ? 'col-xs-6' : 'col-sm-6'">
                    <br>
                    <b>{{ hotel_name || '&nbsp;' }}</b>


                    <!-- View Mode -->
                    <div v-show="mode === 'view' || signing === 'club'">
                        <div class="row text-center">
                            <!-- Signature: -->
                            <img v-bind:src="'signature.php?type=' + encodeURIComponent(hotel_agreements_hotel_signature_type || 0) + '&text=' + encodeURIComponent(hotel_agreements_hotel_signature || 'SIGN HERE')"
                                 style="height: 42px;">
                        </div>
                        <div class="row">
                            <div class="col-xs-4">Name:</div>
                            <div class="col-xs-8">{{ hotel_agreements_hotel_first_name }} {{ hotel_agreements_hotel_last_name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">Title:</div>
                            <div class="col-xs-8">{{ hotel_agreements_hotel_title }}</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">Date:</div>
                            <div class="col-xs-8">{{ hotel_agreements_hotel_signature_date }}</div>
                        </div>
                    </div>


                    <!-- Edit Mode -->
                    <div v-show="mode === 'edit' && signing === 'hotel'">
                        <div id="id_hotel_authorized_by">
                            <div class="form-group label-static">
                                <label class="control-label">Signature: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" v-on:input="debounceSignature2"
                                       v-model="hotel_agreements_hotel_signature">
                            </div>
                        </div>

                        <div id="id_hotel_first_name">
                            <div class="form-group label-static">
                                <label class="control-label">First Name: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" v-model="hotel_agreements_hotel_first_name">
                            </div>
                        </div>

                        <div id="id_hotel_last_name">
                            <div class="form-group label-static">
                                <label class="control-label">Last Name: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" v-model="hotel_agreements_hotel_last_name">
                            </div>
                        </div>

                        <div id="id_hotel_title">
                            <div class="form-group label-static">
                                <label class="control-label">Title: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" v-model="hotel_agreements_hotel_title">
                            </div>
                        </div>

                        <div id="id_hotel_signature_date">
                            <div class="form-group label-static">
                                <label class="control-label">Date: <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" v-model="hotel_agreements_hotel_signature_date">
                            </div>
                        </div>
                    </div>

                </div>
                <div v-bind:class="print ? 'col-xs-6' : 'col-sm-6'">
                    <br>
                    <b>{{ name_of_group || '&nbsp;' }}</b>

                    <!-- View Mode -->
                    <div v-show="mode === 'view' || signing === 'hotel'">
                        <div class="row text-center">
                            <!-- Signature: -->
                            <img v-bind:src="'signature.php?type=' + encodeURIComponent(hotel_agreements_signature_type ? hotel_agreements_signature_type : 0) + '&text=' + encodeURIComponent(hotel_agreements_signature || 'SIGN HERE')"
                                 style="height: 42px;">
                        </div>
                        <div class="row">
                            <div class="col-xs-4">Name:</div>
                            <div class="col-xs-8">{{ hotel_agreements_first_name }} {{ hotel_agreements_last_name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">Title:</div>
                            <div class="col-xs-8">{{ hotel_agreements_title }}</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">Date:</div>
                            <div class="col-xs-8">{{ hotel_agreements_signature_date }}</div>
                        </div>
                    </div>

                    <!-- Edit Mode -->
                    <div v-show="mode === 'edit' && signing === 'club'">
                        <div id="id_authorized_by">
                            <div class="form-group label-static">
                                <label class="control-label">Signature: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" v-on:input="debounceSignature"
                                       v-model="hotel_agreements_signature">
                            </div>
                        </div>

                        <div id="id_first_name">
                            <div class="form-group label-static">
                                <label class="control-label">First Name: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" v-model="hotel_agreements_first_name">
                            </div>
                        </div>

                        <div id="id_last_name">
                            <div class="form-group label-static">
                                <label class="control-label">Last Name: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" v-model="hotel_agreements_last_name">
                            </div>
                        </div>

                        <div id="id_title">
                            <div class="form-group label-static">
                                <label class="control-label">Title: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" v-model="hotel_agreements_title">
                            </div>
                        </div>

                        <div id="id_signature_date">
                            <div class="form-group label-static">
                                <label class="control-label">Date: <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" v-model="hotel_agreements_signature_date">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--
            <table class="table align-center">
                <tbody>
                <tr>
                    <th>{{ hotel_name }}</th>
                    <th>{{ name_of_group }}</th>
                </tr>
                <tr>
                    <td>By: {{ '????' }}</td>
                    <td id="id_authorized_by">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-static">
                                    <label class="control-label">By: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Name: {{ 'Michelle Blanchard' }}</td>
                    <td>Name: <div class="form-group"><input type="text" class="form-control"></div></td>
                </tr>
                <tr>
                    <td>Title:{{ 'RDOS' }}</td>
                    <td>Title: <div class="form-group"><input type="text" class="form-control"></div></td>
                </tr>
                <tr>
                    <td>Date:{{ current_date }}</td>
                    <td>Date:<div class="form-group"><input type="text" class="form-control"></div></td>
                </tr>
                </tbody>
            </table>
            -->
            <div id="mask-left" v-show="mode === 'edit'"></div>
            <div id="mask-right" v-show="mode === 'edit'"></div>
            <div id="mask-top" v-show="mode === 'edit'"></div>
            <div id="mask-bottom" v-show="mode === 'edit'"></div>

            <div id="signature-popup" v-show="current_id === 'id_authorized_by'">
                <div class="arrow-up"></div>
                <div class="signature-inner">
                    <h4>Pick A Signature Type</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Signature Type #0 -->
                            <div class="radio">
                                <label>
                                    <input type="radio" v-model="hotel_agreements_signature_type" value="0">
                                    <div class="signature-image"
                                         v-bind:style="'background-image: url(signature.php?type=0&text=' + encodeURIComponent(hotel_agreements_signature ? hotel_agreements_signature : 'Sample') + ')'"></div>
                                </label>
                            </div>

                            <!-- Signature Type #1 -->
                            <div class="radio">
                                <label>
                                    <input type="radio" v-model="hotel_agreements_signature_type" value="1">
                                    <div class="signature-image"
                                         v-bind:style="'background-image: url(signature.php?type=1&text=' + encodeURIComponent(hotel_agreements_signature ? hotel_agreements_signature : 'Sample') + ')'"></div>
                                </label>
                            </div>

                            <!-- Signature Type #2 -->
                            <div class="radio">
                                <label>
                                    <input type="radio" v-model="hotel_agreements_signature_type" value="2">
                                    <div class="signature-image"
                                         v-bind:style="'background-image: url(signature.php?type=2&text=' + encodeURIComponent(hotel_agreements_signature ? hotel_agreements_signature : 'Sample') + ')'"></div>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- Signature Type #3 -->
                            <div class="radio">
                                <label>
                                    <input type="radio" v-model="hotel_agreements_signature_type" value="3">
                                    <div class="signature-image"
                                         v-bind:style="'background-image: url(signature.php?type=3&text=' + encodeURIComponent(hotel_agreements_signature ? hotel_agreements_signature : 'Sample') + ')'"></div>
                                </label>
                            </div>

                            <!-- Signature Type #4 -->
                            <div class="radio">
                                <label>
                                    <input type="radio" v-model="hotel_agreements_signature_type" value="4">
                                    <div class="signature-image"
                                         v-bind:style="'background-image: url(signature.php?type=4&text=' + encodeURIComponent(hotel_agreements_signature ? hotel_agreements_signature : 'Sample') + ')'"></div>
                                </label>
                            </div>

                            <!-- Signature Type #5 -->
                            <div class="radio">
                                <label>
                                    <input type="radio" v-model="hotel_agreements_signature_type" value="5">
                                    <div class="signature-image"
                                         v-bind:style="'background-image: url(signature.php?type=5&text=' + encodeURIComponent(hotel_agreements_signature ? hotel_agreements_signature : 'Sample') + ')'"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!--            <button v-on:click.prevent="nextElement('id_first_name')" class="btn btn-lg btn-raised btn-warning">Next</button>-->
                </div>
            </div>


            <div id="signature-popup2" v-show="current_id === 'id_hotel_authorized_by'">
                <div class="arrow-up"></div>
                <div class="signature-inner">
                    <h4>Pick A Signature Type</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Signature Type #0 -->
                            <div class="radio">
                                <label>
                                    <input type="radio" v-model="hotel_agreements_hotel_signature_type" value="0">
                                    <div class="signature-image"
                                         v-bind:style="'background-image: url(signature.php?type=0&text=' + encodeURIComponent(hotel_agreements_hotel_signature ? hotel_agreements_hotel_signature : 'Sample') + ')'"></div>
                                </label>
                            </div>

                            <!-- Signature Type #1 -->
                            <div class="radio">
                                <label>
                                    <input type="radio" v-model="hotel_agreements_hotel_signature_type" value="1">
                                    <div class="signature-image"
                                         v-bind:style="'background-image: url(signature.php?type=1&text=' + encodeURIComponent(hotel_agreements_hotel_signature ? hotel_agreements_hotel_signature : 'Sample') + ')'"></div>
                                </label>
                            </div>

                            <!-- Signature Type #2 -->
                            <div class="radio">
                                <label>
                                    <input type="radio" v-model="hotel_agreements_hotel_signature_type" value="2">
                                    <div class="signature-image"
                                         v-bind:style="'background-image: url(signature.php?type=2&text=' + encodeURIComponent(hotel_agreements_hotel_signature ? hotel_agreements_hotel_signature : 'Sample') + ')'"></div>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- Signature Type #3 -->
                            <div class="radio">
                                <label>
                                    <input type="radio" v-model="hotel_agreements_hotel_signature_type" value="3">
                                    <div class="signature-image"
                                         v-bind:style="'background-image: url(signature.php?type=3&text=' + encodeURIComponent(hotel_agreements_hotel_signature ? hotel_agreements_hotel_signature : 'Sample') + ')'"></div>
                                </label>
                            </div>

                            <!-- Signature Type #4 -->
                            <div class="radio">
                                <label>
                                    <input type="radio" v-model="hotel_agreements_hotel_signature_type" value="4">
                                    <div class="signature-image"
                                         v-bind:style="'background-image: url(signature.php?type=4&text=' + encodeURIComponent(hotel_agreements_hotel_signature ? hotel_agreements_hotel_signature : 'Sample') + ')'"></div>
                                </label>
                            </div>

                            <!-- Signature Type #5 -->
                            <div class="radio">
                                <label>
                                    <input type="radio" v-model="hotel_agreements_hotel_signature_type" value="5">
                                    <div class="signature-image"
                                         v-bind:style="'background-image: url(signature.php?type=5&text=' + encodeURIComponent(hotel_agreements_hotel_signature ? hotel_agreements_hotel_signature : 'Sample') + ')'"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!--            <button v-on:click.prevent="nextElement('id_first_name')" class="btn btn-lg btn-raised btn-warning">Next</button>-->
                </div>
            </div>

            <div id="btn-prev" v-show="mode === 'edit' && current_id !== null" v-on:click.prevent="prevElement()" class="btn btn-lg btn-raised btn-secondary">{{ current_id !==
                agreement_client_ids[0] ? 'Prev' : 'Cancel' }}
            </div>
            <div id="btn-next" v-show="mode === 'edit' && current_id !== null" v-on:click.prevent="nextElement()" class="btn btn-lg btn-raised btn-warning">{{ current_id !==
                agreement_client_ids.slice(-1)[0] ? 'Next' : 'Finish' }}
            </div>


            <button id="id_processing" v-show="processing" type="button" class="btn btn-lg btn-raised btn-warning disabled">Processing...</button>

            <div v-show="processing" class="progress progress-striped active">
                <div class="progress-bar" :style="'width: ' + progress + '%'"></div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ error_title }}</h4>
                    </div>
                    <div class="modal-body">
                        {{ error_message }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" v-on:click="">Continue</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="confirmReadingModal" tabindex="-1" role="dialog" aria-labelledby="confirmReadingModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="confirmReadingModalLabel">PLEASE READ THE AGREEMENT FIRST</h4>
                    </div>
                    <div class="modal-body">
                        Before you continue please confirm that you have read the agreement before signing.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" v-on:click.prevent="markRead">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script type="text/ecmascript-6">
    import VueScrollTo from 'vue-scrollto';
    import VueSticky from 'vue-sticky';
    import debounce from 'lodash/debounce';
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
        name: 'HotelAgreement',
        props: ['errors', 'formData'],
        directives: {
            'sticky': VueSticky,
        },
        components: {
            VueScrollTo
        },
        data() {
            let data = JSON.parse(JSON.stringify(this.formData));
            data.url = window.Laravel.url;
            data.csrfToken = window.Laravel.csrfToken;
            data.processing = false;
            data.csrfHeader = {
                'X-CSRF-TOKEN': window.Laravel.csrfToken
            };
            return data;
        },
        methods: {
            debounceSignature: debounce((e) => {
                app.hotel_agreements_signature = e.target.value;

                let el = document.getElementById('id_authorized_by');
                let rect = app.getElementBoundingBox(el);
                let signaturePopupElem = document.getElementById('signature-popup');

                setTimeout(() => {
                    app.repositionMask(el);

                    let signaturePopupRect = app.getElementBoundingBox(signaturePopupElem);
                    signaturePopupElem.style.marginLeft = (-(signaturePopupRect.width / 2)) + 'px';
                }, 250);

            }, 100),

            debounceSignature2: debounce((e) => {
                app.hotel_agreements_hotel_signature = e.target.value;

                let el = document.getElementById('id_hotel_authorized_by');
                let rect = app.getElementBoundingBox(el);
                let signaturePopupElem = document.getElementById('signature-popup2');

                setTimeout(() => {
                    app.repositionMask(el);

                    let signaturePopupRect = app.getElementBoundingBox(signaturePopupElem);
                    signaturePopupElem.style.marginLeft = (-(signaturePopupRect.width / 2)) + 'px';
                }, 250);

            }, 100),

            startAgreement() {
                if (!this.confirmed_reading) {
                    this.error_title = 'PLEASE READ THE AGREEMENT FIRST';
                    this.error_message = 'Before you continue please confirm that you have read the agreement before signing.';

                    $('#confirmReadingModal').modal('show');
                } else {

                }
            },

            markRead() {
                this.confirmed_reading = true;
                $('#confirmReadingModal').modal('hide');

                this.startDocumentSignature();
            },

            startDocumentSignature() {
                app.mode = 'edit';
                app.current_id = app.agreement_client_ids[0];

                let el = document.getElementById(this.current_id);

                setTimeout(() => {
                    app.goToElement(el);
                }, 1000);
            },

            handleResize() {
                console.log('resizing...');
                let el = document.getElementById(this.current_id);

                setTimeout(() => {
                    app.goToElement(el);
                }, 1000);
            },

            goToElement(el) {
                this.repositionMask(el);

                if (el.getAttribute('id') === 'id_authorized_by') {
                    setTimeout(() => {
                        //-- Setup Signature positioning
                        let rect = this.getElementBoundingBox(el);
                        let signaturePopupElem = document.getElementById('signature-popup');
                        let signaturePopupRect = signaturePopupElem.getBoundingClientRect();

                        signaturePopupElem.style.top = rect.bottom + 'px';
                        signaturePopupElem.style.marginLeft = (-(signaturePopupRect.width / 2)) + 'px';
                    }, 500);
                }
                else if (el.getAttribute('id') === 'id_hotel_authorized_by') {
                    setTimeout(() => {
                        //-- Setup Signature positioning
                        let rect = this.getElementBoundingBox(el);
                        let signaturePopupElem = document.getElementById('signature-popup2');
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
                let rect = this.getElementBoundingBox(el); //el.getBoundingClientRect();
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
                    last_id = null;
                }

                if (this.current_id !== agreementClientIds.slice(-1)[0]) {
                    $(btnNextElem).text('Next');
                } else {
                    $(btnNextElem).text('Finish');
                }
                btnNextElem.style.position = maskPosition;
                if (this.current_id === 'id_authorized_by' || this.current_id === 'id_hotel_authorized_by') {
                    btnNextElem.style.top = (rect.top - 16 - $(btnNextElem).outerHeight()) + 'px';
                } else {
                    btnNextElem.style.top = (rect.bottom) + 'px';
                }
                btnNextElem.style.left = (rect.right - $(btnNextElem).outerWidth() + 4) + 'px';

                btnPrevElem.style.position = maskPosition;
                if (this.current_id === 'id_authorized_by' || this.current_id === 'id_hotel_authorized_by') {
                    btnPrevElem.style.top = (rect.top - 16 - $(btnPrevElem).outerHeight()) + 'px';
                } else {
                    btnPrevElem.style.top = (rect.bottom) + 'px';
                }
                btnPrevElem.style.left = (rect.left - 6) + 'px';
            },

            validateClub: function () {
                // First Name
                if (this.current_id === 'id_first_name' && this.hotel_agreements_first_name.length === 0) {
                    alert('Please enter a first name before proceeding');
                    return false;
                }

                // Last Name
                if (this.current_id === 'id_last_name' && this.hotel_agreements_last_name.length === 0) {
                    alert('Please enter a last name before proceeding');
                    return false;
                }

                // Address
                if (this.current_id === 'id_address' && this.hotel_agreements_address.length === 0) {
                    alert('Please enter an address before proceeding');
                    return false;
                }

                // City
                if (this.current_id === 'id_city' && this.hotel_agreements_city.length === 0) {
                    alert('Please enter an city before proceeding');
                    return false;
                }

                // State
                if (this.current_id === 'id_state' && this.hotel_agreements_state.length === 0) {
                    alert('Please enter a state before proceeding');
                    return false;
                }

                // Phone
                if (this.current_id === 'id_phone' && this.hotel_agreements_phone.length === 0) {
                    alert('Please enter a phone before proceeding');
                    return false;
                }

                // Email
                if (this.current_id === 'id_email' && this.hotel_agreements_email.length === 0) {
                    alert('Please enter a email before proceeding');
                    return false;
                }

                // Signature
                if (this.current_id === 'id_authorized_by' && this.hotel_agreements_signature_type === false) {
                    alert('Please pick a signature type before proceeding.');
                    return false;
                }
                if (this.current_id === 'id_authorized_by' && this.hotel_agreements_signature.length === 0) {
                    alert('Please type your name before proceeding');
                    return false;
                }

                return true;
            },

            validateHotel: function () {
                // Signature
                if (this.current_id === 'id_hotel_authorized_by' && this.hotel_agreements_hotel_signature_type === false) {
                    alert('Please pick a signature type before proceeding.');
                    return false;
                }
                if (this.current_id === 'id_hotel_authorized_by' && this.hotel_agreements_hotel_signature.length === 0) {
                    alert('Please type your name before proceeding');
                    return false;
                }

                return true;
            },

            nextElement(id = false) {
                //-- Validation
                if (this.signing === 'club' && !this.validateClub()) {
                    return;
                }
                else if (this.signing === 'hotel' && !this.validateHotel()) {
                    return;
                }


                let nextIndex = this.agreement_client_ids.indexOf(this.current_id) + 1;
                let nextId = this.agreement_client_ids[nextIndex];

                if (nextId) {
                    this.current_id = nextId;

                    if (this.current_id === 'id_first_name') {
                        $('#signature-popup').hide();
                    }
                    else if (this.current_id === 'id_hotel_first_name') {
                        $('#signature-popup2').hide();
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

            /**
             *
             * @param el
             * @returns {{bottom: *, right: *, left: number, top: number, width: *, height: *}}
             */
            getElementBoundingBox(el) {
                let jElem = $(el);

                let top = jElem.offset().top - 28;
                let outerHeight = jElem.outerHeight() + (28);
                let bounds = {
                    bottom: top + outerHeight,
                    right: jElem.offset().left + jElem.outerWidth(),
                    left: jElem.offset().left,
                    top: top,
                    width: jElem.outerWidth(),
                    height: outerHeight
                };

                return bounds;
            },

            getElementOffset(el) {
                let top = 0;
                let left = 0;
                let element = el;

                // Loop through the DOM tree
                // and add it's parent's offset to get page offset
                do {
                    top += element.offsetTop || 0;
                    left += element.offsetLeft || 0;
                    element = element.offsetParent;
                } while (element);

                return {
                    top,
                    left,
                };
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
                        data.hotel_agreements_phone = data.hotel_agreements_phone.replace(' ext. ____', '').replace(/_/g, '').trim();

                        let resp = await http.post(this.url + 'hotel-agreement/ajax-save-agreement.php', data);

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
                $('.btn-start');
            });

            window.addEventListener('resize', this.handleResize);
        },
        beforeDestroy: function () {
            window.removeEventListener('resize', this.handleResize);
        },
        updated () {}
    }
</script>
<style rel="stylesheet/scss" type="text/scss" lang="scss" scoped>
    /* Custom SASS Here */
</style>
