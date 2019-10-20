<?php

namespace Tjventurini\VoyagerShop\Events;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Tjventurini\VoyagerShop\Models\Country;
use Tjventurini\VoyagerShop\Models\Project;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UpdateOrCreateAddress
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $User;
    public $Project;
    public $Country;
    public $address;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User &$User, Project &$Project, Country &$Country, array &$address)
    {
        $this->User = &$User;
        $this->Project = &$Project;
        $this->Country = &$Country;
        $this->address = &$address;
    }
}
