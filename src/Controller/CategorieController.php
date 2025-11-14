<?php

namespace App\Controller;

use App\Repository\VeloRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategorieController extends AbstractController
{
    /**
     * Page de liste des catégories
     */
    #[Route('/categorie', name: 'app_categorie')]
    public function index(VeloRepository $veloRepository): Response
    {
        $categories = $veloRepository->findAllCategories();

        return $this->render('pages/categorie/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[Route('/velo/categorie/{categorie}', name: 'app_velo_by_categorie')]
    public function byType(string $categorie, VeloRepository $veloRepository): Response
    {
        $velos = $veloRepository->findByType($categorie);

        return $this->render('pages/velo/by_type.html.twig', [
            'velos' => $velos,
            'categorie' => $categorie
        ]);
    }
}
