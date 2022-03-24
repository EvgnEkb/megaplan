<?php

namespace App;

use App\Factories\ParkingFactory;
use App\Factories\TransportFactory;

class App {
    
    public function run($places, $traffic){
        
        
        $transportFactory = new TransportFactory();

        $passengerCar = $transportFactory->createPasangerCar();
        $truck = $transportFactory->createTruck();

        
        $inputFreeFloorsSpaces = explode(' ', $places);
        $inputTrafficFlow = explode(' ', $traffic);

       

        $parkingFactory = new ParkingFactory();
        $parkingfloorsSpaces = [30,20,50];
        $parking = $parkingFactory->createParking(
            $parkingfloorsSpaces,
            $inputFreeFloorsSpaces
        );
        
        $formattedArrPlace = $this->formattedArrPlaces($parking->freeFloorsSpaces);

        $output = [];
    
        foreach($inputTrafficFlow as $transport){
            foreach($formattedArrPlace as &$place){
                     
                if($transport == $passengerCar::TRANSPORT_CODE){
                    
                    $availableFloors = $passengerCar->availableFloors;

                }elseif($transport == $truck::TRANSPORT_CODE){
                    
                    $availableFloors = $truck->availableFloors;

                }
                
                if(count($availableFloors) == 0){
                    $summFreePlacesCounts = array_sum(array_column($formattedArrPlace, 'freePlacesCount'));

                    if($summFreePlacesCounts > 0){
                        if($place['freePlacesCount'] > 0){
                            $place['freePlacesCount']--;
                            $output[] = 'y';
                            break;
                        }
                    }else{
                        $output[] = 'n';
                        break;
                    }
                }else{
                    if(in_array($place['floor'], $availableFloors)){
                        if($place['freePlacesCount'] > 0){
                            $place['freePlacesCount']--;
                            $output[] = 'y';
                            break;
                        }else{
                            $output[] = 'n';
                            break;
                        }
                    }
                }
                
            }
            
        }
        
        $output = implode(' ', $output);
        $output = PHP_EOL.$output.PHP_EOL.PHP_EOL;
        
        echo $output;
    }

    public function formattedArrPlaces($freePlaces) : Array
    {
        $placesInfo = [];

        foreach($freePlaces as $key => $item){
            $placesInfo[$key]['floor'] = $key + 1;
            $placesInfo[$key]['freePlacesCount'] = $item;
        }

        $placesInfo = array_reverse($placesInfo); 

        return $placesInfo;
    }

}