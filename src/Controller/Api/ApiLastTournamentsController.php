<?php

namespace App\Controller\Api;

use App\Presentation\LastTournamentsDataProvider;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiLastTournamentsController
{
    /**
     * @var LastTournamentsDataProvider
     */
    private $dataProvider;

    public function __construct(LastTournamentsDataProvider $dataProvider)
    {
        $this->dataProvider = $dataProvider;
    }

    public function index($limit)
    {
        if ($limit > 20) {
            $limit = 20;
        }

        return new JsonResponse($this->dataProvider->provide($limit));
    }
}
