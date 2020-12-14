<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email_data;

//    public $path;
    public function __construct($data)
    {
        $this->email_data = $data;
//        $this->path = public_path("files\\");
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): TestMail
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), "CRUD TECHNOLOGIES")
            ->subject('TEST')
            ->view('mail', ["data" => $this->email_data])
            ->attach('files/'.$this->email_data['first_name']."_receipt.pdf");
    }
}
