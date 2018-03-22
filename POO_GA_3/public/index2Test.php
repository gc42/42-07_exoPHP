<?php
include 'app/App.php';
$test1 = new App;
$test2 = new App;

printGC($test1);
printGC($test2);