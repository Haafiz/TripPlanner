<?php

namespace spec;

use CardManager;
use Transport;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CardSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType("CardManager");
    }

    public function it_gets_card_statement(Transport $transport)
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

    public function it_gets_transport_name()
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

        $this->getTransportName($info)->shouldBe('Train');
    }
}
