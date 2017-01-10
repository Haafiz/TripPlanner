<?php
/**
 * Spec file for Trip Class' implementation
 *
 * @package  TripPlan
 * @author   Hafiz Waheeduddin Ahmad <kaasib@gmail.com>
 */
namespace spec;

use CardManager;
use Train;
use Air;
use AirportBus;
use Transport;
use Trip;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * TripSpec
 *
 * This class describe Specs for Trip Class
 */
class TripSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Trip::class);
    }

    /**
     * It return cards as trip description
     *
     * @param CardManager $cardManager CardManager Double for mocking
     * @param Transport $transport  Mocking Object of class implementing
     * Transport interface
     *
     */
    public function it_shows_sorted_cards_as_trip_description(CardManager $cardManager, Transport $transport)
    {
        $card1 = [
           'from' => 'Madrid',
           'to' => 'Barcelona',
           'transport' => [
               'medium' => 'train',
               'seat' => '45B',
               'train_number' => '78A'
            ]
        ];

        $card2 = [
           'from' => 'Barcelona',
           'to' => 'Gerona Airport',
           'transport' => [
               'medium' => 'AirportBus',
               'seat' => 'No seat assignment'
            ]
        ];

        $card3 = [
           'to' => 'Stockholm',
           'from' => 'Gerona Airport',
           'transport' => [
               'medium' => 'Airplane',
               'seat' => '3A',
               'gate' => '22',
               'extra' => 'Baggage drop at ticket counter 344'
            ]
        ];

        $cards = [$card1, $card2, $card3];

        // Mock the behavior and expectation for Card::getCardStatement()
        $cardManager->getCardStatement($transport, $card1)->willReturn("Take train 78A from Madrid to Barcelona. Sit in seat 45B.");
        $cardManager->getCardStatement($transport, $card2)->willReturn("Take the airport bus from Barcelona to Gerona Airport. No seat assignment.");
        $cardManager->getCardStatement($transport, $card3)->willReturn("From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A.Baggage drop at ticket counter 344.");

        // Mock the behavior and expectation for Card::getTransportName()
        $cardManager->getTransportName($card1)->shouldBeCalled()->willReturn("Train");
        $cardManager->getTransportName($card2)->shouldBeCalled()->willReturn("AirportBus");
        $cardManager->getTransportName($card3)->shouldBeCalled()->willReturn("Air");

        $this->getTripDescriptionFromCards($cardManager, $cards, $transport)->shouldContain('1. Take train 78A from Madrid to Barcelona. Sit in seat 45B.<br>
2. Take the airport bus from Barcelona to Gerona Airport. No seat assignment.<br>
3. From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A.Baggage drop at ticket counter 344.<br>
4. You have arrived at your final destination.');
    }


    /**
     * Test that it sorts Cards correctly
     */
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

        $expectedSortedCards = [
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

        $this->sortCards($cards)->shouldBeLike($expectedSortedCards);
    }
}
