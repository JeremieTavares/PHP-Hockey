<?php
    class DbConnect {
        const DB_NAME = 'dbEquipes';
        const MYSQL_SERVER = 'mysql:host=localhost;dbname=' . self::DB_NAME . ';charset=utf8';
        const SQL_USER = 'root';
        const SQL_PASS = '';

        public static function getMySqlConnection() {
            $bdd = new PDO(self::MYSQL_SERVER, self::SQL_USER, self::SQL_PASS);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $bdd;
        }
    };
?>