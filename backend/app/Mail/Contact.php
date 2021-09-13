<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $name, $comment, $url)
    {
        $this->subject = $subject;
        $this->name = 'こんにちは、'.$name.'さん';
        $this->comment = $comment;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.contactMail')
        ->subject($this->subject)
        ->with([
            'subject' => $this->subject,
            'name' => $this->name,
            'comment' => $this->comment,
            'url' => $this->url,
        ]);
    }
}
