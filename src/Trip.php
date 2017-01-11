<?php
/**
 * Trip
 *
 * @author Hafiz Waheeduddin Ahmad <kaasib@gmail.com>
 */
class Trip
{
    /**
     * Get Trip Description based on Cards
     *
     * @param CardManager $cardManager
     * @param Array $cards
     * @param Transport $defTransport Default object implementing Transport
     * @return String Trip description
     */
    public function getTripDescriptionFromCards(CardManager $cardManager, $cards, $defTransport = null)
    {
        $cardStatements = [];

        $counter = "1";
        foreach ($cards as $cardInfo) {
            $name = $cardManager->getTransportName($cardInfo);

            if (!$defTransport) {
                $transport = new $name();
            } else {
                $transport = $defTransport;
            }

            $cardStatements[] = $counter.". ".$cardManager->getCardStatement($transport, $cardInfo);
            $counter++;
        }

        $description = implode("<br>\n", $cardStatements);
        $description .= "<br>\n{$counter}. You have arrived at your final destination.";

        return $description;
    }

    /**
     * Sort Cards
     *
     * @param Array $cards
     * @return Array $sortCards Cards in sorted order
     */
    public function sortCards($cards)
    {
        //populating from and to arrays
        foreach ($cards as $card) {
            $from[$card['from']] = $card;
            $to[$card['to']] = $card;
        }

        //getting first location to start trip
        $fromLocations = array_keys($from);
        $fromLocationsCount = count($fromLocations);
        for ($i = 0; $i<$fromLocationsCount; $i++) {
            if (!array_key_exists($fromLocations[$i], $to)) {
                $startLocation = $fromLocations[$i];
                break;
            }
        }

        // first current location will be start location
        $sortedCards = [];
        $currentLocation = $startLocation;

        //sorting cards
        while ($currentCard = isset($from[$currentLocation])?$from[$currentLocation]:null) {
            $sortedCards[] = $currentCard;
            $currentLocation = $currentCard['to'];
        }

        return $sortedCards;
    }
}
