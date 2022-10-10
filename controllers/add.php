<?php
require_once(__DIR__ . '/../controllers/controller.php');
require_once(__DIR__ . '/../models/gamesManager.php');
require_once(__DIR__ . '/../models/opponentsManager.php');
require_once(__DIR__ . '/../inc/utils/getDateList.php');

class AddController extends Controller
{
    function handle($get)
    {
        $dateList = getDateList(time() - (7 * 24 * 3600), 14);

        $opponentsManagerObj = new OpponentsManager($this->_db);
        $opponentsObjArray = $opponentsManagerObj->getAll();

        require(__DIR__ . '/../views/add_form.php');
    }

    function handlePost($get, $post)
    {
        if (
            isset($post["date"])
            && isset($post["opponent_code"])
            && isset($post["pointage_local"])
            && isset($post["pointage_adversaire"])
        ) {

            $game = new Games(
                array(
                    "date" => $post["date"],
                    "opponent_name" => $post["opponent_code"],
                    "montreal_score" => $post["pointage_local"],
                    "opponent_score" => $post["pointage_adversaire"]
                )
            );

            $gameManager = new GamesManager($this->_db);
            $results = $gameManager->insert($game);
            if (!empty($results)) {
                require(__DIR__ . '/../views/add_confirmation.php');
            } else {
                echo "L'INSERTION NA PAS FONCTIONNE";
            }
        } else {
            echo "Erreur donnees non valides";
        }
    }
}
