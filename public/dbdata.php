<?php
//fake db
$json=file_get_contents('json/data.json');
$o=json_decode($json);
$data=$o->data;

//print_r($data);