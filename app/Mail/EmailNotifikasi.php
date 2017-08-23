<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Pertanyaan;

class EmailNotifikasi extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $result;

    public function __construct($id)
    {
        $this->result = Pertanyaan::find($id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->result->judul_pertanyaan)->from('no-reply@info.its.ac.id')->view('emailnotifikasi.index');
    }
}
