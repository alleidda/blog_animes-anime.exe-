<?php

require_once ("models/Model.php");

class ApiManager extends Model
{
    public function getDbAnimes($idGenre, $idStudio)
    {
        $whereClause = "";
        if ($idGenre !== -1 || $idStudio !== -1) $whereClause .= "WHERE ";
        if ($idGenre !== -1) $whereClause .= "g.genre_id = :idGenre ";
        if ($idGenre !== -1 && $idStudio !== -1) $whereClause .= " AND ";
        if ($idStudio !== -1) $whereClause .= "a.anime_id In (
            select anime_id from anime_studio where studio_id = :idStudio)
            ";

            $req = "SELECT a.anime_id, anime_nom, anime_description, anime_photo, g.genre_id, genre_nom, s.studio_id, studio_nom
            from anime a inner join genre g on g.genre_id = a.genre_id
            left join anime_studio a_s on a_s.anime_id = a.anime_id
            left join studio s on s.studio_id = a_s.studio_id ".$whereClause;

        $stmt = $this->getBdd()->prepare($req);
        if ($idGenre !== -1) $stmt->bindValue("idGenre", $idGenre, PDO::PARAM_INT);
        if ($idStudio !== -1) $stmt->bindValue("idStudio",$idStudio, PDO::PARAM_INT);
        $stmt->execute();
        $animes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $animes;
    }

    public function getDbAnime($idAnime)
    {
        $req = "SELECT * from anime a inner join genre g on g.genre_id = a.genre_id inner join anime_studio a_s on a_s.anime_id = a.anime_id inner join studio s on s.studio_id = a_s.studio_id where a.anime_id = :idAnime";
        $stmt = $this->getBdd()->prepare($req);
        $stmt -> bindValue(":idAnime", $idAnime, PDO::PARAM_INT);
        $stmt->execute();
        $datasAnime = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datasAnime;
    }

    public function getDbStudios()
    {
        $req = "SELECT * from studio";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $studios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $studios;
    }

    public function getDbGenres()
    {
        $req = "SELECT * from genre";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $genres = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $genres;
    }
}