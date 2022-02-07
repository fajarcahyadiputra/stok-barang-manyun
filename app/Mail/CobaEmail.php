<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CobaEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $barang;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($barang)
    {
        $this->barang = $barang;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('template.email.coba');
    }
}
