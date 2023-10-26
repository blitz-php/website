<?php

namespace App\Controllers;

use BlitzPHP\Controllers\BaseController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;

/**
 * AppController fournit un emplacement pratique pour charger des composants et exécuter des fonctions nécessaires à tous vos contrôleurs.
 * Étendez cette classe dans tous les nouveaux contrôleurs :
 *     class HomeController extends AppController
 *
 * Pour des raisons de sécurité, assurez-vous de déclarer toutes les nouvelles méthodes comme protégées ou privées.
 */
abstract class AppController extends BaseController
{
    /**
     * Un tableau d'helpers à charger automatiquement lors de l'instanciation de la classe.
     * Ces helpers seront disponibles pour tous les autres contrôleurs qui étendent BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructeur.
     */
    public function initialize(ServerRequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Ne pas modifier cette ligne
        parent::initialize($request, $response, $logger);

        // Préchargez tous les modèles, bibliothèques, etc., ici.

        // E.g.: $this->user = auth()->user();
    }
}
