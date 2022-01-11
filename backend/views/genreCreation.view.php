<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>back/genres/creationValidation">
    <div class="form-group">
        <label for="genre_nom">Libelle</label>
        <input type="text" class="form-control" id="genre_nom" name="genre_nom">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php 
$content = ob_get_clean();
$titre = "Page de création d'un genre";
require "views/commons/template.php";