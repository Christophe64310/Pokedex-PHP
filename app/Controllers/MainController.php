<?php

    class MainController {

        public function homepage(){
            // var_dump("affichage de la page d'accueil");  
            $pokemonModel = new Pokemon();
            $pokemonsFromModel = $pokemonModel->findAll();
            $this->show('home' ,["pokemons" =>$pokemonsFromModel]);   
                   
        }

        public function typespage(){
            // var_dump("affichage de la page créateurs");
            $this->show('types');  
        }

        public function pageNotFound() {
            $this->show('error404');
        }
        private function show($viewPage, $viewData =[]){

            $absoluteURL = $_SERVER['BASE_URI']; 
            
            require __DIR__ . "/../views/header.tpl.php";
            require __DIR__ . "/../views/$viewPage.tpl.php";
            require __DIR__ . "/../views/footer.tpl.php";
        }

    };