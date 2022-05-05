<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReviewImport extends Mailable
{
    use Queueable, SerializesModels;

    public $import;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($import)
    {
        $this->import = $import;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('view.name');
    }
}
