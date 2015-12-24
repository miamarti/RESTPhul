<?php
use App\Annotations\RESTful;
require 'MainController.php';

class FrontController extends MainController{
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
    $response->write(json_encode(['name'=>$name]));
  }

  /**
	 * @RESTful(uri="/user/{id:[0-9]+}",
   * contentType="application/json",
   * map="GET")
	 */
  public function user($request, $response){
    $id = $request->getAttribute('id');
    $response->write(json_encode(['id'=>$id]));
  }
}
new FrontController();
