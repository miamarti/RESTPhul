<?php
namespace Api\Annotations;
use Doctrine\Common\Annotations\Annotation;

/**
* @Annotation
*/
final class RequestMapping extends Annotation
{
	public $value;
	public $method;
  public $produces;
}
