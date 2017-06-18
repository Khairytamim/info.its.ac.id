<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class test extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $eaaaa;

    public function __construct($order)
    {
        $this->eaaaa = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // echo $this->eaaaa;
        return $this->subject('sss')->from('hlmn@vpn.muhammadhilman.com')->view('home');
    }
}
