<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DriverMail extends Mailable
{
    use Queueable, SerializesModels;

    private $driver;

    private $files;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($driver, $files)
    {
        $this->driver = $driver;
        $this->files = $files;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->from('k380991576192@gmail.com')
            ->view('mails.driver')
            ->text('mails.driver_plain')
            ->with([
                'first_name' => $this->driver->first_name,
                'last_name' => $this->driver->last_name,
                'middle_name' => $this->driver->middle_name,
                'city' => $this->driver->city,
                'phone' => $this->driver->phone,
                'email' => $this->driver->email
            ]);

        foreach ($this->files as $file) {
            $mail->attachFromStorage($file);
        }

        return $mail;
    }
}
