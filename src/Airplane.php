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
     * @param Array $card
     * @return String $str Boarding description
     */
    public function getBoardingCardInfo($card)
    {
        $from = $card['from'];
        $to = $card['to'];
        $seat = $card['transport']['seat'];
        $gate = $card['transport']['gate'];
        $extraInfo = $card['transport']['extra'];
        $flight = $card['transport']['flight'];

        $str = "From {$from}, take flight {$flight} to {$to}. Gate {$gate}, seat {$seat}. {$extraInfo}.";
        return $str;
    }
}
