<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Contact;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $contact;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.contact')
            ->subject('Contact from PhotoFit')
            ->with([
                'name' => $this->contact->first_name.$this->contact->last_name,
                'nameKana' => $this->contact->first_name_furigana.$this->contact->last_name_furigana,
                'email' => $this->contact->email,
                'type' => $this->contact->contact_type,
                'content' => $this->contact->content
            ]);
    }
}
