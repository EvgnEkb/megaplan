<?php

namespace App\Transports;

use App\Interfaces\TransportInterface;

class StandartTruck implements TransportInterface {

    const TRANSPORT_CODE = 't';

    public Array $availableFloors = [1];

    public function __construct()
    {
        
    }

}
