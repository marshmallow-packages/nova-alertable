<?php

namespace Marshmallow\Alertable\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AlertNotificationEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $user_id;

    public $alert_message = '';

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, $alert_message)
    {
        $this->user_id = $user->id;
        $this->alert_message = $alert_message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel("alertable.{$this->user_id}");
    }
}
