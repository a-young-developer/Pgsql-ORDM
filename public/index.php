<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');
$loader = include "./vendor/autoload.php";

/*
$typeBag = new \Cable\Ordm\TypeBag(array(
    \Cable\Ordm\Types\Varchar::class
));


$blueprint = new \Cable\Ordm\Blueprint\Blueprint($typeBag);

$blueprint->varchar('username')
    ->index('users')
    ->engine(['GIN', 'JSONB_PATH_OPS']);

*/

$iterator = new \Cable\Ordm\Iterator\PhpFilesIterator(__DIR__.'/Annotations');

$iterator->setIgnoreFiles(array(
    'AnnotationProvider.php'
));

$files = $iterator->iterate();

$mapper = new \Cable\Ordm\Mapper\FileMapper('Cable\Ordm\Annotations');
