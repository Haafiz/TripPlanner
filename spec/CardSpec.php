<?php

namespace spec;

use Card;
use Transport;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CardSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType("Card");
    }

    public function it_gets_card_info(Transport $transport)
    {
        $info = [
                'from' => 'Madrid',
                'to' => 'Barcelona',
                'transport' => [
                    'medium' => 'train',
                    'seat' => '45B',
                    'train_number' => '78A'
                ]
        ];

        $expectedOutput = 'Take train 78A from Madrid to Barcelona. Sit in seat 45B.';

        $transport->getBoardingCardInfo($info)->shouldBeCalled()->willReturn($expectedOutput);

        $this->getCardStatement($transport, $info)->shouldBe($expectedOutput);
    }

    public function it_gets_transportName()
    {
        $info = [
                'from' => 'Madrid',
                'to' => 'Barcelona',
                'transport' => [
                    'medium' => 'train',
                    'seat' => '45B'
                ]
        ];

        $this->getTransportName($info)->shouldBe('Train');
    }
}
