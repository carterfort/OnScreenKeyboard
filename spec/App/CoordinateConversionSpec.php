<?php

namespace spec\App;

use App\CoordinateConversion;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CoordinateConversionSpec extends ObjectBehavior
{
    public function it_converts_an_a_to_0_0()
    {
    	$this->letterToCoordinates("A")->shouldReturn([0,0]);
    }

    public function it_converts_a_b_to_0_1()
    {
    	$this->letterToCoordinates("B")->shouldReturn([0,1]);
    }

    public function it_converts_an_r_to_2_5()
    {
    	$this->letterToCoordinates("R")->shouldReturn([2,5]);
    }

}
