<?php
require_once "./controllers/back/Securite.class.php";
require_once "./models/back/studios.manager.php";

class StudiosController {
    private $studiosManager;

    public function __construct()
    {
       $this->studiosManager = new studiosManager;
    }

    public function visualisation() {
        if(Securite::verifAccessSession()) {
            $studios = $this->studiosManager->getStudios();
            require_once("./views/studiosVisualisation.view.php");
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là !");
        }
    }

    public function suppression() {
        if(Securite::verifAccessSession()) {
            $_SESSION['alert'] = [
                "message" =>"Le studio est supprimé",
                "type" => "alert-success"
            ];
$idStudio = (int)Securite::secureHTML($_POST['studio_id']);

            if($this->studiosManager->compterAnimes($idStudio) > 0) {
                $_SESSION['alert'] = [
                    "message" =>"Le studio n'a pas été supprimé",
                    "type" => "alert-danger"
                ];
            } else {
                $this->studiosManager->deleteDbstudio($idStudio);
                $_SESSION['alert'] = [
                    "message" =>"Le studio est supprimé",
                    "type" => "alert-success"
                ];
            }
        header('Location: '.URL.'back/studios/visualisation');
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là !");
        }
    }

    public function modification(){
        if(Securite::verifAccessSession()){
            $idStudio = (int)Securite::secureHTML($_POST['studio_id']);
            $libelle = Securite::secureHTML($_POST['studio_nom']);
            $this->studiosManager->updatestudio($idStudio,$libelle);

            $_SESSION['alert'] = [
                "message" => "Le studio a été modifié",
                "type" => "alert-success"
            ];

            header('Location: '.URL.'back/studios/visualisation');
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }
    
    public function creationTemplate(){
        if(Securite::verifAccessSession()){
            require_once "./views/studioCreation.view.php";
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }

    public function creationValidation(){
        if(Securite::verifAccessSession()){
            $libelle = Securite::secureHTML($_POST['studio_nom']);
            $idStudio = $this->studiosManager->createstudio($libelle);

            $_SESSION['alert'] = [
                "message" => "Le studio a bien été créé avec l'identifiant : ".$idStudio,
                "type" => "alert-success"
            ];
            header('Location: '.URL.'back/studios/visualisation');
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }

}