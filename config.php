<?php

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
require __DIR__.'/vendor/autoload.php';


$factory = (new Factory)
    ->withServiceAccount('serviceAccount.json')
    ->withDatabaseUri('https://flyfar-erp-software-default-rtdb.firebaseio.com/');

    $auth = $factory->createAuth();
    $database = $factory->createDatabase();

?>