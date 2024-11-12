<?php
require_once 'libs/router/Router.php';
require_once 'api/public-api.controller.php';

//Creo el ruteador
$router = new Router();

// creo la tabla de ruteo

//AUTORES
$router->addRoute('autores', 'GET', 'PublicApiController', 'getAllAuthors');

//LIBROS
$router->addRoute('libros', 'GET', 'PublicApiController', 'getAllBooks');

$router ->addRoute ('librosByAtr', 'GET', 'PublicApiController', 'getAllByAtributo'); //trae los libros por el 'tipo' de libro


//paginar
$router -> addRoute('librosPaginado', 'GET', 'PublicApiController', 'getAllPaginado');

//ACTUALIZAR LIBROS - AUTORES
$router->addRoute('libros/:ID', 'PUT', 'PublicApiController', 'updateBook');
$router->addRoute('autores/:ID', 'PUT', 'PublicApiController', 'updateAuthor');




//rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);