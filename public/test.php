<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

require __DIR__."/../vendor/autoload.php";

//https://github.com/erusev/parsedown
$Parsedown = new Parsedown();

echo $Parsedown->text('Hello _Parsedown_!');
