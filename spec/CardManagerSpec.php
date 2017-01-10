<?php
/**
 * Spec file for CardManager Class' implementation
 *
 * @package  TripPlan
 * @author   Hafiz Waheeduddin Ahmad <kaasib@gmail.com>
 */
namespace spec;

use CardManager;
use Transport;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * CardManagerSpec
 *
 * This class describe Specs for CardManager Class
 */
class CardManagerSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType("CardManager");
    }

    /**
     * Specify that it gets Card's statement in string
     *
     * @param Transport $transport Injecting Transport to use it as Double to
     * mock behavior
     */
    public function it_gets_card_statement(Transport $transport)
    {
        $card = [
                'from' => 'Madrid',
                'to' => 'Barcelona',
                'transport' => [
                    'medium' => 'train',
                    'seat' => '45B',
                    'train_number' => '78A'
                ]
        ];

        $expectedOutput = 'Take train 78A from Madrid to Barcelona. Sit in seat 45B.';

        //Mocking Transport behavior and specifying expectation of getBoardingCardInfo()
        $transport->getBoardingCardInfo($card)->shouldBeCalled()->willReturn($expectedOutput);

        $this->getCardStatement($transport, $card)->shouldBe($expectedOutput);
    }

    /**
     * Specify that it gets Transport name from Card
     */
    public function it_gets_transport_name()
    {
        $card = [
                'from' => 'Madrid',
                'to' => 'Barcelona',
                'transport' => [
                    'medium' => 'train',
                    'seat' => '45B',
                    'train_number' => '78A'
                ]
        ];

        $this->getTransportName($card)->shouldBe('Train');
    }
}
