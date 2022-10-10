<?php
    /*
        Une classe abstraite est une classe qui ne peut pas être instanciée directement.
        On peut seulement créer des classes héritant de celle-ci.
    */
    abstract class Controller {
        /*
            La portée protected permet aux classes kids (qui héritent de celle-ci)
            d'accéder à cette propriété.
        */
        protected $_db;

        public function __construct(PDO $db) { $this->_db = $db; }
        public function __destruct() { $this->_db = null; }

        /*
            Une méthode abstraite est une méthode que les classes kids doivent absolument
            définir. Le paramètre $get contiendra les données reçues dans l'URL.
        */
        abstract public function handle($get);

        public function handlePost($get, $post) {}
    };
?>