<?php

namespace App\Parkings;

use App\Interfaces\ParkingInterface;
use App\Interfaces\TransportInterface;

class StandartParking implements ParkingInterface{
    const FLOORS = 3;
    
    public Array $floorsSpaces;
    public Array $freeFloorsSpaces;

    public function __construct(Array $floorsSpaces, Array $freeFloorsSpaces)
    {
        $this->$floorsSpaces = $floorsSpaces;
        $this->freeFloorsSpaces = array_slice($freeFloorsSpaces, 0, self::FLOORS);
    }
    

}