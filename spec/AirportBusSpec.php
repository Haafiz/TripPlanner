<?php
/**
 * Spec file for AirBus Class' implementation
 *
 * @package  TripPlan
 * @author   Hafiz Waheeduddin Ahmad <kaasib@gmail.com>
 */
namespace spec;

use AirportBus;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * AirBusSpec
 *
 * This class describe Specs for AirBus Class that implements transport
 */
class AirportBusSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(AirportBus::class);
    }

    public function it_returns_boarding_card_info()
    {
        $info = [
            'from' => 'Barcelona',
            'to' => 'Gerona Airport',
            'transport' => [
                'medium' => 'AirportBus',
                'seat' => 'No seat assignment'
            ]
        ];

        $this->getBoardingCardInfo($info)->shouldReturn("Take the airport bus from Barcelona to Gerona Airport. No seat assignment.");
    }
}
