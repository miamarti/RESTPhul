<?php
use Api\Annotations\RequestMapping;
require 'src/business/UserBO.php';

class FrontController extends RESTController{
  protected $app;

  public function __construct() {
    parent::__construct();
  }

  /**
	 * @RequestMapping(value="/hello/{name}", method="GET", produces="application/json")
	 */
  public function hello($request, $response){
    $name = $request->getAttribute('name');
    $response->write(json_encode(['hello'=>$name]));
  }

  /**
	 * @RequestMapping(value="/user/{id:[0-9]+}", method="GET", produces="application/json")
	 */
  public function user($request, $response){
    $id = $request->getAttribute('id');
    $user = UserBO::getUser($id);
    $response->write($user->toJson());
  }
}
new FrontController();
