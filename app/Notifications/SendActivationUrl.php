<?php
/**
 * This class send activation URLs to a user's phone_number field
 * php version 7.1
 *
 * @category Notifications
 * @package  App\Notifications
 * @author   Joseph Montanez <jm@comentum.com>
 * @license  https://opensource.org/licenses/BSD-3-Clause BSD
 * @link     https://sportstravelhq.com
 */

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\Twilio\TwilioChannel;
use NotificationChannels\Twilio\TwilioSmsMessage;


/**
 * Class SendActivationUrl
 *
 * @category Notifications
 * @package  App\Notifications
 * @author   Joseph Montanez <jm@comentum.com>
 * @license  https://opensource.org/licenses/BSD-3-Clause BSD
 * @link     https://sportstravelhq.com
 */
class SendActivationUrl extends Notification
{
    use Queueable;

    /**
     * The activation URL to send to the user's phone number
     *
     * @var string
     */
    private $_activationUrl;

    /**
     * Create a new notification instance.
     *
     * @param string $activationUrl The activation URL to send
     */
    public function __construct($activationUrl)
    {
        $this->_activationUrl = $activationUrl;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable The notification class
     *
     * @return array
     */
    public function via($notifiable)
    {
        return [TwilioChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable The notification class
     *
     * @return \NotificationChannels\Twilio\TwilioSmsMessage
     */
    public function toTwilio($notifiable)
    {
        $message = new TwilioSmsMessage();

        return $message
            ->content(
                'Thank You for registering with SportsTravel HQ! ' .
                'Please check your inbox and click on the activation ' .
                'link below ' . $this->_activationUrl
            );
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable The notification class
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
