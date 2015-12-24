<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class MainController{
  protected $app;
  protected $container;

  public function __construct() {
    $class = $this;
    
    $this->container = new \Slim\Container;
    $this->container['cache'] = function () {
      return new \Slim\HttpCache\CacheProvider();
    };
    $this->app = new \Slim\App($this->container);
    $this->app->add(new \Slim\HttpCache\Cache('public', 86400));

    $this->app->group('/api', function () use ($class) {
      foreach(get_class_methods($class) as $mthod){
        if($mthod !== '__construct'){
          $reflection = new ReflectionObject($class);
          $reflectionMethod = $reflection->getMethod($mthod);
          $reader = new \Doctrine\Common\Annotations\AnnotationReader();
          $annotations = $reader->getMethodAnnotations($reflectionMethod);

          if(!empty($annotations[0])){
            $contentType = $annotations[0]->contentType;
            $this->map([$annotations[0]->map], $annotations[0]->uri, function ($request, $response, $args) use ($class, $reflectionMethod, $contentType) {
              $newResponse = $response->withHeader('Content-type', $contentType);
              $reflectionMethod->invoke($class, $request, $newResponse);
              $resWithLastMod = $this->cache->withLastModified($newResponse, time() - 3600);
              return $resWithLastMod;
            });
          }
        }
      }
    });
    $this->app->run();
  }
}
