<?php
    require_once(__DIR__ . '/../models/opponentsClass.php');
    
    class OpponentsManager {
        const SELECT_ALL_OPPONENTS = "SELECT code, nom AS name FROM adversaires ORDER BY nom";

        private $_db;
        
        function __construct(PDO $db) { $this->_db = $db; }
        function __destruct() { $this->_db = null; }

        function getAll() {

            $opponentsObjectArray = [];
            $query = $this->_db->query(self::SELECT_ALL_OPPONENTS);

            $dbResults = $query->fetchAll();

            foreach($dbResults as $opponent){
                array_push($opponentsObjectArray, new Opponents($opponent));
            }

            return $opponentsObjectArray;
        }
    };
