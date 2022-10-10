<?php
    require_once(__DIR__ . '/../controllers/controller.php');
    require_once(__DIR__ . '/../models/gamesManager.php');
    require_once(__DIR__ . '/../inc/utils/getDateList.php');

    class DeleteController extends Controller {
        function handle($get) {

            if(isset($get['id'])){
                $id = $get['id'];
                $modelGameManager = new GamesManager($this->_db);
                $modelGameManager->delete($id);
        
                require(__DIR__ . '/../views/delete_confirmation.php');
            } else
            echo "ERREUR ID MANQUANT";
        }
    };
?>