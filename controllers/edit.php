<?php
    require_once(__DIR__ . '/../controllers/controller.php');
    require_once(__DIR__ . '/../models/gamesManager.php');
    require_once(__DIR__ . '/../models/opponentsManager.php');
    require_once(__DIR__ . '/../inc/utils/getDateList.php');

    class EditController extends Controller {

        function handle($get) {
            if (isset($get['id'])) {
				$dateList = getDateList(time() - (7 * 24 * 3600), 14);
				
                $gamesManagerObj = new GamesManager($this->_db);
                $gameObj = $gamesManagerObj->get($get['id']);

                $opponentsManagerObj = new OpponentsManager($this->_db);
                $opponentsObjArray = $opponentsManagerObj->getAll();      

                require(__DIR__ .'/../views/edit_form.php');
            }
            
            else {
                $gamesManagerObj = new GamesManager($this->_db);
                $gamesObjArray = $gamesManagerObj->getAll();

                require(__DIR__ . '/../views/edit_select_game.php');
            }
        }

        function handlePost($get, $post) {

            if(isset($post['id'])
            && isset($post["date"]) 
            && isset($post["opponent_code"]) 
            && isset($post["pointage_local"]) 
            && isset($post["pointage_adversaire"])){
               

                $game = new Games(
                  array("id"=>$post['id'],
                        "date"=>$post["date"], 
                        "opponent_name"=>$post["opponent_code"], 
                        "montreal_score"=>$post["pointage_local"], 
                        "opponent_score"=>$post["pointage_adversaire"])
                );

                
                // unset($game->get_date());
                // unset($game->get_opponent_name());

    
                $gameManager = new GamesManager($this->_db);
                $gameManager->update($game);
                require(__DIR__ . '/../views/edit_confirmation.php');
            }
        }
    };
