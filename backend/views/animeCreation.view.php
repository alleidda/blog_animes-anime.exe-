<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>back/animes/creationValidation" enctype="multipart/form-data">
    <div class="form-group">
        <label for="anime_nom">Nom de l'anime</label>
        <input type="text" class="form-control" id="anime_nom" name="anime_nom">
    </div>
    <div class="form-group">
    <label for="anime_description">Description</label>
    <textarea class="form-control" name="anime_description" id="anime_description" >

    </textarea>
    </div>
    <br>
    <div class="form-group">
        <label for="image">Image :</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <br>
    <div class="form-group">
        <label for="genre">Sélectionner un genre :</label>
    <select class="form-control" name="genre_id">
        <option></option>
        <?php foreach($genres as $genre) :?>
            <option value="<?= $genre["genre_id"]?>"><?= $genre["genre_id"]?> - <?= $genre["genre_nom"]?></option>
        <?php endforeach?>
    </select>
    </div>
    <br>
    <div class="form-group">
        <label for="studio">Selectioner un studio d'animation :</label>
    
        <div class='row no-gutters'>
        <div class="col-1"></div>
        <?php foreach($studios as $studio) : ?>
            <div class="form-group form-check col-2">
                <input type="checkbox" class="form-check-input" name="studio-<?= $studio['studio_id'] ?>">
                <label class="form-check-label" for="exampleCheck1"><?= $studio['studio_nom'] ?></label>
            </div>
        <?php endforeach; ?>
        <div class="col-1"></div>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php 
$content = ob_get_clean();
$titre = "Page de création d'un anime";
require "views/commons/template.php";