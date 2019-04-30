<?php

namespace App\Mail;

use App\Callback;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CallbackMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Callback
     */
    private $callbackObj;

    /**
     * CallbackMail constructor.
     * @param $callbackObject
     */
    public function __construct($callbackObject)
    {
        $this->callbackObj = $callbackObject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('k380991576192@gmail.com')
            ->view('mails.callback')
            ->text('mails.callback_plain')
            ->with([
                'name' => $this->callbackObj->name,
                'phone' => $this->callbackObj->phone,
                'email' => $this->callbackObj->email
            ]);
    }
}
