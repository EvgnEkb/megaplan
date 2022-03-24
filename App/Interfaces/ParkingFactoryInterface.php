<?php

namespace App\Interfaces;

interface ParkingFactoryInterface {
    public function createParking(Array $floorsSpaces, Array $freeFloorsSpaces);
}