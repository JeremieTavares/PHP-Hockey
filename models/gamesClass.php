<?php
class Games
{

  private $_id,
          $_date,
          $_opponent_name,
          $_montreal_score,
          $_opponent_score;



  public function __construct($params = array())
  {
    foreach ($params as $key => $value) {

      $methodName = "set_" . $key;
      if (method_exists($this, $methodName)) {
        $this->$methodName($value);
      }
    }
  }

  private function validateDate($date, $format = 'Y-m-d') { $d = DateTime::createFromFormat($format, $date);
    return ($d && ($d->format($format) == $date)); }

  // GETTERS 
  public function get_id() {return $this->_id;}
  public function get_date() {return $this->_date;}
  public function get_opponent_name() {return $this->_opponent_name;}
  public function get_montreal_score() {return $this->_montreal_score;}
  public function get_opponent_score(){return $this->_opponent_score;}

  // SETTERS
  public function set_id($id)
  {
    if(is_null($id) || !is_numeric($id) || !is_int(intval($id)) || intval($id) < 0)
      throw new Exception("L'id n'est pas valide, sois il est vide, pas un nombre ou il est plus petit que 0");

    $this->_id = $id;
  }

  public function set_date($date)
  { 
    if(!empty($this->validateDate($date)))
      $this->_date = $date;
    else{
      throw new Exception("Date non valide");
    }
  }

  public function set_opponent_name($opponent_name)
  {
    if(empty($opponent_name) || is_numeric($opponent_name) || is_int($opponent_name) || strlen($opponent_name) < 3)
      throw new Exception("L'adversaire n'est pas valide, le Code doit etre des lettres d'une longueur de 3");

    $this->_opponent_name = $opponent_name;
  }

  public function set_montreal_score($montreal_score)
  {
    if(is_null($montreal_score) || !is_numeric($montreal_score) || !is_int(intval($montreal_score)))
      throw new Exception("Le pointage local doit etre un chiffre et un entier");

    $this->_montreal_score = $montreal_score;
  }

  public function set_opponent_score($opponent_score)
  {

    if(is_null($opponent_score) || !is_numeric($opponent_score) || !is_int(intval($opponent_score))){
      throw new Exception("Le pointage adversaire doit etre un chiffre et un entier");
    }
    
    $this->_opponent_score = $opponent_score;
  }
}
