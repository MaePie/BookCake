<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    
    $routes->redirect('/',['controller' => 'Restaurant', 'action' => 'index']);
    $routes->post('/quickContact', ['controller' => 'Mail', 'action' => 'quickContact']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});

Router::prefix('admin', function ($routes) {
    // All routes here will be prefixed with `/admin`
    // And have the prefix => admin route element added.
    $routes->connect('/', ['controller' => 'admin', 'action' => 'login']);
    $routes->connect('/rtables', ['controller' => 'rtables', 'action' => 'list']);
    $routes->connect('/users', ['controller' => 'users', 'action' => 'list']);
    $routes->connect('/rzones', ['controller' => 'rzones', 'action' => 'list']);
    $routes->connect('/rres', ['controller' => 'rres', 'action' => 'list']);

    // Ajax
    $routes->post('/reservationForm', ['controller' => 'RRes', 'action' => 'reservationForm']);


    $routes->fallbacks(DashedRoute::class);
});

Router::prefix('restaurant', function ($routes) {
    $routes->connect('/', ['controller' => 'Restaurant', 'action' => 'index']);
    $routes->connect('/test', ['controller' => 'Restaurant', 'action' => 'test']);
    $routes->connect('/carte', ['controller' => 'Restaurant', 'action' => 'carte']);
    $routes->connect('/galerie', ['controller' => 'Restaurant', 'action' => 'galerie']);
    $routes->connect('/contact', ['controller' => 'Restaurant', 'action' => 'contact']);
});


/**
 * Load all plugin routes. See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
