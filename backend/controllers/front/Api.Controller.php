<?php

require_once("models/front/Api.Manager.php");
require_once("models/Model.php");

class ApiController
{

    private $apiManager;

    public function __construct()
    {
        $this->apiManager = new ApiManager();
    }

    public function getAnimes($idGenre, $idStudio)
    {
        $datasAnimes =  $this->apiManager->getDbAnimes($idGenre, $idStudio);
        Model::sendJSON($this->formatDatasAnimes($datasAnimes));
    }

    public function getAnime($idAnime)
    {
        $datasAnime = $this->apiManager->getDbAnime($idAnime);
        Model::sendJSON($this->formatDatasAnimes($datasAnime));
    }

    private function formatDatasAnimes($datas)
    {
        $tab = [];
        foreach ($datas as $data) {
            if (!array_key_exists($data['anime_id'], $tab)) {
                $tab[$data['anime_id']] = [
                    "id" => $data['anime_id'],
                    "nom" => $data['anime_nom'],
                    "description" => $data['anime_description'],
                    "image" => URL . "public/images/" . $data['anime_photo'],
                    "genre" => [
                        "idGenre" => $data['genre_id'],
                        "genreNom" => $data['genre_nom'],
                    ]
                ];
            }
            $tab[$data['anime_id']]['studios'][] = [
                "idStudio" => $data['studio_id'],
                "studioNom" => $data['studio_nom']
            ];
        }
        return ($tab);
    }

    public function getStudios()
    {
        $studios =  $this->apiManager->getDbStudios();
        Model::sendJSON($studios);
    }

    public function getGenres()
    {
        $genres =  $this->apiManager->getDbGenres();
        Model::sendJSON($genres);
    }

    public function sendMessage()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Accept, Content-type, Content-Lenght, Accept-Encoding, X-CSFR-Token, Authorization");

        $obj = json_decode(file_get_contents('php://input'));

        //Envoie de mail

        // $to = "contactanimeexe@gmail.com";
        // $subject = "Message du site anime.exe : ".$obj->nom;
        // $message = $obj->contenu;
        // $headers = "from: ".$obj->email;
        // mail($to, $subject, $message, $headers);

        $messageRetour = [
            'from' => $obj->email,
            'to' => "contactanimeexe@gmail.com"
        ];

        echo json_encode($messageRetour);
    }
}
