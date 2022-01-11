<?php

require_once "models/Model.php";

class GenresManager extends Model
{
    public function getGenres()
    {
        $req = "SELECT * from genre";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $genres = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $genres;
    }

    public function deleteDbgenre($idGenre)
    {
        $req = "DELETE from genre where genre_id = :idGenre";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idGenre", $idGenre, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function compterAnimes($idGenre) {
        $req = "SELECT count(*) as 'nb' from genre g inner join anime a on a.genre_id = g.genre_id where g.genre_id = :idGenre";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idGenre", $idGenre, PDO::PARAM_INT);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat['nb'];
    }

    public function updateGenre($idGenre,$libelle){
        $req ="UPDATE genre set genre_nom = :libelle
        where genre_id= :idGenre";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idGenre",$idGenre,PDO::PARAM_INT);
        $stmt->bindValue(":libelle",$libelle,PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function createGenre($libelle){
        $req ="INSERT into genre (genre_nom)
            values (:libelle)
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":libelle",$libelle,PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
        return $this->getBdd()->lastInsertId();
    }
}
