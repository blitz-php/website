<?php

use BlitzPHP\Http\Middleware;

/**
 * ------------------------------------------------- -------------------------
 * Configuration du gestionnaire de middleware 
 * ------------------------------------------------- -------------------------
 */

return [
    /**
     * Configure les alias pour les classes Middleware afin de rendre la lecture plus agréable et plus simple.
     * 
     * @var array<string, string>
     */
    'aliases' => [

    ],

    /**
     * Liste des alias de middlewares toujours appliqués à chaque requête.
     * 
     * @var array<string|Closure|class-string>
     */
    'globals' => [
 
    ],

    /**
     * Configuration personnalisée du gestionnaire de middleware
     * 
     * @var Closure
     */
    'build' => function (Middleware $middleware) {
        
        // $middleware->insertBefore('app', 'body-parser');
    },
];
