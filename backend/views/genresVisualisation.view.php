<?php ob_start(); ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Genres</th>
            <th scope="col" colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($genres as $genre) : ?>
            <?php if (empty($_POST['genre_id']) || $_POST['genre_id'] !== $genre['genre_id']) : ?>
                <tr>
                    <td><?= $genre['genre_id'] ?></td>
                    <td><?= $genre['genre_nom'] ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="genre_id" value="<?= $genre['genre_id'] ?>">
                            <button class="btn btn-warning" type="submit">Modifier</button>
                        </form>
                    </td>
                    <td>
                        <form action="<?= URL ?>back/genres/validationSuppression" onSubmit="return confirm('Voulez-vous vraiment supprimer ?');" method="post">
                            <input type="hidden" name="genre_id" value="<?= $genre['genre_id'] ?>">
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php else : ?>
                <form method="post" action="<?= URL ?>back/genres/validationModification">
                    <tr>
                        <td><?= $genre['genre_id'] ?></td>
                        <td><input type="text" name="genre_nom" class="form-control" value="<?= $genre['genre_nom'] ?>" /></td>
                        <input type="hidden" name="genre_id" value="<?= $genre['genre_id'] ?>" />
                        <td><button class="btn btn-primary" type="submit">Valider</button>
                        </td>
                    </tr>
                </form>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
$content = ob_get_clean();
$titre = "Les genres";
require "views/commons/template.php";
