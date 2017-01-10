<?php

class Airplane implements Transport
{
    public function getBoardingCardInfo($info)
    {
        $from = $info['from'];
        $to = $info['to'];
        $seat = $info['transport']['seat'];
        $gate = $info['transport']['gate'];
        $extraInfo = $info['transport']['extra'];
        $flight = $info['transport']['flight'];

        $str = "From {$from}, take flight {$flight} to {$to}. Gate {$gate}, seat {$seat}. {$extraInfo}.";
        return $str;
    }
}
