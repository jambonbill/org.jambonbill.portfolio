<pre>
<?php

$files=glob("*.*");

foreach($files as $file){
    echo basename($file);
    echo "\n";
}