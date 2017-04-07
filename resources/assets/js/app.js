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

const buttonPressTime = 240;

new Vue({

	el : "#television",
	data : {
		activeColumn : 0,
		activeRow : 0,
		pressedColumn : false,
		pressedRow : false,
		spaceBarPressed : false
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
		}
	},
	methods : {
		reset(){
			this.activeRow = 0;
			this.activeColumn = 0;
		},
		pressSpaceBar(){
			this.spaceBarPressed = true;
			setTimeout(function(){
				this.spaceBarPressed = true;
			}.bind(this), buttonPressTime);
		},
		pressKey(){
			this.pressedColumn = this.activeColumn;
			this.pressedRow = this.activeRow;
			setTimeout(function(){
				this.pressedColumn = false;
				this.pressedRow = false;
			}.bind(this), buttonPressTime);
		},
		keyIsActive(key){
			return key.coordinates[0] == this.activeRow && key.coordinates[1] == this.activeColumn;
		},
		keyIsPressed(key){	
			if(this.pressedColumn === false) return;
			return key.coordinates[0] == this.pressedRow && key.coordinates[1] == this.pressedColumn;
		},
		moveCursor(direction){

			switch(direction){
				case 0:
				this.activeRow -= 1;
				this.activeRow = this.normalizeNumber(this.activeRow);
				break;
				case 1:
				this.activeColumn += 1;
				this.activeColumn = this.normalizeNumber(this.activeColumn);
				break;
				case 2:
				this.activeRow += 1;
				this.activeRow = this.normalizeNumber(this.activeRow);
				break;
				case 3:
				this.activeColumn -= 1;
				this.activeColumn = this.normalizeNumber(this.activeColumn);
				break;
			}

		},
		normalizeNumber(number){
			if (number < 0) number = 5;
			if (number > 5) number = 0;
			return number;
		}
	}
})