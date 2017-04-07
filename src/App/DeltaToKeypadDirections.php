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
    	$output = collect([]);
    	$keyPresses = $this->getKeyPresses();

    	$vertical = $directions[0];
    	$horizontal = $directions[1];

		if ($this->isPositive($vertical)){
			$output = $output->merge($keyPresses['down']->take($vertical));
		} else {
			$output = $output->merge($keyPresses['up']->take($vertical));
		}

		if ($this->isPositive($horizontal)){
			$output = $output->merge($keyPresses['right']->take($horizontal));
		} else {
			$output = $output->merge($keyPresses['left']->take($horizontal));
		}

		$output->push("#");

        return $output->toArray();
    }

    protected function isPositive($number)
    {
    	return $number > 0;
    }

    protected function getKeyPresses()
    {
    	return collect([
			'left' => collect([
				'L', 'L', 'L', 'L', 'L'
			]),
			'right' => collect([
				'R', 'R', 'R', 'R', 'R'
			]),
			'up' => collect([
				'U', 'U', 'U', 'U', 'U'
			]),
			'down' => collect([
				'D', 'D', 'D', 'D', 'D'
			])
		]);
    }


}
