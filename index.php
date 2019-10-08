<?php

include('config/app.php');
include('controllers/AuthController.php');

$controlelr = new AuthController($conf);

// Пример вызова твоего метода
$x = $controlelr->profile();

var_dump($x);
