<?php

require_once "models/Model.php";

class StudiosManager extends Model
{
    public function getStudios()
    {
        $req = "SELECT * from studio";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $studios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $studios;
    }

    public function deleteDbStudioAnime($idAnime,$idStudio){
        $req = "Delete from anime_studio 
        where anime_id = :idAnime and studio_id = :idStudio";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idAnime",$idAnime,PDO::PARAM_INT);
        $stmt->bindValue(":idStudio",$idStudio,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function compterAnimes($idstudio) {
        $req = "SELECT count(*) as 'nb' from studio s inner join anime_studio a_s on a_s.studio_id = s.studio_id where s.studio_id = :idstudio";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idstudio", $idstudio, PDO::PARAM_INT);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat['nb'];
    }

    public function addStudioAnime($idAnime, $idStudio) {
        $req = "INSERT INTO anime_studio (anime_id, studio_id) values (:idAnime, :idStudio)";

        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idAnime", $idAnime, PDO::PARAM_INT);
        $stmt->bindValue(":idStudio", $idStudio, PDO::PARAM_INT);
        $stmt->execute();
        $studios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $studios;
    }


    public function updateStudio($idstudio,$libelle){
        $req ="UPDATE studio set studio_nom = :libelle
        where studio_id= :idstudio";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idstudio",$idstudio,PDO::PARAM_INT);
        $stmt->bindValue(":libelle",$libelle,PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
    }


    public function countStudios()
    {
        $req = "SELECT studio_id from studio";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $studios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $studios;
    }

    public function deleteDbstudio($idStudio)
    {
        $req = "DELETE from studio where studio_id = :idStudio";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idStudio", $idStudio, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function createStudio($libelle){
        $req ="INSERT into studio (studio_nom)
            values (:libelle)
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":libelle",$libelle,PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
        return $this->getBdd()->lastInsertId();
    }

    public function verificationExisteAnimeStudio($idAnime,$idStudio){
        var_dump($idAnime."   ".$idStudio);
        $req = "SELECT count(*) as 'nb'
        from anime_studio a_s
        where a_s.anime_id = :idAnime and a_s.studio_id = :idStudio";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idAnime",$idAnime,PDO::PARAM_INT);
        $stmt->bindValue(":idStudio",$idStudio,PDO::PARAM_INT);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        if($resultat['nb'] >=1) return true;
        return false;
    }
}
