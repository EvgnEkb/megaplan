<?php

namespace App\Transports;

use App\Interfaces\TransportInterface;

class StandartPassengerCar implements TransportInterface {

    const TRANSPORT_CODE = 'c';

    public Array $availableFloors = [];

    public function __construct()
    {
        
    }


}