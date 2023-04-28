<?php
// src/Model/Deck.php

namespace App\Model;

class Deck
{
    private array $cards;
    private $colors = ['Carreau', 'Cœur', 'Pique', 'Trèfle'];
    private $values = ['AS', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'Dame', 'Roi', 'Valet'];

    public function __construct()
    {
        shuffle($this->colors);
        shuffle($this->values);

        foreach ($this->colors as $color) {
            foreach ($this->values as $value) {
                $this->cards[] = new Card($color, $value);
            }
        }
        $this->shuffle();
    }

    public function shuffle(): void
    {
        $n = count($this->cards);
        for ($i = $n - 1; $i > 0; $i--) {
            $j = mt_rand(0, $i);
            $tmp = $this->cards[$i];
            $this->cards[$i] = $this->cards[$j];
            $this->cards[$j] = $tmp;
        }
    }

    public function draw(int $numCards): Hand
    {
        if ($numCards > count($this->cards)) {
            throw new \Exception('Not enough cards in the deck');
        }
        $cards = array_splice($this->cards, 0, $numCards);
        return new Hand($cards);
    }

    public function getValues()
    {
        return $this->values;
    }

    public function getColors()
    {
        return $this->colors;
    }
}
