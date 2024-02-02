<?php

namespace Pokedex\Controllers;

use Pokedex\Models\Pokemon;
use Pokedex\Models\Type;

class MainController
{
    // Displaying the list (home page)
    public function list()
    {
        $pokemonObject = new Pokemon();
        $pokemons = $pokemonObject->findAll();
        $this->show('list', [
            'title' => 'Liste',
            'pokemons' => $pokemons
        ]);
    }

    // Displaying the details
    public function detail($params)
    {
        $pokemonObject = new Pokemon();
        $pokemon = $pokemonObject->find($params['numero']);
        $types = $pokemon->getTypes();
        $this->show('detail', [
            'title' => 'détail',
            'pokemon' => $pokemon,
            'types' => $types
        ]);
    }

    // Displaying the types
    public function types()
    {
        $typeObject = new Type();
        $types =  $typeObject->findAll();
        $this->show('types', [
            'title' => 'Liste des types',
            'types' => $types
        ]);
    }

    // Displaying the list filtered by type
    public function type($params)
    {
        $pokemonObject = new Pokemon();
        $pokemons = $pokemonObject->findByType($params['type']);
        $this->show('list', [
            'title' => 'Filtre par type',
            'pokemons' => $pokemons
        ]);
    }

    public function notFound()
    {
        header('HTTP/1.1 404 Not Found');
        $this->show('error404', [
            'title' => 'Non-existent Page - 404'
        ]);
    }

    public function show($viewName, $viewVars = [])
    {
        // Including the header and footer templates
        // as well as the one passed as a parameter ($viewName)
        include(__DIR__ . '/../views/header.tpl.php');
        include(__DIR__ . '/../views/' . $viewName . '.tpl.php');
        include(__DIR__ . '/../views/footer.tpl.php');
    }
}
