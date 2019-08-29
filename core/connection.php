<?php
//require 'config.php';
//
//function connection () {
//    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
//    if( !$conn ) {
//        echo 'Ошибка: невозможно установить соединение с MySQL' . PHP_EOL;
//        echo 'Код ошибки errno: ' . mysqli_connect_errno() . PHP_EOL;
//        echo 'Текст ошибки error: ' . mysqli_connect_error() . PHP_EOL;
//        exit();
//    }
//
//    mysqli_set_charset($conn, 'utf-8');
//    return $conn;
//}

function vardump($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

class Database
{
    private $link;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $config = require_once "config.php";
        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['db_name'] . ';charset=' . $config['charset'];
        $this->link = new PDO($dsn, $config['username'], $config['password']);
        return $this;
    }

    public function execute($sql)
    {
        $sth = $this->link->prepare($sql);

        return $sth->execute();
    }

    public function query($sql)
    {
        $sth = $this->link->prepare($sql);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);

        if($result === false){
            return [];
        }
        return $result;
    }
    public function queryAll($sql)
    {
        $sth = $this->link->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_COLUMN);

        if($result === false){
            return [];
        }
        return $result;
    }
}

$db = new Database();
