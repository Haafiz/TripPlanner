<?php

namespace spec;

use Card;
use CardCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CardCollectionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(CardCollection::class);
    }

    public function it_shows_sorted_cards_as_trip_description(Card $card, Transport $transport)
    {
        $card1 = [
           'from' => 'Madrid',
           'to' => 'Barcelona',
           'transport' => [
               'medium' => 'train',
               'seat' => '45B'
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
               'medium' => 'Plane',
               'seat' => '3A',
               'gate' => '22',
               'extra' => 'Baggage drop at ticket counter 344'
            ]
        ];

        $cardsInfo = [$card1, $card2, $card3];

        $card->getCardStatement($transport, $card1);
        $card->getTransportName()->shouldBeCalledTimes(3);

        $this->getCardsAsTripDescription($cardsInfo)->shouldContain('You have arrived at your final destination.');
    }
}
