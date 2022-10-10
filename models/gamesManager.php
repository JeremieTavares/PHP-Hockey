<?php
require_once(__DIR__ . '/../models/gamesClass.php');

class GamesManager
{
    const SELECT_ALL_GAMES = "SELECT id, date, adversaires.code AS opponent_code, adversaires.nom AS opponent_name,
                                  pointage_local AS montreal_score, pointage_adversaire AS opponent_score
                                  FROM parties INNER JOIN adversaires ON adversaires.code = parties.adversaire
                                  ORDER BY date DESC";
    const SELECT_ONE_GAME_BY_ID = "SELECT id, date, adversaires.code AS opponent_code, adversaires.nom AS opponent_name,
                                       pointage_local AS montreal_score, pointage_adversaire AS opponent_score
                                       FROM parties INNER JOIN adversaires ON adversaires.code = parties.adversaire
                                       WHERE id = :id";

    const INSERT_NEW_GAME = "INSERT INTO parties (date, adversaire, pointage_local, pointage_adversaire) 
                                VALUES(:date, :adversaire, :pointage_local, :pointage_adversaire)";

    const DELETE_GAME = "DELETE FROM parties WHERE id = :id";

    const UPDATE_GAME = "UPDATE parties
                             SET pointage_local = :pointage_local, pointage_adversaire = pointage_adversaire
                             WHERE id = :id";


    private $_db;

    function __construct(PDO $db)
    {
        $this->_db = $db;
    }
    function __destruct()
    {
        $this->_db = null;
    }

    function getAll()
    {
        $gameObjectArray = [];

        $query = $this->_db->query(self::SELECT_ALL_GAMES);
        $dbResults = $query->fetchAll();

        foreach ($dbResults as $game) {
            array_push($gameObjectArray, new Games($game));
        }

        return $gameObjectArray;
    }

    function get($id)
    {

        $query = $this->_db->prepare(self::SELECT_ONE_GAME_BY_ID);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $dbResults = $query->fetch();

        return new Games($dbResults);
    }

    function insert($gameObj)
    {

        $query = $this->_db->prepare(self::INSERT_NEW_GAME);

        $query->execute(array(
            ":date" => $gameObj->get_date(),
            ":adversaire" => $gameObj->get_opponent_name(),
            ":pointage_local" => $gameObj->get_montreal_score(),
            ":pointage_adversaire" => $gameObj->get_opponent_score()
        ));
        $id = $this->_db->lastInsertId();

        return $id;
    }





    function update($gameObj)
    {
        $query = $this->_db->prepare(self::UPDATE_GAME);

        $query->execute(array(
            ":id" => $gameObj->get_id(),
            ":pointage_local" => $gameObj->get_montreal_score(),
            ":pointage_adversaire" => $gameObj->get_opponent_score()     
        ));
    }

    function delete($id)
    {
        $query = $this->_db->prepare(self::DELETE_GAME);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }
}
