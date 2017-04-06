<?php

namespace App;

class LetterLocator
{

	protected $converter;

	public function __construct()
	{
		$this->converter = new CoordinateConversion();
	}

	/**
	 * Determine the distance between two letters
	 * @param  character $letterOne Where we start
	 * @param  character $letterTwo Where we end
	 * @return array            The differences in Horizontal and Vertical positions
	 */
	public function deltaBetweenLetters($letterOne, $letterTwo)
    {
    	$startCoords = $this->converter->letterToCoordinates($letterOne);
    	$endCoords = $this->converter->letterToCoordinates($letterTwo);
    	$delta = [$endCoords[0] - $startCoords[0], $endCoords[1] -  $startCoords[1]  ];

    	return $delta;
    }
}
