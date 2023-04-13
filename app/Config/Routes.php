<?php

namespace Config;

use App\Controllers\Usuario;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
//$routes->setDefaultController('Home');
//$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
//$routes->get('/pelicula', 'Pelicula::index');
//$routes->get('pelicula/new', 'Pelicula::create');
//$routes->get('pelicula/edit/(:num)', 'Pelicula::edit/$1'); //parametros


$routes->group("dashboard",function($routes){ //agrupa todas las rutas bajo /dashboard
    $routes->get("pelicula/etiquetas/(:num)","Pelicula::etiquetas/$1");
    $routes->post("pelicula/etiquetas/(:num)","Pelicula::etiquetas_post/$1");
    $routes->post("pelicula/borrarimagen/(:num)","Pelicula::borrarimagen/$1");
    $routes->post("pelicula/descargarimagen/(:num)","Pelicula::descargarimagen/$1");
    $routes->presenter("pelicula"); //genera ya todas las vistas para hacer un CRUD
    $routes->presenter("categoria");
    $routes->get("usuarios","Usuario::crear_usuario");
});
$routes->get("/login","Usuario::login"); //las rutas get son todas las de enlaces o de visuales
$routes->post("/login_usuario","Usuario::login_post"); //son todas aquellas en las se hacer algo con un dato pero sin aspecto visual, son solo back end
$routes->get("registro","Usuario::crearUsuarios");
$routes->post("/register_usuario","Usuario::crear_post");
$routes->get("/logout","Usuario::logout");
$routes->group("api",["namespace"=>"App\Controllers\API"],function($routes){
    $routes->resource("pelicula"); //tipo crud tambien
    $routes->resource("categorias");
});


//$routes->presenter("pelicula"); //genera ya todas las vistas para hacer un CRUD
//$routes->presenter("categoria");

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
