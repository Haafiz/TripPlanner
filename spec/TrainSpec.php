<?php

namespace spec;

use Train;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TrainSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Train::class);
    }

    public function it_returns_boarding_card_info()
    {
        $info = [
                'from' => 'Madrid',
                'to' => 'Barcelona',
                'transport' => [
                    'medium' => 'train',
                    'seat' => '45B',
                    'train_number' => "78A",
                ]
        ];

        $this->getBoardingCardInfo($info)->shouldReturn("Take train 78A from Madrid to Barcelona. Sit in seat 45B.");
    }
}
