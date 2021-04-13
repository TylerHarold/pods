<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendPodMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $username;

    // Channel being "pod-chat-${pod_id}"
    public $channel;

    public $message;

    public $avatar;

    public $date;

    /**
     * Create a new event instance.
     *
     * @param $data - requires the public variables above
     */
    public function __construct($data)
    {
        $this->username = $data['username'];
        $this->channel = $data['channel'];
        $this->message = $data['message'];
        $this->avatar = $data['avatar'];
        $this->date = $data['date'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel($this->channel);
    }

    public function broadcastAs()
    {
        return 'send-message';
    }
}
