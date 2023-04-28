<?php
// src/View/ConsoleView.php

namespace App\View;

use App\Model\Card;
use App\Model\Hand;
use App\Model\Deck;

class ConsoleView
{
    public function __construct()
    {
    }

    public function display(Hand $hand, Deck $deck)
    {
        $valueOrder = $deck->getValues();
        $colorOrder = $deck->getColors();

        $cards = $hand->getCards();
        echo 'Ordre des couleurs généré : ';
        foreach ($colorOrder as $ordrecouleur) {
            echo $ordrecouleur. "\n";
        }
        echo '<br />';

        echo 'Ordre des valeurs généré : ';
        foreach ($valueOrder as $ordrevaleur) {
            echo $ordrevaleur. "\n";
        }

        echo '<br />';

        echo 'Nombre de cartes demandé : '.count($cards) . " \n";

        echo "<br />";

        // Affichage de la main "non triée" dans la console
        echo "Main non triée :\n";
        foreach ($cards as $card) {
            echo $card->getColor() . ' ' . $card->getValue() . "\n";
        }

        echo "<br />";

        // Tri de la main selon l'ordre aléatoire des couleurs et des valeurs
        usort($cards, function (Card $a, Card $b) use ($valueOrder, $colorOrder) {

            $aColorIndex = array_search($a->getColor(), $colorOrder);
            $bColorIndex = array_search($b->getColor(), $colorOrder);

            if ($aColorIndex !== $bColorIndex) {
                return ($aColorIndex < $bColorIndex) ? -1 : 1;
            } else {
                $aValueIndex = array_search($a->getValue(), $valueOrder);
                $bValueIndex = array_search($b->getValue(), $valueOrder);
                return ($aValueIndex < $bValueIndex) ? -1 : 1;
            }
        });

        // Affichage de la main triée dans la console
        echo "\nMain triée :\n";
        foreach ($cards as $card) {
            echo $card->getColor() . ' ' . $card->getValue() . "\n";
        }

        echo "<br />";
        echo "<br />";
        echo "<a role='button' type='button' href='/game/".count($cards)."'>Re-piocher</button>";

        echo "<br />";
        echo "<br />";
        echo "<a role='button' type='button' href='/'>Revenir au menu</button>";
    }
}
