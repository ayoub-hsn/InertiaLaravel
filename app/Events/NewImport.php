<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class NewImport
{
    use SerializesModels;

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
}
