<?php

    // require autoload
    require __DIR__ . '/../vendor/autoload.php';

    //  require de la base de donnée

    require __DIR__ . '/../app/utils/Database.php';
    

    // require controllers
    require __DIR__ . '/../app/Controllers/HomeController.php';
    require __DIR__ . '/../app/Controllers/MainController.php';

    // require des models

    require __DIR__ . '/../app/Models/CoreModel.php';
    require __DIR__ . '/../app/Models/Pokemon.php';
    require __DIR__ . '/../app/Models/Type.php';

    $router = new AltoRouter();
        
    $router->setBasePath($_SERVER['BASE_URI']);

    

    // Page d'accueil qui affichera les pokémons

    $router->map(
        'GET',
        '/',
        [
        'controller' => 'MainController',
        'method' => 'homepage'
        ],
        'page_home'
    );
    
    // Page type qui affichera les différents types de pokemon

    $router->map(
        'GET',
        '/types',
        [
        'controller' => 'MainController',
        'method' => 'typespage'
        ],
        'page_types'
    );
    
    $match = $router->match();
   

     // On vérifie si la route a été trouvée par Altorouter
     if($match !== false) {
        // Si elle existe, elle contient les infos dont on a besoin, on les stocke dans une variable
        $routeInfos = $match['target'];
        
          // Grâce à cette variable, on extrait le contrôleur à utiliser
          $controller = $routeInfos['controller'];
          // Puis la méthode à appeler sur ce contrôleur
          $method = $routeInfos['method'];

          // On vérifie s'il existe des paramètres transmis dans l'url (comme un id de personnage par exemple ?)
        $urlParams = $match['params'];

         // Puis on utilise la variable qui contient le nom du contrôleur qu'on a récupéré pour instancier la classe du contrôleur en question
         $controller = new $controller; 

         // L'objet $controller peut à présent appeler la méthode avec les paramètres éventuels
         $controller->$method();

        } else {
            var_dump('erreur 404');
            // Dans le cas où la route ne serait pas trouvée, on va utiliser 
            // $controller = new MainController(); 
            // $controller->pageNotFound();
        }
