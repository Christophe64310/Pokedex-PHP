<?php

// class HomeController
// {
//     public function home()
//     {
//         //die(__FILE__ . " : " . __LINE__);
//         // TODO : afficher notre template
//         // 1. le nom du template
//         $viewName = '/';
//         // 2. les informations spécifiques
//         $viewData = []; // pour l'instant on a rien
//         // 3. on require les templates grace à la méthode show
//         $this->show($viewName, $viewData);
//     }
//     public function show($templateName, $templateData = [])
//     {
//         require __DIR__ . '/../views/header.tpl.php';
//         require __DIR__ . '/../views/' . $templateName . '.tpl.php';
//         require __DIR__ . '/../views/footer.tpl.php';
//     }
// }