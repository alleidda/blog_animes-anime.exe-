<?php
require_once "./controllers/back/Securite.class.php";
require_once "./models/back/genres.manager.php";

class GenresController {
    private $genresManager;

    public function __construct()
    {
       $this->genresManager = new GenresManager;
    }

    public function visualisation() {
        if(Securite::verifAccessSession()) {
            $genres = $this->genresManager->getGenres();
            require_once("./views/genresVisualisation.view.php");
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là !");
        }
    }

    public function suppression() {
        if(Securite::verifAccessSession()) {
            $_SESSION['alert'] = [
                "message" =>"Le genre est supprimé",
                "type" => "alert-success"
            ];
$idGenre = (int)Securite::secureHTML($_POST['genre_id']);

            if($this->genresManager->compterAnimes($idGenre) > 0) {
                $_SESSION['alert'] = [
                    "message" =>"Le genre n'a pas été supprimé",
                    "type" => "alert-danger"
                ];
            } else {
                $this->genresManager->deleteDbgenre($idGenre);
                $_SESSION['alert'] = [
                    "message" =>"Le genre est supprimé",
                    "type" => "alert-success"
                ];
            }
        header('Location: '.URL.'back/genres/visualisation');
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là !");
        }
    }

    public function modification(){
        if(Securite::verifAccessSession()){
            $idGenre = (int)Securite::secureHTML($_POST['genre_id']);
            $libelle = Securite::secureHTML($_POST['genre_nom']);
            $this->genresManager->updateGenre($idGenre,$libelle);

            $_SESSION['alert'] = [
                "message" => "Le genre a été modifié",
                "type" => "alert-success"
            ];

            header('Location: '.URL.'back/genres/visualisation');
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }
    
    public function creationTemplate(){
        if(Securite::verifAccessSession()){
            require_once "./views/genreCreation.view.php";
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }

    public function creationValidation(){
        if(Securite::verifAccessSession()){
            $libelle = Securite::secureHTML($_POST['genre_nom']);
            $idgenre = $this->genresManager->createGenre($libelle);

            $_SESSION['alert'] = [
                "message" => "La genre a bien été créé avec l'identifiant : ".$idgenre,
                "type" => "alert-success"
            ];
            header('Location: '.URL.'back/genres/visualisation');
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }

}