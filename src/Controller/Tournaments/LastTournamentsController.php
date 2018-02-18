<?php

namespace App\Controller\Tournaments;

use App\Application\Tournaments\LastTournamentsQuery;
use App\Application\Tournaments\TournamentsQuery;
use App\Presentation\LastTournamentsDataProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LastTournamentsController extends AbstractController
{
    /**
     * @var LastTournamentsDataProvider
     */
    private $dataProvider;

    public function __construct(LastTournamentsDataProvider $dataProvider)
    {
        $this->dataProvider = $dataProvider;
    }

    public function index() {
        $vars = $this->dataProvider->provide(20);

        return $this->render('last.html.twig', $vars);
    }
}
