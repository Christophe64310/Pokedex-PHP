<main>
    <div class="pokemon">
        <ul class="container">
            <?php foreach($viewData["pokemons"] as $key => $pokemon): ?>
                <li>
                    <a href="#">
                        <img src="<?= $absoluteURL ?>/img/<?= $pokemon->getNumber() ?>.png" alt="photo1">
                        <span class="pokemon-name">#<?= $pokemon->getNumber() ?> <?= $pokemon->getName() ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</main>
