# SamKhaser - Application de Gestion de Vélos

## Description
SamKhaser est une application web de démonstration développée avec Symfony pour la gestion et l'affichage d'un catalogue de vélos. Ce projet sert d'exemple pédagogique pour apprendre les concepts fondamentaux de Symfony.

## Fonctionnalités
- 📋 Affichage du catalogue complet des vélos
- 🔍 Page de détail pour chaque vélo
- 🚴 Page "Mon vélo" personnalisée
- 🏷️ Gestion des promotions
- 💾 Données de test via les fixtures Doctrine

## Technologies utilisées
- **Framework** : Symfony 7.3
- **Base de données** : PostgreSQL (configurable)
- **ORM** : Doctrine
- **Templates** : Twig
- **CSS** : Bootstrap 5.3
- **PHP** : 8.2+

## Installation

### Prérequis
- PHP 8.2 ou supérieur
- Composer
- PostgreSQL ou MySQL
- Symfony CLI (recommandé)

### Étapes d'installation

1. **Cloner le repository**
   ```bash
   git clone https://github.com/Ikonik-Dev/samkhaser.git
   cd samkhaser
   ```

2. **Installer les dépendances**
   ```bash
   composer install
   ```

3. **Configurer la base de données**
   
   Copiez le fichier `.env` et adaptez la configuration :
   ```bash
   cp .env .env.local
   ```
   
   Modifiez `DATABASE_URL` dans `.env.local` :
   ```env
   # Pour PostgreSQL
   DATABASE_URL="postgresql://username:password@127.0.0.1:5432/samkhaser?serverVersion=16&charset=utf8"
   
   # Pour MySQL
   DATABASE_URL="mysql://username:password@127.0.0.1:3306/samkhaser?serverVersion=8.0.32&charset=utf8mb4"
   ```

4. **Créer la base de données**
   ```bash
   php bin/console doctrine:database:create
   ```

5. **Exécuter les migrations**
   ```bash
   php bin/console doctrine:migrations:migrate
   ```

6. **Charger les données de test**
   ```bash
   php bin/console doctrine:fixtures:load
   ```

7. **Démarrer le serveur de développement**
   ```bash
   symfony server:start
   # ou
   php -S localhost:8000 -t public/
   ```

8. **Accéder à l'application**
   
   Ouvrez votre navigateur sur `http://localhost:8000`

## Structure du projet

```
samkhaser/
├── src/
│   ├── Controller/          # Contrôleurs (logique métier)
│   │   └── VeloController.php
│   ├── Entity/              # Entités Doctrine (modèles)
│   │   └── Velo.php
│   ├── Repository/          # Classes d'accès aux données
│   │   └── VeloRepository.php
│   └── DataFixtures/        # Données de test
│       └── AppFixtures.php
├── templates/               # Templates Twig
│   ├── base.html.twig
│   ├── layouts/             # Layouts réutilisables
│   ├── components/          # Composants Twig
│   └── velo/                # Templates spécifiques aux vélos
├── config/                  # Configuration Symfony
├── migrations/              # Migrations de base de données
└── public/                  # Point d'entrée web
```

## URLs disponibles

- `/velo` - Catalogue complet des vélos
- `/mybike` - Mon vélo (premier vélo de la base)
- `/velo/{id}` - Détail d'un vélo spécifique

## Entité Vélo

L'entité `Velo` contient les propriétés suivantes :

```php
- id (int) - Identifiant unique
- type (string) - Type de vélo (VTT, Route, VTC, etc.)
- taille (string) - Taille du vélo (S, M, L, XL)
- genre (string) - Genre (Homme, Femme, Mixte)
- marque (string) - Marque du vélo
- modele (string) - Modèle du vélo
- prix (decimal) - Prix normal
- stock (int) - Quantité en stock
- couleur (string, nullable) - Couleur du vélo
- description (text, nullable) - Description détaillée
- imageUrl (string, nullable) - URL de l'image
- estEnPromotion (boolean) - Si le vélo est en promotion
- prixPromotion (decimal, nullable) - Prix promotionnel
- dateAjout (datetime) - Date d'ajout en base
```

## Commandes utiles

### Doctrine
```bash
# Créer une nouvelle entité
php bin/console make:entity

# Générer une migration
php bin/console make:migration

# Exécuter les migrations
php bin/console doctrine:migrations:migrate

# Recharger les fixtures
php bin/console doctrine:fixtures:load
```

### Développement
```bash
# Créer un contrôleur
php bin/console make:controller

# Lister les routes
php bin/console debug:router

# Vider le cache
php bin/console cache:clear
```

## Développement

### Ajouter un nouveau vélo via les fixtures

Modifiez le fichier `src/DataFixtures/AppFixtures.php` et ajoutez vos données dans le tableau `$velos`.

### Créer une nouvelle route

Ajoutez une méthode dans `VeloController` avec l'attribut `#[Route]` :

```php
#[Route('/ma-nouvelle-route', name: 'app_ma_route')]
public function maNouvellePage(): Response
{
    return $this->render('velo/ma_page.html.twig');
}
```

### Ajouter une méthode au repository

Dans `VeloRepository`, vous pouvez ajouter des méthodes personnalisées :

```php
public function findByType(string $type): array
{
    return $this->findBy(['type' => $type]);
}
```

## Contribution

Ce projet est à des fins éducatives. Les contributions sont les bienvenues pour améliorer la documentation et ajouter des fonctionnalités pédagogiques.

## Auteur

Développé pour la formation Symfony - Exemple pédagogique

## Licence

Ce projet est libre d'utilisation pour des fins éducatives.