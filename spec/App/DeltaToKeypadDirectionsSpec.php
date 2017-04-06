<?php

namespace spec\App;

use App\DeltaToKeypadDirections;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DeltaToKeypadDirectionsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(DeltaToKeypadDirections::class);
    }

	function it_converts_1_1_to_D_R()
    {
    	$this->convert([1,1])->shouldReturn(["D", "R", "#"]);
    }

    function it_converts_minus_2_4_to_two_us_and_four_rs()
    {
    	$this->convert([-2, 4])->shouldReturn(["U", "U", "R", "R", "R", "R", "#"]);
    }
}
