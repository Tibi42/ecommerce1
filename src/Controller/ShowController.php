<?php

namespace App\Controller;

use App\Repository\VeloRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ShowController extends AbstractController
{
    #[Route('/velo/{id}', name: 'app_velo_show')]  // ← {id} est un paramètre d'URL
    public function show(VeloRepository $veloRepository): Response
    {
        $velo = $veloRepository->find('id');  // ← Recherche par ID

        if (!$velo) {
            throw $this->createNotFoundException('Vélo non trouvé');  // ← Erreur 404
        }

        return $this->render('show/show.html.twig', [
            'velo' => $velo,
        ]);
    }
}
