<?php

namespace spec\App;

use App\ConvertsStringToDirections;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConvertsStringToDirectionsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ConvertsStringToDirections::class);
    }

    public function it_converts_a_a_a_to_pound_pound_pound()
    {
    	$this->convert("AAA")->shouldReturn(["#","#","#"]);
    }

    public function it_converts_it_crowd_correctly()
    {
    	$results = [
    		"D","R","R","#","D","D","L","#","S","U","U","U","R","#","D","D","R","R","R","#","L","L","L","#","D","R","R","#","U","U","U","L","#"
    	];

    	$this->convert("IT Crowd")->shouldReturn($results);
    }
}
