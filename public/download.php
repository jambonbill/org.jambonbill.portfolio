<?php
//dowload resume + Log

//logger
//echo '<pre>';print_r($_SERVER);exit;
$row=date('c')."\t";
$row.=$_SERVER['REMOTE_ADDR']."\t";
$row.=$_SERVER['HTTP_USER_AGENT']."\t";
$row.=$_SERVER['REQUEST_URI']."\t";
$row.=PHP_EOL;

@error_log($row, 3, "../logs/download.log");

$file_url = './cv/CV-Pierre-BOQUET.court.pdf';

if (!is_file($file_url)) {
	exit("file not found");
}

header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
readfile($file_url); 
