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

$columns = [];

$username = (new \Cable\Ordm\Blueprint\Column("username", [], new \Cable\Ordm\Types\Varchar()));

$columns[] = $username;

$metadata = new \Cable\Ordm\Metadata('users', $columns);

var_dump($metadata);