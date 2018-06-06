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
        // echo $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        set_time_limit(0);
        $data = Jawaban::find($this->data['id']);
        $this->data['jawaban'] = $data;
        //dd($data);
        //echo "$data->pertanyaan";
        // dd($data);
        return $this->subject($data->judul_jawaban)->from('no-reply@info.its.ac.id')->view('emailbalasan.index');
    }
}
