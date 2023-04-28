<?php
// src/Model/Hand.php

namespace App\Model;

use App\Model\Deck;

class Hand
{
    private array $cards;


    public function __construct(array $cards)
    {
        $this->cards = $cards;

    }

    public function getCards(): array
    {
        return $this->cards;
    }

    public function sort(array $colorOrder, array $valueOrder): void
    {
        usort($this->cards, function (Card $card1, Card $card2) use ($colorOrder, $valueOrder) {
            $aColorIndex = array_search($card1->getColor(), $colorOrder);
            $bColorIndex = array_search($card2->getColor(), $colorOrder);

            if ($aColorIndex !== $bColorIndex) {
                return ($aColorIndex < $bColorIndex) ? -1 : 1;
            } else {
                $aValueIndex = array_search($card1->getValue(), $valueOrder);
                $bValueIndex = array_search($card2->getValue(), $valueOrder);
                return ($aValueIndex < $bValueIndex) ? -1 : 1;
            }
        });
    }
}