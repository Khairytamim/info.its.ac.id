<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Pertanyaan;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifikasiKonfirmasi extends Mailable
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
        return $this->subject('[KONFIRMASI]'.$this->result->judul_pertanyaan)->from('no-reply@info.its.ac.id')->view('konfirmasinotifikasi.index');
    }
}
