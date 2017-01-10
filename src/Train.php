<?php

class Train implements Transport
{
    public function getBoardingCardInfo($info)
    {
        $from = $info['from'];
        $to = $info['to'];
        $seat = $info['transport']['seat'];
        $trainNumber= $info['transport']['train_number'];

        $str = "Take train {$trainNumber} from {$from} to {$to}. Sit in seat {$seat}.";
        return $str;
    }
}
