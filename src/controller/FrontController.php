<?php
use Api\Annotations\RESTful;
require 'src/business/UserBO.php';

class FrontController extends RESTController{
  protected $app;

  public function __construct() {
    parent::__construct();
  }

  /**
	 * @RESTful(uri="/hello/{name}",
   * contentType="application/json",
   * map="GET")
	 */
  public function hello($request, $response){
    $name = $request->getAttribute('name');
    $response->write(json_encode(['hello'=>$name]));
  }

  /**
	 * @RESTful(uri="/user/{id:[0-9]+}",
   * contentType="application/json",
   * map="GET")
	 */
  public function user($request, $response){
    $id = $request->getAttribute('id');
    $user = UserBO::getUser($id);
    $response->write($user->toJson());
  }
}
new FrontController();
