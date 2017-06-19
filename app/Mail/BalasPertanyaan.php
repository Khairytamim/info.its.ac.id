<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jawaban;

class BalasPertanyaan extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $data = [];

    public function __construct($data)
    {
        $this->data['id'] = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->data['jawaban'] = Jawaban::find($this->data['id']);

        return $this->subject('sss')->from('no-reply@info.its.ac.id')->view('');
    }
}
