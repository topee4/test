<?php

require_once "connection.php";

function test_skip ($db) {
    $rand_eng_word = $db->query("SELECT id, eng_name FROM eng ORDER BY RAND() LIMIT 1");
    echo json_encode($rand_eng_word);
}