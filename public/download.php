<?php
//dowload resume + Log

$file_url = '/docs/cv-pierre-boquet.pdf';

if (!is_file($file_url)) {
	exit("file not found");
}

header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
readfile($file_url); 