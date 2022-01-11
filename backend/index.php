<?php
session_start();

//https://localhost/...
//https://www.myprojectstart.com/...
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once("controllers/front/Api.Controller.php");
require_once("controllers/back/admin.controller.php");
require_once("controllers/back/genres.controller.php");
require_once("controllers/back/animes.controller.php");
require_once("controllers/back/studios.controller.php");


$apiController = new ApiController();
$adminController = new AdminControler();
$genresController = new GenresController();
$animesController = new AnimesController();
$studiosController = new StudiosController();

try {
    if (empty($_GET['page'])) {
        throw new Exception("Cette page n'existe pas");
    } else {
        //On explose l'url
        $url = explode('/', filter_var($_GET['page'], FILTER_SANITIZE_URL));
        if (empty($url[0]) || empty($url[1])) throw new Exception("Cette page n'existe pas");
        switch ($url[0]) {
            case 'front':
                switch ($url[1]) {
                    case 'animes':
                        if (!isset($url[2]) || (!isset($url[3]))) {
                            $apiController->getAnimes(-1, -1);
                        } else {
                            $apiController->getAnimes((int)$url[2], (int)$url[3]);
                        }
                        break;
                    case 'anime':
                        if (empty($url[2])) throw new Exception("L'id de l'anime n'existe pas");
                        $apiController->getAnime($url[2]);
                        break;
                    case 'studios':
                        $apiController->getStudios();
                        break;
                    case 'genres':
                        $apiController->getGenres();
                        break;
                    case 'sendMessage':
                        $apiController->sendMessage();
                        break;
                    default:
                        throw new Exception("Cette page n'existe pas");
                }
                break;
            case 'back':
                switch ($url[1]) {
                    case 'login':
                        $adminController->getPageLogin();
                        break;
                    case 'connexion':
                        $adminController->connexion();
                        break;
                    case 'admin':
                        $adminController->getAccueilAdmin();
                        break;
                    case 'deconnexion':
                        $adminController->deconnexion();
                        break;
                    case 'genres':
                        switch ($url[2]) {
                            case 'visualisation':
                                $genresController->visualisation();
                                break;
                            case 'validationSuppression' : $genresController->suppression();
                            break;
                            case "validationModification" : $genresController->modification();
                            break;
                            case "creation" : $genresController->creationTemplate();
                            break;
                            case "creationValidation" : $genresController->creationValidation();
                            break;
                            default:
                                throw new Exception("Cette page n'existe pas");
                        }
                        break;
                        case 'animes':
                            switch ($url[2]) {
                                case 'visualisation':
                                    $animesController->visualisation();
                                    break;
                                    case 'validationSuppression':
                                        $animesController->suppression();
                                        break;
                                    case 'creation':
                                        $animesController->creation();
                                        break;
                                        case 'creationValidation': $animesController->creationValidation();
                                        break;
                                        case "modification" : $animesController->modification($url[3]);
                            break;
                            case "modificationValidation" : $animesController->modificationValidation();
                            break;
                                default:
                                    throw new Exception("Cette page n'existe pas");
                            }
                            break;
                            case 'studios':
                                switch ($url[2]) {
                                    case 'visualisation':
                                        $studiosController->visualisation();
                                        break;
                                    case 'validationSuppression' : $studiosController->suppression();
                                    break;
                                    case "validationModification" : $studiosController->modification();
                                    break;
                                    case "creation" : $studiosController->creationTemplate();
                                    break;
                                    case "creationValidation" : $studiosController->creationValidation();
                                    break;
                                    default:
                                        throw new Exception("Cette page n'existe pas");
                                }
                }
                break;
            default:
                throw new Exception("Cette page n'existe pas");
        }
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
    echo $msg;
    echo "<a href='" .URL."back/login'>login</a>";
}
