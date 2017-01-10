<?php

namespace spec;

use CardManager;
use Train;
use Air;
use AirportBus;
use Transport;
use Trip;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TripSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Trip::class);
    }

    public function it_shows_sorted_cards_as_trip_description(CardManager $card, Transport $transport)
    {
        $cardInfo1 = [
           'from' => 'Madrid',
           'to' => 'Barcelona',
           'transport' => [
               'medium' => 'train',
               'seat' => '45B',
               'train_number' => '78A'
            ]
        ];

        $cardInfo2 = [
           'from' => 'Barcelona',
           'to' => 'Gerona Airport',
           'transport' => [
               'medium' => 'AirportBus',
               'seat' => 'No seat assignment'
            ]
        ];

        $cardInfo3 = [
           'to' => 'Stockholm',
           'from' => 'Gerona Airport',
           'transport' => [
               'medium' => 'Airplane',
               'seat' => '3A',
               'gate' => '22',
               'extra' => 'Baggage drop at ticket counter 344'
            ]
        ];

        $cardsInfo = [$cardInfo1, $cardInfo2, $cardInfo3];

        $card->getCardStatement($transport, $cardInfo1)->willReturn("Take train 78A from Madrid to Barcelona. Sit in seat 45B.");
        $card->getCardStatement($transport, $cardInfo2)->willReturn("Take the airport bus from Barcelona to Gerona Airport. No seat assignment.");
        $card->getCardStatement($transport, $cardInfo3)->willReturn("From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A.Baggage drop at ticket counter 344.");

        $card->getTransportName($cardInfo1)->shouldBeCalled()->willReturn("Train");
        $card->getTransportName($cardInfo2)->shouldBeCalled()->willReturn("AirportBus");
        $card->getTransportName($cardInfo3)->shouldBeCalled()->willReturn("Air");

        $this->getTripDescriptionFromCards($card, $cardsInfo, $transport)->shouldContain('1. Take train 78A from Madrid to Barcelona. Sit in seat 45B.<br>
2. Take the airport bus from Barcelona to Gerona Airport. No seat assignment.<br>
3. From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A.Baggage drop at ticket counter 344.<br>
4. You have arrived at your final destination.');
    }


    public function it_sorts_card_info_array()
    {
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
                'to' => 'Stockholm',
                'from' => 'Gerona Airport',
                'transport' => [
                    'medium' => 'Airplane',
                    'seat' => '3A',
                    'gate' => '45B',
                    'extra' => 'Baggage drop at ticket counter 344'
                ]
            ]
        ];

        $expectedSortedArr = [
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
                'from' => 'Barcelona',
                'to' => 'Gerona Airport',
                'transport' => [
                    'medium' => 'AirportBus',
                    'seat' => 'No seat assignment'
                ]
            ],
            [
                'from' => 'Gerona Airport',
                'to' => 'Stockholm',
                'transport' => [
                    'medium' => 'Airplane',
                    'seat' => '3A',
                    'gate' => '45B',
                    'extra' => 'Baggage drop at ticket counter 344'
                ]
            ]
        ];

        $this->sortCards($cardInfoArr)->shouldBeLike($expectedSortedArr);
    }
}
