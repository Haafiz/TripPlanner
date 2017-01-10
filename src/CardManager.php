<?php

class CardManager
{

    public function getCardStatement(Transport $transport, $info)
    {
        $boardingCardInfo = $transport->getBoardingCardInfo($info);

        return $boardingCardInfo;
    }

    public function getTransportName($info)
    {
        return ucwords($info['transport']['medium']);
    }
}
