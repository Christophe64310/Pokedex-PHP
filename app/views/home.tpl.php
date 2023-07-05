<main>
    <div class="pokemon">
        <ul class="container">
            <?php foreach($viewData["pokemons"] as $key => $pokemon): ?>
                <li>
                    <a href="#">
                        <img src="<?= $absoluteURL ?>/img/<?= $pokemon->getnumber() ?>.png" alt="photo1">
                        <span class="pokemon-name">#<?= $pokemon->getnumber() ?> <?= $pokemon->getname() ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</main>
