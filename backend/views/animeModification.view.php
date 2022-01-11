<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>back/animes/modificationValidation" enctype="multipart/form-data">
    <input type="hidden" name="anime_id" value="<?= $anime['anime_id']; ?>" />
    <div class="form-group">
        <label for="anime_nom">Nom de l'anime :</label>
        <input type="text" class="form-control" id="anime_nom" name="anime_nom" value="<?= $anime['anime_nom'] ?>">
    </div>
    <div class="form-group">
        <label for="anime_description">Description</label>
        <textarea class="form-control" id="anime_description" name="anime_description" rows="3"><?= $anime['anime_description'] ?></textarea>
    </div>
    <div class="form-group">
        <img src="<?= URL ?>public/images/<?= $anime['anime_photo'] ?>" style="width:50px;" />
        <label for="image">Image :</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <div class="form-group">
        <label for="genre">genres :</label>
        <select class="form-control" name="genre_id">
            <option></option>
            <?php foreach ($genres as $genre) : ?>
                <option value="<?= $genre['genre_id'] ?>"
                    <?php if($genre['genre_id'] === $anime['genre_id']) echo "selected"; ?>
                    >
                    <?= $genre['genre_id'] ?> - <?= $genre['genre_nom'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class='row no-gutters'>
        <div class="col-1"></div>
        <?php foreach($studios as $studio) : ?>
            <div class="form-group form-check col-2">
                <input type="checkbox" class="form-check-input" name="studio-<?= $studio['studio_id'] ?>"
                    <?php if(in_array($studio['studio_id'],$tabstudios)) 
                        echo "checked";
                    ?>
                >
                <label class="form-check-label" for="exampleCheck1"><?= $studio['studio_nom'] ?></label>
            </div>
        <?php endforeach; ?>
        <div class="col-1"></div>
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

<?php 
$content = ob_get_clean();
$titre = "Page de modification de l'anime : ". $anime['anime_nom'];
require "views/commons/template.php";