<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

require __DIR__."/../vendor/autoload.php";


$PF=new JAM\PortfolioItems();



echo '<pre>';print_r($_GET);echo '</pre>';

echo '<pre>';print_r($PF->fetch());echo '</pre>';

