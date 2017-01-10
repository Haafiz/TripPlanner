<?php

class CardCollection
{

    public function getCardsAsTripDescription(Card $card, $cardsInfo, $defTransport = null)
    {
        $cardStatements = [];

        $counter = "1";
        foreach ($cardsInfo as $cardInfo) {
            $name = $card->getTransportName($cardInfo);

            if (!$defTransport) {
                $transport = new $name();
            } else {
                $transport = $defTransport;
            }


            $cardStatements[] = $counter.". ".$card->getCardStatement($transport, $cardInfo);
            $counter++;
        }

        $description = implode("<br>\n", $cardStatements);
        $description .= "<br>\n4. You have arrived at your final destination.";

        return $description;
    }
}
