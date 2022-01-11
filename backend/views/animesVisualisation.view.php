<?php ob_start(); ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Anime</th>
            <th scope="col">Description</th>
            <th scope="col" colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($animes as $anime) : ?>
                <tr>
                    <td><?= $anime['anime_id'] ?></td>
                    <td class="align-middle">
                    <img src="<?= URL ?>public/images/<?= $anime['anime_photo'] ?>" style="width:50px" />
                </td>
                    <td><?= $anime['anime_nom'] ?></td>
                    <td><?= $anime['anime_description'] ?></td>
                    <td class="align-middle">
                    <a href="<?= URL ?>back/animes/modification/<?= $anime['anime_id'] ?>" class="btn btn-warning">Modifier </a>
                </td>
                   
                    <td>
                        <form action="<?= URL ?>back/animes/validationSuppression" onSubmit="return confirm('Voulez-vous vraiment supprimer ?');" method="post">
                            <input type="hidden" name="anime_id" value="<?= $anime['anime_id'] ?>">
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            
        <?php endforeach; ?>
    </tbody>
</table>
<?php
$content = ob_get_clean();
$titre = "Les animes";
require "views/commons/template.php";
