<?php

namespace App;

class DeltaToKeypadDirections
{

	/**
	 * Convert a set of deltas to their corresponding directions on the keypad
	 * Include the "#" at the end so every command is executed
	 * @param  array $directions [Horizontal,Vertical] values
	 * @return array             The keypad directions necessary to execute this direction
	 */
    public function convert($directions)
    {
    	$output = [];

    	$vertical = $directions[0];
    	$horizontal = $directions[1];

		for($i = 0; $i < abs($vertical); $i++){
			if ($vertical < 0){
				$output[] = "U";
			} else {
				$output[] = "D";
			}
		}

		for($i = 0; $i < abs($horizontal); $i++){
			if ($horizontal < 0){
				$output[] = "L";
			} else {
				$output[] = "R";
			}
		}

		$output[] = "#";

        return $output;
    }


}
