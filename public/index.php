<?php
require __DIR__ . "./../vendor/autoload.php";

use Symfony\Component\HttpFoundation\Response;

if (isset($_GET["string"])){
	$string = $_GET["string"];

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
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>TrueFit Remote</title>

	<link rel="stylesheet" href="/assets/app.css" />
</head>
<body>

	<section class="section" id="television">
		<div class="container">
			<div class="columns">
				<div class="column is-8">
					<div class="card">
						<div class="card-content">
							<div class="columns" v-for="row in keyboardRows">
								<div class="column" v-for="key in row">
									<div class="box has-text-centered" :class="{ 'is-active' : keyIsActive(key), 'is-pressed' : keyIsPressed(key) }">
										{{ key.key }}
									</div>
								</div>
							</div>

							<div class="box has-text-centered" :class="{ 'is-active' : spaceBarPressed, 'is-pressed' : spaceBarPressed }">
								Space
							</div>
						</div>
					</div>
				</div>
				<div class="column is-4">
					<div class="card">
						<div class="card-content">

							<div class="columns">
								<div class="column is-4 is-offset-4">
									<button class="button is-block" @click="handleCursorInput(0)">Up</button>
								</div>
							</div>

							<div class="columns">
								<div class="column is-4">
									<button class="button is-block" @click="handleCursorInput(3)">Left</button>
								</div>
								<div class="column is-4">
									<button class="button is-block" @click="pressKey()">Go!</button>
								</div>
								<div class="column is-4">
									<button class="button is-block" @click="handleCursorInput(1)">Right</button>
								</div>
							</div>

							<div class="columns">
								<div class="column is-4 is-offset-4">
									<button class="button is-block" @click="handleCursorInput(2)">Down</button>
								</div>
							</div>
							
						</div>
					</div>

					<br />

					<div class="box">
						<div class="field has-addons">
							<p class="control">
								<input class="input" @keyup.enter="makeItSo()" v-model="searchText" />
							</p>
							<p class="control">
								<button class="button is-info" @click="makeItSo()">Search</button>
							</p>
						</div>
					</div>

					<br />

					<div class="box">
						<h4 class="title is-4" v-text="enteredText"></h4>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="/assets/app.js"></script>
</body>
</html>