<?php

$action = $_POST['action'];
require_once "performance.php";

switch ($action){
//    при нажатии на "Пропустить" обновляет случайное слово теста
    case 'test_skip':
        test_skip($db);
        break;

    case '':

        break;
}