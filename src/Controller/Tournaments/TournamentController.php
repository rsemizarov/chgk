<?php

namespace App\Controller\Tournaments;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class TournamentController extends AbstractController
{
    public function index($id)
    {
        return new Response((string) $id);
    }
}
