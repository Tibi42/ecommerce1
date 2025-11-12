<?php

namespace App\DataFixtures;
use App\Entity\Velo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $velos = [
            [
                'categorie' => 'VTT',
                'taille' => 'XL',
                'genre' => 'Homme',
                'marque' => 'Trek',
                'modele' => 'X-Caliber 8',
                'prix' => '899.99',
                'stock' => 5,
                'couleur' => 'Noir et rouge',
                'description' => 'Excellent VTT pour débuter en montagne avec un cadre robuste et des composants de qualité',
                'imageUrl' => 'https://www.velovert.com/photos/news/zooms/5e8f0a55770ce1d3fec1767105082485153423441641.jpg',
                'estEnPromotion' => false,
                'prixPromotion' => null
            ],
            [
                'categorie' => 'Vélo de route',
                'taille' => 'M',
                'genre' => 'Femme',
                'marque' => 'Giant',
                'modele' => 'Contend 3',
                'prix' => '649.99',
                'stock' => 8,
                'couleur' => 'Blanc et bleu',
                'description' => 'Vélo de route léger et performant, idéal pour les sorties longues distance',
                'imageUrl' => 'https://www.bike-mailorder.com/cdn/shop/files/Contend3-Rim-ironIron-2.jpg?v=1736959230&width=1214',
                'estEnPromotion' => true,
                'prixPromotion' => '549.99'
            ],
            [
                'categorie' => 'VTC',
                'taille' => 'L',
                'genre' => 'Mixte',
                'marque' => 'Decathlon',
                'modele' => 'Riverside 500',
                'prix' => '399.99',
                'stock' => 12,
                'couleur' => 'Vert',
                'description' => 'Vélo tout chemin polyvalent pour la ville et les balades',
                'imageUrl' => 'https://cdn.shopify.com/s/files/1/0298/8490/7656/products/velo-tout-chemin-reconditionne-riverside-500-bordeaux-velo-decathlon-seconde-vie-paris-421968.jpg?v=1614084884',
                'estEnPromotion' => false,
                'prixPromotion' => null
            ],
            [
                'categorie' => 'Vélo électrique',
                'taille' => 'M',
                'genre' => 'Homme',
                'marque' => 'Specialized',
                'modele' => 'Turbo Vado',
                'prix' => '2499.99',
                'stock' => 3,
                'couleur' => 'Gris métallique',
                'description' => 'Vélo électrique haut de gamme avec autonomie de 100km',
                'imageUrl' => 'https://www.jrpbike.fr/873-large_default/specialized-turbo-vado-40-nb.jpg',
                'estEnPromotion' => true,
                'prixPromotion' => '2199.99'
            ],
            [
                'categorie' => 'BMX',
                'taille' => 'S',
                'genre' => 'Enfant',
                'marque' => 'Mongoose',
                'modele' => 'Legion L20',
                'prix' => '299.99',
                'stock' => 6,
                'couleur' => 'Orange',
                'description' => 'BMX robuste pour les jeunes riders en herbe',
                'imageUrl' => 'https://www.mongoose.com/cdn/shop/files/M41501U20_20U_LegionL40-PRP_PDP_ATF01_a440d4aa-cb81-4d87-9924-622449507dd2.png?v=1728860314&width=600',
                'estEnPromotion' => false,
                'prixPromotion' => null
            ]
        ];

        foreach ($velos as $veloData) {
            $velo = new Velo();
            $velo->setcategorie($veloData['categorie']);
            $velo->setTaille($veloData['taille']);
            $velo->setGenre($veloData['genre']);
            $velo->setMarque($veloData['marque']);
            $velo->setModele($veloData['modele']);
            $velo->setPrix($veloData['prix']);
            $velo->setStock($veloData['stock']);
            $velo->setCouleur($veloData['couleur']);
            $velo->setDescription($veloData['description']);
            $velo->setImageUrl($veloData['imageUrl']);
            $velo->setEstEnPromotion($veloData['estEnPromotion']);
            $velo->setPrixPromotion($veloData['prixPromotion']);
            $velo->setDateAjout(new \DateTime());

            $manager->persist($velo);
        }

        $manager->flush();
    }
}
