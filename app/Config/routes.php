<?php
/*
| -------------------------------------------------- -----------------
| PARAMÈTRES D'ITINÉRAIRE DE L'APPLICATION
| -------------------------------------------------- -----------------
| Ce fichier contiendra les paramètres de routage de votre application.
|
| Pour des instructions complètes, veuillez consulter la « Configuration de l'itinéraire » dans le guide de l'utilisateur.
*/

/** @var BlitzPHP\Router\RouteCollection $routes */

use App\Controllers\DocsController;
use App\Controllers\PageController;
use BlitzPHP\Facades\Route;

Route::addPlaceholder([
    'version' => 'dev|\d+\.(?:\d+|x)',
    'page'    => '[a-z0-9-]+',
]);

/**
 * --------------------------------------------------------------------
 * Définition des routes
 * --------------------------------------------------------------------
 */
Route::name('home')->get('/', [PageController::class, 'home']);
Route::name('goto')->get('/goto/(:any)', [PageController::class, 'goto']);
Route::get('docs', fn() => redirect()->to('docs/' . DEFAULT_VERSION));
// Route::get('docs/(:version)/index.json', [DocsController::class, 'index']);
Route::get('docs/(:version)', fn($version) => redirect()->to('docs/' . $version . '/installation'));
Route::name('docs.version')->get('docs/(:version)/(:page)', [DocsController::class, 'show']);
