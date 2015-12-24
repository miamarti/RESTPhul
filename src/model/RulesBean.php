<?php
class RulesBean{
  public $key;
  public $type;

  public function getKey(){
    return $this->key;
  }

  public function getType(){
    return $this->type;
  }

  public function setKey($value){
    $this->key = $value;
  }

  public function setType($value){
    $this->type = $value;
  }

}
