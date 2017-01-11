<?php
/**
 * Train
 *
 * @author Hafiz Waheeduddin Ahmad <kaasib@gmail.com>
 */
class Train implements Transport
{
    /**
     * Get boarding card info based on Card
     *
     * @param Array $card
     * @return String $str Boarding description
     */
    public function getBoardingCardInfo($card)
    {
        $from = isset($card['from'])?$card['from']:'';
        $to = isset($card['to'])?$card['to']:'';
        $seat = isset($card['transport']['seat']) ? $card['transport']['seat']:'';
        $trainNumber= isset($card['transport']['train_number']) ? $card['transport']['train_number']:'';

        $str = "Take train {$trainNumber} from {$from} to {$to}. Sit in seat {$seat}.";
        return $str;
    }
}
