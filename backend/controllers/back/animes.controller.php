<?php
require_once "./controllers/back/Securite.class.php";
require_once "./models/back/animes.manager.php";
require_once "./models/back/genres.manager.php";
require_once "./models/back/studios.manager.php";
require_once "./controllers/back/utile.php";

class AnimesController
{
    private $animesManager;

    public function __construct()
    {
        $this->animesManager = new AnimesManager();
    }

    public function visualisation()
    {
        if (Securite::verifAccessSession()) {
            $animes = $this->animesManager->getAnimes();
            require_once("./views/animesVisualisation.view.php");
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là !");
        }
    }

    public function suppression()
    {
        if (Securite::verifAccessSession()) {
            $idAnime = (int)Securite::secureHTML($_POST['anime_id']);

            $this->animesManager->deleteDbAnimeStudio($idAnime);
            $this->animesManager->deleteDbAnime($idAnime);
            $_SESSION['alert'] = [
                "message" => "L'anime est supprimé",
                "type" => "alert-success"
            ];
            header('Location: ' . URL . 'back/animes/visualisation');
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là !");
        }
    }

    public function creation()
    {
        if (Securite::verifAccessSession()) {
            $genresManager = new GenresManager();
            $genres = $genresManager->getGenres();
            $studiosManager = new StudiosManager();
            $studios = $studiosManager->getStudios();
            require_once("./views/animeCreation.view.php");
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là !");
        }
    }

    public function creationValidation()
    {
        if (Securite::verifAccessSession()) {
            $nom = Securite::secureHTML($_POST['anime_nom']);
            $description = Securite::secureHTML($_POST['anime_description']);
            $image = "";
            if($_FILES['image']['size'] > 0) {
                $repertoire = "public/images/";
                $image = ajoutImage($_FILES['image'], $repertoire);
            }
            $genre = (int)Securite::secureHTML($_POST['genre_id']);
            
            $studiosManager = new StudiosManager();
            $studioNb = (int)($studiosManager->countStudios())[0]['nb'];
           
            $idAnime = $this->animesManager->createAnime($nom, $description, $image, $genre);

            for($nb = $studioNb; $nb >= 0; $nb--) {
                if(!empty($_POST['studio-'.$nb]))
                $studiosManager->addStudioAnime($idAnime, $nb);
            } 
           

            $_SESSION['alert'] = [
                "message" => "L'anime est crée avec l'id :".$idAnime,
                "type" => "alert-success"
            ];
            header('Location: ' . URL . 'back/animes/visualisation');
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là !");
        }
    }

    public function modification($idAnime){
        if(Securite::verifAccessSession()){
            $genresManager = new genresManager();
            $genres = $genresManager->getGenres();
            $StudiosManager = new StudiosManager();
            $studios = $StudiosManager->getStudios();

            $lignesAnime = $this->animesManager->getAnime((int)Securite::secureHTML($idAnime));
            $tabstudios = [];
            foreach($lignesAnime as $studio){
                $tabstudios[] = $studio['studio_id'];
            }
           $anime = array_slice($lignesAnime[0],0,5);

            require_once "./views/animeModification.view.php";
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }

    public function modificationValidation(){
        if(Securite::verifAccessSession()){
            $idAnime = Securite::secureHTML($_POST['anime_id']);
            $nom = Securite::secureHTML($_POST['anime_nom']);
            $description = Securite::secureHTML($_POST['anime_description']);
            $genre = (int) Securite::secureHTML($_POST['genre_id']);
            $image= $this->animesManager->getImageAnime($idAnime);
            if($_FILES['image']['size'] > 0){
                unlink("public/images/".$image);
                $repertoire = "public/images/";
                $image = ajoutImage($_FILES['image'],$repertoire);
            }
            

            $this->animesManager->updateAnime($idAnime,$nom,$description,$image,$genre);
            
            $StudiosManager = new StudiosManager;
            $studioNb = ($StudiosManager->countStudios());
            // var_dump($studioNb[6]['studio_id']);
            //  echo(count($studioNb));
                   
                for($nb = 0;  $nb < count($studioNb); $nb++) {

                    $studios[$studioNb[$nb]['studio_id']] = !empty($_POST['studio-'.$studioNb[$nb]['studio_id']]);
                    
                }
                // echo ($studioNb[6]['studio_id']);
                // echo ($_POST['studio-'.$studioNb[6]['studio_id']]);
                //var_dump((int)$studioNb[0]['studio_id']);
                // var_dump($studios);
                
                // $studioss = [
                //     1 => !empty($_POST['studio-1']),
                //     2 => !empty($_POST['studio-2']),
                //     3 => !empty($_POST['studio-3']),
                //     4 => !empty($_POST['studio-4']),
                //     5 => !empty($_POST['studio-5']),
                //     8 => !empty($_POST['studio-8']),
                //     11 => !empty($_POST['studio-11']),
                // ];
            
               var_dump($studios);
                // var_dump($studioss);
            
            foreach ($studios as $key => $studio) {
               // var_dump("studio nb ".$studioNb);
                //studio coché et non présent en BD
               // echo ("key = ".$studio[$key]);
                if($studios[$key] && !$StudiosManager->verificationExisteAnimeStudio($idAnime,$key)){
                 //   var_dump("condition add");
                    $StudiosManager->addStudioAnime($idAnime,$key);
                }

                //studio non coché et présent en BD
                if(!$studios[$key] && $StudiosManager->verificationExisteAnimeStudio($idAnime,$key)){
                    $StudiosManager->deleteDbStudioAnime($idAnime,$key);
                }
            }

            $_SESSION['alert'] = [
                "message" => "L'anime a bien été modifié",
                "type" => "alert-success"
            ];
           header('Location: '.URL.'back/animes/visualisation');
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }
}
