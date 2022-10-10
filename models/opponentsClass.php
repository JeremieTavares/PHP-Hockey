<?php
class Opponents
{

  private $_code,
          $_name;

  public function __construct($params = array())
  {
    foreach ($params as $key => $value) {

      $methodName = "set_" . $key;
      if (method_exists($this, $methodName)) {
        $this->$methodName($value);
      }
    }
  }

  // GETTERS 
  public function get_code() {return $this->_code;}
  public function get_name() {return $this->_name;}


  // SETTERS
  public function set_code($code)
  {
    if(empty($code) || is_numeric($code) || is_int($code) || strlen($code) < 3)
      throw new Exception("PAS VALIDE : Le Code doit etre des lettres d'une longueur de 3");

    $this->_code = $code;
  }

  public function set_name($name)
  { 
     if(empty($name) || is_numeric($name) || is_int($name))
      throw new Exception("PAS VALIDE : Le Code doit etre des lettres d'une longueur de 3");

    $this->_name = $name;
  }

}
