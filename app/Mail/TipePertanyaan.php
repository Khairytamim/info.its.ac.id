<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Pertanyaan;

class TipePertanyaan extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void

     */
    public $data = [];

    public function __construct($id, $jawaban)
    {
        $this->data['id'] = $id;
        $this->data['jawaban'] = $jawaban;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->data['pertanyaan'] = Pertanyaan::find($this->data['id']);


        return $this->subject('Konfirmasi Pertanyaan: '. $this->data['pertanyaan']->judul_pertanyaan)->from('no-reply@info.its.ac.id')->view('emailkonfirmasitipe.index');
    }
}
