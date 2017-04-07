require('./bootstrap');

const keyboardCharacters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";

const directions = {
	"U" : 0,
	"R" : 1,
	"D" : 2,
	"L" : 3,
	"S" : 4,
	"#" : 5
};

const buttonPressTime = 200;

new Vue({

	el : "#television",
	data : {
		activeColumn : 0,
		activeRow : 0,
		pressedColumn : false,
		pressedRow : false,
		spaceBarPressed : false,
		searchText : '',
		enteredText : '',
		outputText: ''
	},
	computed : {
		activeCoords(){
			return [parseInt(this.activeColumn), parseInt(this.activeRow)];
		},
		keyboardRows(){

			var keyboard = [];

			for(var i = 0; i < 6; i++){
				var row = [];

				for (var o = 0; o < 6; o++){
					row.push({
						"key" : keyboardCharacters[(i * 6) + o],
						"coordinates" : [i,o]
					})
				}
				keyboard.push(row);
			}

			return keyboard
		},
		activeKey(){
			return this.keyboardRows[this.activeRow][this.activeColumn];
		},
		spaceBarIsActive(){
			return this.activeRow == -1 || this.activeRow == 6;
		}
	},
	methods : {
		makeItSo(){
			this.reset();
			axios.get('/convert?string='+this.searchText)
				.then(function(response){

					var timerOffset = 0;
					this.outputText = response.data.output.join(',');

					response.data.output.forEach(function(direction){
						setTimeout(function(){
							let convertedDirection = directions[direction]
							this.handleCursorInput(convertedDirection);
						}.bind(this), timerOffset + 120);
						timerOffset += 120;

					}.bind(this));
				}.bind(this))
		},
		reset(){
			this.activeRow = 0;
			this.activeColumn = 0;
			this.enteredText = '';
			this.outputText = '';
		},
		pressSpaceBar(){
			this.spaceBarPressed = true;

			this.enteredText += ' ';

			setTimeout(function(){
				this.spaceBarPressed = false;
			}.bind(this), buttonPressTime);
		},
		pressKey(){
			if (this.spaceBarIsActive) {
				this.pressSpaceBar();
				return;
			}
			this.enteredText += this.activeKey.key;

			this.pressedColumn = this.activeColumn;
			this.pressedRow = this.activeRow;
			setTimeout(function(){
				this.pressedColumn = false;
				this.pressedRow = false;
			}.bind(this), buttonPressTime);
		},
		keyIsActive(key){
			if (this.spaceBarPressed) return false;

			return key.coordinates[0] == this.activeRow && key.coordinates[1] == this.activeColumn;
		},
		keyIsPressed(key){	
			if(this.pressedColumn === false) return;
			return key.coordinates[0] == this.pressedRow && key.coordinates[1] == this.pressedColumn;
		},
		handleCursorInput(direction){

			switch(direction){
				case 0:
				this.activeRow -= 1;
				if (this.activeRow < -1) this.activeRow = 5;
				break;
				case 1:
				this.activeColumn += 1;
				if (this.activeColumn > 5) this.activeColumn = 0;
				break;
				case 2:
				this.activeRow += 1;
				if (this.activeRow > 6) this.activeRow = 0;
				break;
				case 3:
				this.activeColumn -= 1;
				if (this.activeColumn < 0) this.activeColumn = 5;
				break;
				case 4:
				this.pressSpaceBar();
				break;
				case 5:
				this.pressKey()
				break;
			}

		},
	}
})