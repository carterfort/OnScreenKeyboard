<?php

require __DIR__ . "./../vendor/autoload.php";

use Symfony\Component\HttpFoundation\Response;

$string = $_GET["string"] ?? "";

$response = new Response();
$response->headers->set('Content-Type', 'application/json');

$json = [
	'input' => $string,
	'output' => ''
];

if ( $string == ''){
	$json['output'] = ("Use a get variable named 'string' to convert it: /?string=IT CROWD ");
} else {
	$converter = new App\ConvertsStringToDirections();
	$json['output'] = collect($converter->convert($string));
}

$response->setContent(json_encode($json));

return $response->send();

?>