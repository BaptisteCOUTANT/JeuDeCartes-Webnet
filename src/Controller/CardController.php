<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Model\Deck;
use App\Model\Hand;
use App\Model\Card;
use App\View\ConsoleView;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'app_')]
class CardController extends AbstractController
{

    #[Route('game/{nbCards}', name: 'card')]
    public function game(Request $request, $nbCards)
    {
        $deck = new Deck();
        $hand = new Hand([]);
        // Récupérer le nombre de cartes à piocher depuis la requête ou depuis le paramètre de route
        $nbCards = $request->query->get('nbCards') ?? $nbCards;

        // Piocher le nombre de cartes demandé
        try {
            $hand = $deck->draw($nbCards);
        } catch (\Exception $e) {
            // Gérer l'erreur en cas de nombre de cartes demandé supérieur au nombre de cartes dans le deck
            return new Response($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        // Trier la main
        $hand->sort($deck->getValues(), $deck->getColors());

        // Afficher la main dans la console
        $view = new ConsoleView();
        $view->display($hand, $deck);

        return new Response();
    }

    #[Route('/', name: 'choice')]
    public function choice(Request $request):Response
    {
        $formData = $request->request->all();
        if ($formData) {
            $nbCards = $formData['num_cards'];
            return $this->redirectToRoute('app_card', ['nbCards' => $nbCards]);
        }
        return $this->render('jeu/index.html.twig');
    }

}

