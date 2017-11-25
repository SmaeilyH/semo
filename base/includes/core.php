<?php

include_once 'base/includes/config.php';

$conn = new mysqli($server_host, $server_user, $server_pass, $server_name);
$conn->set_charset("utf8");

function config($row){
    global $conn;
    $query = $conn->query('SELECT * FROM `config` WHERE `id`=1');
    $fetch = $query->fetch_array(MYSQLI_ASSOC);
    return $fetch[$row];
}

function limitword($string, $limit){
    $words = explode(" ",$string);
    $output = implode(" ",array_splice($words,0,$limit));
    return $output;
}