<?php
require 'src/model/UserBean.php';
require 'src/model/RulesBean.php';

class UserBO{

  public static function getUser($id){
    $rule = new RulesBean();
    $rule->setKey('AJDL2184FAS2186AGD');
    $rule->setType('ADMIN');

    $user = new UserBean();
    $user->setId($id);
    $user->setName('Miller');
    $user->setEmail('miller.augusto@gmail.com');
    $user->setFone('+55 19 9.8177-2939');
    $user->addRule($rule);

    return $user;
  }
}
