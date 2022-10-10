<?php
    require_once(__DIR__ . '/../controllers/controller.php');
    require_once(__DIR__ . '/../models/gamesManager.php');

    class ListController extends Controller {
        function handle($get) {

                $modelGameManager = new GamesManager($this->_db);
                $gameObjects = $modelGameManager->getAll();
            
            require(__DIR__ . '/../views/list.php');
        }
    };
?>