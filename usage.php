<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require('vendor/autoload.php');

$cards = [
    [
        'from' => 'Barcelona',
        'to' => 'Gerona Airport',
        'transport' => [
            'medium' => 'AirportBus',
            'seat' => 'No seat assignment'
        ]
    ],
    [
        'from' => 'Madrid',
        'to' => 'Barcelona',
        'transport' => [
            'medium' => 'train',
            'seat' => '45B',
            'train_number' => '78A'
        ]
    ],
    [
        'from' => 'Stockholm',
        'to' => 'New York JFK',
        'transport' => [
            'medium' => 'Airplane',
            'seat' => '7B',
            'gate' => '22',
            'flight' => 'SK22',
            'extra' => 'Baggage will we automatically transferred from your last leg'
        ]
    ],
    [
        'to' => 'Stockholm',
        'from' => 'Gerona Airport',
        'transport' => [
            'medium' => 'Airplane',
            'seat' => '3A',
            'gate' => '45B',
            'flight' => 'SK455',
            'extra' => 'Baggage drop at ticket counter 344'
        ]
    ]
];

$trip = new Trip;
$sortedCards = $trip->sortCards($cards);

$cardManager = new CardManager;
$tripDescription = $trip->getTripDescriptionFromCards($cardManager, $sortedCards);

echo $tripDescription;
