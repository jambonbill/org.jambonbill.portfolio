<?php
$files=glob('*.pdf');
//print_r($files);
foreach($files as $file){
    echo "<a href=$file>$file</a><br />";
}