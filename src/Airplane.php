<?php

/**
 * Airplane
 *
 * @author Hafiz Waheeduddin Ahmad <kaasib@gmail.com>
 */
class Airplane implements Transport
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
        $seat = isset($card['transport']['seat'])?$card['transport']['seat']:'';
        $gate = isset($card['transport']['gate'])?$card['transport']['gate']:'';
        $extraInfo = isset($card['transport']['extra'])?$card['transport']['extra']:'';
        $flight = isset($card['transport']['flight'])?$card['transport']['flight']:'';

        $str = "From {$from}, take flight {$flight} to {$to}. Gate {$gate}, seat {$seat}. {$extraInfo}.";
        return $str;
    }
}
