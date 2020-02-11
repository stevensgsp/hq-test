<?php

namespace App\Mail;

use App\Models\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ItemCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The Item instance.
     *
     * @var Item
     */
    public $item;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( Item $item )
    {
        $this->item = $item;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown( 'emails.items.created' );
    }
}
