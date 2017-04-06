<?php

namespace App;

class ConvertsStringToDirections
{

	protected $letterLocator;

	public function __construct()
	{
		$this->letterLocator = new LetterLocator();
		$this->directionsConverter = new DeltaToKeypadDirections();
	}

	/**
	 * Build up our conversion by taking each letter and appending it's directions
	 * to the output array
	 * @param  string $string Input string
	 * @return array         Array of directions, including "#" and "S"
	 */
	public function convert($string)
	{
		$output = collect([]);

		$letters = str_split($string);
		$previousLetter = "A";

		foreach($letters as $currentLetter){

			if ($currentLetter == ' '){
				$output->push("S");
				continue;
			}

			$change = $this->letterLocator->deltaBetweenLetters($previousLetter, $currentLetter);
			$directions = $this->directionsConverter->convert($change);
			$output = $output->merge(collect($directions));
			$previousLetter = $currentLetter;
			
		}

		return $output->toArray();
	}
}
