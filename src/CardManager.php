<?php
/**
 * CardManager
 *
 * @author Hafiz Waheeduddin Ahmad <kaasib@gmail.com>
 */
class CardManager
{
    /**
     * Get Card description as statement/Sentence
     *
     * @param Transport $transport
     * @param  Array $Card
     * @return String Card description
     */
    public function getCardStatement(Transport $transport, $card)
    {
        $boardingCardInfo = $transport->getBoardingCardInfo($card);

        return $boardingCardInfo;
    }

    /**
     * Get Transport Name from Card
     *
     * @param  Array $Card
     * @return String Trasport name
     */
    public function getTransportName($card)
    {
        return ucwords($card['transport']['medium']);
    }
}
