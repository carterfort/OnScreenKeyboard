<?php

namespace App;

class CoordinateConversion
{

	protected $map = [
		"A" => [0,0],
		"B" => [0,1],
		"C" => [0,2],
		"D" => [0,3],
		"E" => [0,4],
		"F" => [0,5],
		"G" => [1,0],
		"H" => [1,1],
		"I" => [1,2],
		"J" => [1,3],
		"K" => [1,4],
		"L" => [1,5],
		"M" => [2,0],
		"N" => [2,1],
		"O" => [2,2],
		"P" => [2,3],
		"Q" => [2,4],
		"R" => [2,5],
		"S" => [3,0],
		"T" => [3,1],
		"U" => [3,2],
		"V" => [3,3],
		"W" => [3,4],
		"X" => [3,5],
		"Y" => [4,0],
		"Z" => [4,1],
		"1" => [4,2],
		"2" => [4,3],
		"3" => [4,4],
		"4" => [4,5],
		"5" => [5,0],
		"6" => [5,1],
		"7" => [5,2],
		"8" => [5,3],
		"9" => [5,4],
		"0" => [5,5],
	];

	/**
	 * Take a letter and convert it to its coordinates
	 * @param  character $letter Letter to convert
	 * @return array         Coordinates
	 */
    public function letterToCoordinates($letter)
    {
    	$letter = ucwords($letter);
        return $this->map[$letter];
    }
}
