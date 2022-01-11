<?php ob_start(); ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">studios</th>
            <th scope="col" colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($studios as $studio) : ?>
            <?php if (empty($_POST['studio_id']) || $_POST['studio_id'] !== $studio['studio_id']) : ?>
                <tr>
                    <td><?= $studio['studio_id'] ?></td>
                    <td><?= $studio['studio_nom'] ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="studio_id" value="<?= $studio['studio_id'] ?>">
                            <button class="btn btn-warning" type="submit">Modifier</button>
                        </form>
                    </td>
                    <td>
                        <form action="<?= URL ?>back/studios/validationSuppression" onSubmit="return confirm('Voulez-vous vraiment supprimer ?');" method="post">
                            <input type="hidden" name="studio_id" value="<?= $studio['studio_id'] ?>">
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php else : ?>
                <form method="post" action="<?= URL ?>back/studios/validationModification">
                    <tr>
                        <td><?= $studio['studio_id'] ?></td>
                        <td><input type="text" name="studio_nom" class="form-control" value="<?= $studio['studio_nom'] ?>" /></td>
                        <input type="hidden" name="studio_id" value="<?= $studio['studio_id'] ?>" />
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
$titre = "Les studios";
require "views/commons/template.php";
