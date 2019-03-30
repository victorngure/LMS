<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChequeRejected
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chequeNumber;

    public $message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($chequeNumber)
    {
        $this->chequeNumber = $chequeNumber;
        $this->message  = "{$chequeNumber} has been rejected";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return 'cheque-rejected';
    }
}
