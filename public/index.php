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

							<div class="box has-text-centered" :class="{ 'is-pressed' : spaceBarPressed }">
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
									<button class="button is-block" @click="moveCursor(0)">Up</button>
								</div>
							</div>

							<div class="columns">
								<div class="column is-4">
									<button class="button is-block" @click="moveCursor(3)">Left</button>
								</div>
								<div class="column is-4">
									<button class="button is-block" @click="pressKey()">Go!</button>
								</div>
								<div class="column is-4">
									<button class="button is-block" @click="moveCursor(1)">Right</button>
								</div>
							</div>

							<div class="columns">
								<div class="column is-4 is-offset-4">
									<button class="button is-block" @click="moveCursor(2)">Down</button>
								</div>
							</div>

							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="/assets/app.js"></script>
</body>
</html>