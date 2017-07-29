<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');
include "./vendor/autoload.php";

$types = [
    \Cable\Ordm\Types\Integer::class,
    \Cable\Ordm\Types\Varchar::class,
    \Cable\Ordm\Types\Serial::class
];

$typeBag = new \Cable\Ordm\TypeBag($types);

$blueprint = new \Cable\Ordm\Blueprint\Blueprint($typeBag);

$blueprint->varchar('username', 100)->notNull();


$alterTable = new \Cable\Ordm\Blueprint\Builder\UpdateTable(
    "public.users"
);


var_dump($alterTable->buildQuery($blueprint));