<?php

require __DIR__ . "./../vendor/autoload.php";

$string = $_GET["string"] ?? "";

if ( $string == ''){
	dd("Use a get variable named 'string' to convert it: /?string=IT CROWD ");
}

$converter = new App\ConvertsString();

$results = collect($converter->convert($string));

dd($results->implode(','));