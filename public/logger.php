<?php
// logger

//echo '<pre>';print_r($_SERVER);exit;

$row=date('c')."\t";
$row.=$_SERVER['REMOTE_ADDR']."\t";
$row.=$_SERVER['HTTP_USER_AGENT']."\t";
$row.=$_SERVER['REQUEST_URI']."\t";
$row.=PHP_EOL;

//TODO skip favicon

$skip=false;

//$basename=$_SERVER['REQUEST_URI'];

// Filter IP //
switch($_SERVER['REMOTE_ADDR'])
{    
    case '86.219.65.59':
        $skip=true;break;
}


if (!$skip) {
    @error_log($row,3,"../logs/access.log");
}

