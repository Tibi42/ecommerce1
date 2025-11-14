<?php

namespace App\Controller;

use App\Repository\VeloRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MybikeController extends AbstractController
{
    #[Route('/mybike', name: 'app_mybike')]
    public function index(VeloRepository $veloRepository): Response
    {
        $myBike = $veloRepository->findOneBy([], ['id' => 'ASC']);

        return $this->render('pages/mybike/index.html.twig', [
            'myBike' => $myBike,
        ]);
    }
}
