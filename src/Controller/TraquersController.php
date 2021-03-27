<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TraquersController extends AbstractController
{
    /**
     * @Route("/traquers", name="traquers")
     */
    public function index(): Response
    {
        return $this->render('traquers/index.html.twig',[
            'controller_name' => 'TraquersController',
        ]);
    }
}
