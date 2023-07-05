<main>
    <div class="type">
        <ul class="container_type">
            <?php foreach($viewData["types"] as $key => $type): ?>
                <li style="background-color: #<?= $type->getcolor() ?>;">
                    <a href="#"><?= $type->getName() ?></a>
                        
                        
                    
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</main>