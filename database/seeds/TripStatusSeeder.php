<?php

use Illuminate\Database\Seeder;

class TripStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * INSERT INTO `trip_statuses` (`id`, `title`, `step`, `color`, `description`, `mail`, `mail_subject`, `group_level`) VALUES
(1, 'Sent', 1, '008000', '{coordinator_name} just added the trip: <b>{trip_title}</b>', 'Hello {coordinator_name}, Thankyou! for adding the trip <b>{trip_title}</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', 4),
(2, 'Pending Review', 1, '800080', 'all managers received the notification about the new trip Hello {manager_name}, A new trip has beed added by {coordinator_name} <br />\n<b>{trip_title}</b>', 'Hello {manager_name}, A new trip request is added by {coordinator_name}. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/{trip_id}\">here</a> for submitting your proposal.', 'A New Trip Added ', 5),
(3, 'Bid Sent', 2, '000080', 'Hotel Manager {manager_name} sees and send the RFP/Bid on {trip_title}', 'Thankyou {manager_name} for sending your proposal you will get another notification if your bid is accepted/rejected by the coordinator', 'Thankyou! for Submitting your Bid', 5),
(4, 'Bid Received', 2, '800000', 'Coordinator received the bid from {manager_name}', 'Hello {coordinator_name}, A new bid is sent by {manager_name} on your trip: {trip_name}. you can click here for review.  ', 'A new bid received on your trip: {trip_name}', 4),
(5, 'Decline', 3, '333333', 'Coordinator has declined this Bid', 'You\'ve declined the bid ...', 'Declined Bid', 4),
(6, 'Declined', 3, '666666', 'Your Bid has beed declined by the coordinator.', 'Your Bid has beed declined by the coordinator. Thank you for you efforts keep bidding with us.', 'Bid has beed declined', 5),
(7, 'Accept', 4, '999999', 'Coordinator has accepted this bid', 'Thank you! for accepting this bid, we\'d like to serve you best.', 'Thankyou for Accepting Bid', 4),
(8, 'Accepted', 4, 'CCCCCC', 'Hotel Manager {manager_name}\'s Bid has beed accepted', 'Congratulations! Your Bid has been accepted by travel coordinator {coordinator_name}', 'Congratulations! Your Bid has been accepted', 5);
         */

        $trip_statuses = <<<'JSON'
[
  {
    "id": 1,
    "title": "Sent",
    "step": 1,
    "color": "008000",
    "description": "{coordinator_name} just added the trip: <b>{trip_title}</b>",
    "mail": "Hello {coordinator_name}, Thankyou! for adding the trip <b>{trip_title}</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>",
    "mail_subject": "Thankyou! for Adding Trip",
    "group_level": 4
  },
  {
    "id": 2,
    "title": "Pending Review",
    "step": 1,
    "color": "800080",
    "description": "all managers received the notification about the new trip Hello {manager_name}, A new trip has beed added by {coordinator_name} <br />\n<b>{trip_title}</b>",
    "mail": "Hello {manager_name}, A new trip request is added by {coordinator_name}. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/{trip_id}\">here</a> for submitting your proposal.",
    "mail_subject": "A New Trip Added ",
    "group_level": 5
  },
  {
    "id": 3,
    "title": "Bid Sent",
    "step": 2,
    "color": "000080",
    "description": "Hotel Manager {manager_name} sees and send the RFP/Bid on {trip_title}",
    "mail": "Thankyou {manager_name} for sending your proposal you will get another notification if your bid is accepted/rejected by the coordinator",
    "mail_subject": "Thankyou! for Submitting your Bid",
    "group_level": 5
  },
  {
    "id": 4,
    "title": "Bid Received",
    "step": 2,
    "color": "800000",
    "description": "Coordinator received the bid from {manager_name}",
    "mail": "Hello {coordinator_name}, A new bid is sent by {manager_name} on your trip: {trip_name}. you can click here for review.  ",
    "mail_subject": "A new bid received on your trip: {trip_name}",
    "group_level": 4
  },
  {
    "id": 5,
    "title": "Decline",
    "step": 3,
    "color": "333333",
    "description": "Coordinator has declined this Bid",
    "mail": "You've declined the bid ...",
    "mail_subject": "Declined Bid",
    "group_level": 4
  },
  {
    "id": 6,
    "title": "Declined",
    "step": 3,
    "color": "666666",
    "description": "Your Bid has beed declined by the coordinator.",
    "mail": "Your Bid has beed declined by the coordinator. Thank you for you efforts keep bidding with us.",
    "mail_subject": "Bid has beed declined",
    "group_level": 5
  },
  {
    "id": 7,
    "title": "Accept",
    "step": 4,
    "color": "999999",
    "description": "Coordinator has accepted this bid",
    "mail": "Thank you! for accepting this bid, we'd like to serve you best.",
    "mail_subject": "Thankyou for Accepting Bid",
    "group_level": 4
  },
  {
    "id": 8,
    "title": "Accepted",
    "step": 4,
    "color": "CCCCCC",
    "description": "Hotel Manager {manager_name}'s Bid has beed accepted",
    "mail": "Congratulations! Your Bid has been accepted by travel coordinator {coordinator_name}",
    "mail_subject": "Congratulations! Your Bid has been accepted",
    "group_level": 5
  }
]
JSON;

        $trip_statuses = json_decode($trip_statuses, true);

        foreach ($trip_statuses as $tripStatusData) {
            $tripStatus = new \App\Models\TripstatusSettings();
            $tripStatus->id = $tripStatusData['id'];
            $tripStatus->title = $tripStatusData['title'];
            $tripStatus->step = $tripStatusData['step'];
            $tripStatus->color = $tripStatusData['color'];
            $tripStatus->description = $tripStatusData['description'];
            $tripStatus->mail = $tripStatusData['mail'];
            $tripStatus->mail_subject = $tripStatusData['mail_subject'];
            $tripStatus->group_level = $tripStatusData['group_level'];
            $tripStatus->save();
        }

    }
}
