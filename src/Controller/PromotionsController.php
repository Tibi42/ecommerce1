<?php

namespace App\Controller;

use App\Repository\VeloRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PromotionsController extends AbstractController
{
    #[Route('/promotions', name: 'app_promotions')]
    public function promotions(VeloRepository $veloRepository): Response
    {
        $velos = $veloRepository->findVelosEnPromotion();

        return $this->render('promotions/index.html.twig', [
            'velos' => $velos
        ]);
    }
}
