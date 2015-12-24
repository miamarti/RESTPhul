<?php
class PeopleBean{
  protected $name;
  protected $email;
  protected $fone;

  public function getName(){
    return $this->name;
  }

  public function getEmail(){
    return $this->email;
  }

  public function getFone(){
    return $this->fone;
  }

  public function setName($value){
    $this->name = $value;
  }

  public function setEmail($value){
    $this->email = $value;
  }

  public function setFone($value){
    $this->fone = $value;
  }

  public function toJson(){
    return json_encode(get_object_vars($this));
  }
}
