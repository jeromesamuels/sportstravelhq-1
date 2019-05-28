<?php
/**
 * This class send a two factor authentication code to a user's phone_number field
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
 * Class SendTwoFactorVerificationCode
 *
 * @category Notifications
 * @package  App\Notifications
 * @author   Joseph Montanez <jm@comentum.com>
 * @license  https://opensource.org/licenses/BSD-3-Clause BSD
 * @link     https://sportstravelhq.com
 */
class SendTwoFactorVerificationCode extends Notification
{
    use Queueable;

    /**
     * The verification code to send to the user's phone number
     *
     * @var string
     */
    private $_code;

    /**
     * Create a new notification instance.
     *
     * @param string $code The two factor verification code to SMS to user
     */
    public function __construct($code)
    {
        $this->_code = $code;
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
            ->content('Your SportsTravelHQ verification code is ' . $this->_code);
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

    /**
     * Get the two factor verification code
     *
     * @return string
     */
    public function getCode(): string
    {
        return $this->_code;
    }

    /**
     * Set the two factor verification code
     *
     * @param string $code The two factor authentication code
     *
     * @return void
     */
    public function setCode(string $code): void
    {
        $this->_code = $code;
    }
}
