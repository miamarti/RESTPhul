<?php
require 'PeopleBean.php';

class UserBean extends PeopleBean{
  private $id;
  private $rules;

  public function __construct() {
    $this->rules = new ArrayObject();
  }

  public function getId(){
    return $this->id;
  }

  public function setId($value){
    $this->id = $value;
  }

  public function addRule($rule){
    $this->rules->append($rule);
  }

  public function toJson(){
    return json_encode(get_object_vars($this));
  }
}
