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


$what = $blueprint->int('test', 100)->default('10')
    ->foreignKey('table_users_pk', 'accounts', ['id', 'user_id'])
    ->onDeleteCascade()
    ->onUpdateCascade();

$blueprint->varchar('username', 100)->notNull();
$blueprint->pk('id');

$createTable = new \Cable\Ordm\Blueprint\Builder\CreateTable(
    "public.users"
);

var_dump($createTable->buildQuery($blueprint));