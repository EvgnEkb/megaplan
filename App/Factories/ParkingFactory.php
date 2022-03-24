<?php

namespace App\Factories;

use App\Parkings\StandartParking;
use App\Interfaces\ParkingFactoryInterface;

class ParkingFactory implements ParkingFactoryInterface{

    public function createParking(Array $floorsSpaces, Array $freeFloorsSpaces)
    {
        return new StandartParking($floorsSpaces, $freeFloorsSpaces);
    }

}