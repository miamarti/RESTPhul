<?php
namespace Api\Annotations;
use Doctrine\Common\Annotations\Annotation;

/**
* @Annotation
*/
final class RESTful extends Annotation
{
	public $uri;
	public $map;
  public $contentType;
}