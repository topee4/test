<?php

$route = $_GET['route'];


switch ($route)
{
    case '':
        include 'templates/main.php';
        break;

    case 'vocabulary':
        include 'templates/vocabulary.php';
        break;
    case 'profile':
        include 'templates/profile.php';
        break;
}
