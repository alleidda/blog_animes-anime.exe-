<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>back/studios/creationValidation">
    <div class="form-group">
        <label for="studio_nom">Libelle</label>
        <input type="text" class="form-control" id="studio_nom" name="studio_nom">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php 
$content = ob_get_clean();
$titre = "Page de création d'un studio";
require "views/commons/template.php";