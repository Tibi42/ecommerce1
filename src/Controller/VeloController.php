<?php

namespace App\Controller;

use App\Repository\VeloRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class VeloController extends AbstractController
{
    /**
     * Page d'accueil avec tous les vélos
     */
    #[Route('/', name: 'app_velo')]  // ← Route : URL '/velo' → nom 'app_velo'
    public function index(VeloRepository $veloRepository): Response  // ← Injection de dépendance
    {
        // Récupération des données via le repository
        $velos = $veloRepository->findAllVelo();

        // Rendu du template avec transmission des données
        return $this->render('pages/velo/index.html.twig', [
            'controller_name' => 'VeloController',
            'velos' => $velos  // ← Variable accessible dans Twig
        ]);
    }

    /**
     * Page "Mon vélo" - affiche le premier vélo
     */
    #[Route('/mybike', name: 'app_mybike')]
    public function showMyBike(VeloRepository $veloRepository): Response
    {
        $myBike = $veloRepository->findOneBy([], ['id' => 'ASC']);

        return $this->render('velo/mybike.html.twig', [
            'myBike' => $myBike,
        ]);
    }

    /**
     * Page détail d'un vélo
     */
    #[Route('/velo/{id}', name: 'app_velo_show')]  // ← {id} est un paramètre d'URL
    public function show(int $id, VeloRepository $veloRepository): Response
    {
        $velo = $veloRepository->find($id);  // ← Recherche par ID

        if (!$velo) {
            throw $this->createNotFoundException('Vélo non trouvé');  // ← Erreur 404
        }

        return $this->render('pages/velo/show.html.twig', [
            'velo' => $velo,
        ]);
    }
}
