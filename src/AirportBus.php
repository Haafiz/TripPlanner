<?php

class AirportBus implements Transport
{
    public function getBoardingCardInfo($info)
    {
        $from = $info['from'];
        $to = $info['to'];
        $seat = $info['transport']['seat'];

        $str = "Take the airport bus from {$from} to {$to}. {$seat}.";
        return $str;
    }
}
