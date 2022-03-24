<?php

namespace App\Factories;

use App\Transports\StandartPassengerCar;
use App\Transports\StandartTruck;
use App\Interfaces\TransportFactoryInterface;



class TransportFactory implements TransportFactoryInterface {

    public function createPasangerCar()
    {
        return new StandartPassengerCar();
    }

    public function createTruck()
    {
        return new StandartTruck();
    }

}