<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');
$loader = include "./vendor/autoload.php";

use Cable\Ordm\Annotations\Table;

$container = \Cable\Container\Factory::create();

$container->addProvider(new \Cable\Ordm\Annotations\AnnotationProvider());


/**
 * Class Test
 *
 * @Table(name="test")
 */
class Test{

}

$reader = new \Doctrine\Common\Annotations\AnnotationReader();

$class = new ReflectionClass(new Test());

$annotations = $reader->getClassAnnotations($class);
var_dump($annotations);
