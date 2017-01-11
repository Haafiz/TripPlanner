<?php

/**
 * AirportBus
 *
 * @author Hafiz Waheeduddin Ahmad <kaasib@gmail.com>
 */
class AirportBus implements Transport
{
    /**
     * Get boarding card info based on Card
     *
     * @param  Array $card
     * @return String $str Boarding description
     */
    public function getBoardingCardInfo($card)
    {
        $from = isset($card['from'])?$card['from']:'';
        $to = isset($card['to'])?$card['to']:'';
        $seat = isset($card['transport']['seat']) ? $card['transport']['seat'] : '';

        $str = "Take the airport bus from {$from} to {$to}. {$seat}.";
        return $str;
    }
}
