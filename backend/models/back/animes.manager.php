<?php

require_once "models/Model.php";

class AnimesManager extends Model
{
    public function getAnimes()
    {
        $req = "SELECT * from anime";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $animes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $animes;
    }

    public function deleteDbAnimeStudio($idAnime)
    {
        $req = "DELETE from anime_studio where anime_id = :idAnime";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idAnime", $idAnime, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function deleteDbAnime($idAnime)
    {
        $req = "DELETE from anime where anime_id = :idAnime";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idAnime", $idAnime, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }


    public function updateAnime($idAnime,$nom,$description,$image,$genre){
        $req ="UPDATE anime 
        set anime_nom = :nom, anime_description = :description, anime_photo = :image, genre_id = :genre
        where anime_id= :idAnime";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idAnime",$idAnime,PDO::PARAM_INT);
        $stmt->bindValue(":genre",$genre,PDO::PARAM_INT);
        $stmt->bindValue(":nom",$nom,PDO::PARAM_STR);
        $stmt->bindValue(":description",$description,PDO::PARAM_STR);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
    }

   
    public function createanime($nom, $description, $image, $genre){
        $req ="INSERT into anime (anime_nom, anime_description, anime_photo, genre_id)
            values (:nom,:description,:image,:genre)
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":nom",$nom,PDO::PARAM_STR);
        $stmt->bindValue(":description",$description,PDO::PARAM_STR);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $stmt->bindValue(":genre",$genre,PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
        return $this->getBdd()->lastInsertId();
    }

    public function getAnime($idAnime){
        $req = "SELECT a.anime_id, anime_nom, anime_description, anime_photo, a.genre_id, studio_id from anime a
            inner join genre g on a.genre_id=g.genre_id 
            left join anime_studio a_s on a_s.anime_id = a.anime_id
            WHERE a.anime_id = :idAnime";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idAnime",$idAnime,PDO::PARAM_INT);
        $stmt->execute();
        $lignesanime = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $lignesanime;
    }

    public function getImageAnime($idAnime){
        $req = "SELECT anime_photo from anime where anime_id = :idAnime";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idAnime",$idAnime,PDO::PARAM_INT);
        $stmt->execute();
        $image = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $image['anime_photo'];
    }
}
