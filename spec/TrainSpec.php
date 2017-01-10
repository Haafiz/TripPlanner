<?php
/**
 * Spec file for Train Class' implementation
 *
 * @package  TripPlan
 * @author   Hafiz Waheeduddin Ahmad <kaasib@gmail.com>
 */
namespace spec;

use Train;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * TrainSpec
 *
 * This class describe Specs for Train  Class that implements transport
 */
class TrainSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Train::class);
    }

    public function it_returns_boarding_card_info()
    {
        $card = [
                'from' => 'Madrid',
                'to' => 'Barcelona',
                'transport' => [
                    'medium' => 'train',
                    'seat' => '45B',
                    'train_number' => "78A",
                ]
        ];

        $this->getBoardingCardInfo($card)->shouldReturn("Take train 78A from Madrid to Barcelona. Sit in seat 45B.");
    }
}
