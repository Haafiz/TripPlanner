<?php

class Trip
{
    /**
     * Get Trip Description based on Cards info Array
     *
     * @param $card
     *
     */
    public function getTripDescriptionFromCards(Card $card, $cardsInfo, $defTransport = null)
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

    public function sortCardsInfo($arr)
    {
        foreach ($arr as $card) {
            $from[$card['from']] = $card;
            $to[$card['to']] = $card;
        }

        $fromLocations = array_keys($from);
        $fromLocationsCount = count($fromLocations);

        for ($i = 0; $i<$fromLocationsCount; $i++) {
            if (!array_key_exists($fromLocations[$i], $to)) {
                $startLocation = $fromLocations[$i];
                break;
            }
        }

        $sortedCards = [];
        $currentLocation = $startLocation;

        while ($currentCard = isset($from[$currentLocation])?$from[$currentLocation]:null) {
            $sortedCards[] = $currentCard;
            $currentLocation = $currentCard['to'];
        }

        return $sortedCards;
    }
}
