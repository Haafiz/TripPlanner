<?php

namespace spec;

use Airplane;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AirplaneSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Airplane::class);
    }

    public function it_returns_boarding_card_info()
    {
        $info = [
            'from' => 'Gerona Airport',
            'to' => 'Stockholm',
            'transport' => [
                'medium' => 'Airplane',
                'seat' => '3A',
                'gate' => '45B',
                'flight' => 'SK455',
                'extra' => 'Baggage drop at ticket counter 344'
            ]
        ];

        $this->getBoardingCardInfo($info)->shouldReturn("From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A. Baggage drop at ticket counter 344.");
    }
}
